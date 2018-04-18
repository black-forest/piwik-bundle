<?php
/**
 * FRAMEWORK
 *
 * Copyright (C) FRAMEWORK
 *
 * @package   dvbs-ibob.anatom5dev.offline
 * @file      Communicator.php
 * @author    Sven Baumann <baumann.sv@gmail.com>
 * @author    Dominik Tomasi <dominik.tomasi@gmail.com>
 * @license   GNU/LGPL
 * @copyright Copyright 2018 owner
 */


namespace BlackForest\PiwikBundle\Controller;


use BlackForest\PiwikBundle\Connection\ConnectionInterface;
use BlackForest\PiwikBundle\Entity\PiwikAction;
use BlackForest\PiwikBundle\Entity\PiwikActionType;
use BlackForest\PiwikBundle\Entity\PiwikBrowser;
use BlackForest\PiwikBundle\Entity\PiwikCountry;
use BlackForest\PiwikBundle\Entity\PiwikCurrency;
use BlackForest\PiwikBundle\Entity\PiwikDevice;
use BlackForest\PiwikBundle\Entity\PiwikEcomerceStatus;
use BlackForest\PiwikBundle\Entity\PiwikLanguage;
use BlackForest\PiwikBundle\Entity\PiwikLocation;
use BlackForest\PiwikBundle\Entity\PiwikOperatingSystem;
use BlackForest\PiwikBundle\Entity\PiwikPlugin;
use BlackForest\PiwikBundle\Entity\PiwikReferrerType;
use BlackForest\PiwikBundle\Entity\PiwikResolution;
use BlackForest\PiwikBundle\Entity\PiwikSearchEngine;
use BlackForest\PiwikBundle\Entity\PiwikSite;
use BlackForest\PiwikBundle\Entity\PiwikVisit;
use BlackForest\PiwikBundle\Entity\PiwikVisitAction;
use BlackForest\PiwikBundle\Entity\PiwikVisitor;
use BlackForest\PiwikBundle\Entity\PiwikVisitorType;
use BlackForest\PiwikBundle\Entity\PiwikVisitPlugin;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\Common\Collections\Criteria;

class Communicator
{
    /**
     * The piwik connection.
     *
     * @var ConnectionInterface
     */
    private $connection;

    /**
     * The doctrine registry.
     *
     * @var Registry
     */
    private $doctrine;

    public function __construct(ConnectionInterface $connection, Registry $doctrine)
    {
        $this->connection = $connection;
        $this->doctrine   = $doctrine;
    }

    public function process()
    {
        $this->updateDomains();
        $this->updateVisit();
    }

    private function updateDomains()
    {
        if (!\count($domains = $this->connection->getDomainInformation())) {
            return;
        }
        $em = $this->doctrine->getManager();

        foreach ($domains as $domain) {
            $repository = $em->getRepository(PiwikSite::class);
            $entity     = $repository->findOneBy(['mainUrl' => $domain['main_url']]);
            if (null !== $entity) {
                continue;
            }

            $entityClass = $repository->getClassName();
            $newEntity   = new $entityClass();

            $this->setEntityValue($domain, $newEntity);

            $em->persist($newEntity);
        }

        $em->flush();
    }

    private function updateVisit()
    {
        $repository = $this->getRepository(PiwikSite::class);
        $collection = $repository->findAll();
        if (!\count($collection)) {
            return;
        }

        /** @var PiwikSite $entity */
        foreach ($collection as $entity) {
            $distanceVisitAction = $this->distanceCountVisitAction($entity->getIdsite());
            $countVisitAction    = $entity->getVisitAction()->count();

            if ($distanceVisitAction === $countVisitAction) {
                continue;
            }

            $visitAction = $this->distanceVisitAction($entity->getIdsite(), $countVisitAction ? false : true, $entity);

            $this->update($visitAction, $entity);
        }

        $this->doctrine->getManager()->flush();
    }

    private function update(array $data, PiwikSite $siteEntity)
    {
        foreach ($data as $visitData) {
            /** @var PiwikVisit $visitEntity */
            $visitEntity = $this->findVisit($visitData);

            if (\count($visitData['actionDetails']) > $visitEntity->getVisitAction()->count()) {
                $this->addVisitAction($visitData['actionDetails'], $visitEntity, $siteEntity);
            } else {
                continue;
            }
            unset($visitData['actionDetails']);

            if (null === $visitEntity->getVisitor()) {
                $visitEntity->setVisitor($this->getVisitor($visitData['visitorId'], $siteEntity));
            }
            unset($visitData['visitorId']);

            if (null === $visitEntity->getVisitorType()) {
                $visitEntity->setVisitorType(
                    $this->getVisitorType(
                        ['name' => $visitData['visitorType'], 'icon' => $visitData['visitorTypeIcon']],
                        $siteEntity
                    )
                );
            }
            unset($visitData['visitorType'], $visitData['visitorTypeIcon']);

            if (null === $visitEntity->getCurrency()) {
                $visitEntity->setCurrency(
                    $this->getCurrency(
                        ['name' => $visitData['siteCurrency'], 'symbol' => $visitData['siteCurrencySymbol']],
                        $siteEntity
                    )
                );
            }
            unset($visitData['siteCurrency'], $visitData['siteCurrencySymbol']);

            if (null === $visitEntity->getEcommmerceStatus()) {
                $visitEntity->setEcommmerceStatus(
                    $this->getEcommerceStatus(
                        [
                            'name' => $visitData['visitEcommerceStatus'],
                            'icon' => $visitData['visitEcommerceStatusIcon']
                        ],
                        $siteEntity
                    )
                );
            }
            unset($visitData['visitEcommerceStatus'], $visitData['visitEcommerceStatusIcon']);

            if (null === $visitEntity->getReferrerType()) {
                $visitEntity->setReferrerType(
                    $this->getReferrerType(
                        ['name' => $visitData['referrerTypeName'], 'type' => $visitData['referrerType']],
                        $siteEntity
                    )
                );
            }
            unset($visitData['referrerTypeName'], $visitData['referrerType']);

            if (null === $visitEntity->getSearchEngine()) {
                $visitEntity->setSearchEngine(
                    $this->getSearchEngine(
                        [
                            'url'  => $visitData['referrerSearchEngineUrl'],
                            'icon' => $visitData['referrerSearchEngineIcon']
                        ],
                        $siteEntity
                    )
                );
            }
            unset($visitData['referrerSearchEngineUrl'], $visitData['referrerSearchEngineIcon']);

            if (null === $visitEntity->getLanguage()) {
                $visitEntity->setLanguage(
                    $this->getLanguage(
                        ['name' => $visitData['language'], 'code' => $visitData['languageCode']],
                        $siteEntity
                    )
                );
            }
            unset($visitData['language'], $visitData['languageCode']);

            if (null === $visitEntity->getDevice()) {
                $visitEntity->setDevice(
                    $this->getDevice(
                        [
                            'name'  => $visitData['deviceType'],
                            'model' => $visitData['deviceModel'],
                            'brand' => $visitData['deviceBrand'],
                            'icon'  => $visitData['deviceTypeIcon']
                        ],
                        $siteEntity
                    )
                );
            }
            unset($visitData['deviceType'], $visitData['deviceTypeIcon'], $visitData['deviceBrand'], $visitData['deviceModel']);

            if (null === $visitEntity->getOperatingSystem()) {
                $visitEntity->setOperatingSystem(
                    $this->getOperatingSystem(
                        [
                            'name'    => $visitData['operatingSystemName'],
                            'version' => $visitData['operatingSystemVersion'],
                            'code'    => $visitData['operatingSystemCode'],
                            'icon'    => $visitData['operatingSystemIcon']
                        ],
                        $siteEntity
                    )
                );
            }
            unset(
                $visitData['operatingSystem'],
                $visitData['operatingSystemName'],
                $visitData['operatingSystemIcon'],
                $visitData['operatingSystemCode'],
                $visitData['operatingSystemVersion']
            );

            if (null === $visitEntity->getBrowser()) {
                $visitEntity->setBrowser(
                    $this->getBrowser(
                        [
                            'name'    => $visitData['browserName'],
                            'version' => $visitData['browserVersion'],
                            'code'    => $visitData['browserCode'],
                            'engine'  => $visitData['browserFamily'],
                            'icon'    => $visitData['browserIcon']
                        ],
                        $siteEntity
                    )
                );
            }
            unset(
                $visitData['browserFamily'],
                $visitData['browserFamilyDescription'],
                $visitData['browser'],
                $visitData['browserName'],
                $visitData['browserIcon'],
                $visitData['browserCode'],
                $visitData['browserVersion']
            );


            if (null === $visitEntity->getCountry()) {
                $visitEntity->setCountry(
                    $this->getCountry(
                        [
                            'name'          => $visitData['country'],
                            'code'          => $visitData['countryCode'],
                            'continent'     => $visitData['continent'],
                            'continentCode' => $visitData['continentCode'],
                            'icon'          => $visitData['countryFlag']
                        ],
                        $siteEntity
                    )
                );
            }
            unset(
                $visitData['country'],
                $visitData['continent'],
                $visitData['continentCode'],
                $visitData['countryCode'],
                $visitData['countryFlag']
            );


            if (null === $visitEntity->getLocation()) {
                $visitEntity->setLocation(
                    $this->getLocation(
                        [
                            'name'      => $visitData['region'],
                            'code'      => $visitData['regionCode'],
                            'city'      => $visitData['city'],
                            'latitude'  => $visitData['latitude'],
                            'longitude' => $visitData['longitude']
                        ],
                        $siteEntity,
                        $visitEntity->getCountry()
                    )
                );
            }
            unset(
                $visitData['region'],
                $visitData['regionCode'],
                $visitData['city'],
                $visitData['location'],
                $visitData['latitude'],
                $visitData['longitude']
            );


            if (null === $visitEntity->getResolution()) {
                $visitEntity->setResolution($this->getResolution(['name' => $visitData['resolution']], $siteEntity));
            }
            unset($visitData['resolution']);


            if (null === $visitEntity->getPlugin()) {
                $visitEntity->setPlugin(
                    $this->getVisitPlugin(['plugins' => $visitData['pluginsIcons']], $siteEntity)
                );
            }
            unset($visitData['plugins'], $visitData['pluginsIcons']);

            if (null === $visitEntity->getSite()) {
                $visitEntity->setSite($siteEntity);
            }

            $this->setVisitValues($visitData, $visitEntity);
        }
    }

    private function findVisit($data)
    {
        $repository = $this->getRepository(PiwikVisit::class);
        $entity     = $repository->findOneBy(['idVisit' => $data['idVisit']]);
        if (null !== $entity) {
            return $entity;
        }

        $relfection = new \ReflectionClass($repository->getClassName());
        return $relfection->newInstance();
    }

    private function setVisitValues(array $data, PiwikVisit $entity)
    {
        // Remove empty values.
        foreach ($data as $key => $value) {
            if ($value) {
                continue;
            }

            unset($data[$key]);
        }

        $this->setEntityValue($data, $entity, true);
    }

    private function addVisitAction(array $data, PiwikVisit $visit, PiwikSite $site)
    {
        foreach ($data as $visitActionData) {
            $visitAction = $this->getVisitAction($visitActionData, $site);
            $visitAction->setVisit($visit);

            if (null === $visitAction->getType()) {
                $visitAction->setType($this->getActionType(['name' => $visitActionData['type']], $site));
            }
            unset($visitActionData['type']);

            if (null === $visitAction->getAction()) {
                $visitAction->setAction(
                    $this->getAction(
                        [
                            'url'          => $visitActionData['url'],
                            'pageTitle'    => $visitActionData['pageTitle'],
                            'pageIdAction' => $visitActionData['pageIdAction']
                        ],
                        $site
                    )
                );
            }
            unset($visitActionData['url'], $visitActionData['pageTitle'], $visitActionData['pageIdAction']);

            if (null === $visitAction->getTime()) {
                $time = new \DateTime();
                $time->setTimestamp($visitActionData['timestamp']);
                $visitAction->setTime($time);
            }
            unset($visitActionData['timestamp']);

            $visitActionData['generationTime'] = $visitActionData['generationTimeMilliseconds'];

            $this->setEntityValue($visitActionData, $visitAction, true);

            $visit->removeVisitAction($visitAction);
            $visit->addVisitAction($visitAction);
        }
    }

    private function getVisitAction(array $data, PiwikSite $site)
    {
        $repository = $this->getRepository(PiwikVisitAction::class);
        /** @var PiwikVisitAction $entity */
        $entity = $repository->findOneBy(['pageId' => $data['pageId']]);
        if (null !== $entity) {
            return $entity;
        }

        $relection = new \ReflectionClass($repository->getClassName());
        $newEntity = $relection->newInstance();
        $newEntity->setSite($site);

        return $newEntity;
    }

    private function getActionType(array $data, PiwikSite $site)
    {
        $id = \md5(\implode(';', \array_merge(\array_values($data), [PiwikActionType::class, $site->getUuid()])));

        /** @var PiwikActionType $entity */
        $entity = $this->findEntity(PiwikActionType::class, $id, true);

        if (null === $entity->getUuid()) {
            $this->setEntityValue(\array_merge(['uuid' => $id], $data), $entity, true);
            $entity->setSite($site);
        }

        return $entity;
    }

    private function getAction(array $data, PiwikSite $site)
    {
        $id = \md5(\implode(';', \array_merge(\array_values($data), [PiwikAction::class, $site->getUuid()])));

        /** @var PiwikAction $entity */
        $entity = $this->findEntity(PiwikAction::class, $id, true);

        if (null === $entity->getUuid()) {
            $data         = \array_merge($data, \parse_url($data['url']));
            $data['path'] = \trim($data['path'], '/');

            $pathInfo = \pathinfo($data['path']);
            if ($pathInfo['extension']) {
                $data['path']   = \substr($data['path'], 0, -\strlen('.' . $pathInfo['extension']));
                $data['suffix'] = $pathInfo['extension'];
            }

            $this->setEntityValue(\array_merge(['uuid' => $id], $data), $entity, true);
            $entity->setSite($site);
        }

        return $entity;
    }

    private function getVisitor($id, PiwikSite $site)
    {
        /** @var PiwikVisitor $entity */
        $entity = $this->findEntity(PiwikVisitor::class, $id, true);

        if (null === $entity->getUuid()) {
            $this->setEntityValue(['uuid' => $id], $entity, true);
            $entity->setSite($site);
        }

        return $entity;
    }

    private function getVisitorType(array $data, PiwikSite $site)
    {
        $id = \md5(\implode(';', \array_merge(\array_values($data), [PiwikVisitorType::class, $site->getUuid()])));

        /** @var PiwikVisitorType $entity */
        $entity = $this->findEntity(PiwikVisitorType::class, $id, true);

        if (null === $entity->getUuid()) {
            $this->setEntityValue(\array_merge(['uuid' => $id], $data), $entity, true);
            $entity->setSite($site);
        }

        return $entity;
    }

    private function getEcommerceStatus(array $data, PiwikSite $site)
    {
        $id = \md5(\implode(';', \array_merge(\array_values($data), [PiwikEcomerceStatus::class, $site->getUuid()])));

        /** @var PiwikEcomerceStatus $entity */
        $entity = $this->findEntity(PiwikEcomerceStatus::class, $id, true);

        if (null === $entity->getUuid()) {
            $this->setEntityValue(\array_merge(['uuid' => $id], $data), $entity, true);
            $entity->setSite($site);
        }

        return $entity;
    }

    private function getCurrency(array $data, PiwikSite $site)
    {
        $id = \md5(\implode(';', \array_merge(\array_values($data), [PiwikCurrency::class, $site->getUuid()])));

        /** @var PiwikCurrency $entity */
        $entity = $this->findEntity(PiwikCurrency::class, $id, true);

        if (null === $entity->getUuid()) {
            $this->setEntityValue(\array_merge(['uuid' => $id], $data), $entity, true);
            $entity->setSite($site);
        }

        return $entity;
    }

    private function getReferrerType(array $data, PiwikSite $site)
    {
        $id = \md5(\implode(';', \array_merge(\array_values($data), [PiwikReferrerType::class, $site->getUuid()])));

        /** @var PiwikReferrerType $entity */
        $entity = $this->findEntity(PiwikReferrerType::class, $id, true);

        if (null === $entity->getUuid()) {
            $this->setEntityValue(\array_merge(['uuid' => $id], $data), $entity, true);
            $entity->setSite($site);
        }

        return $entity;
    }

    private function getSearchEngine(array $data, PiwikSite $site)
    {
        $id = \md5(\implode(';', \array_merge(\array_values($data), [PiwikSearchEngine::class, $site->getUuid()])));

        /** @var PiwikSearchEngine $entity */
        $entity = $this->findEntity(PiwikSearchEngine::class, $id, true);

        if (null === $entity->getUuid()) {
            $this->setEntityValue(\array_merge(['uuid' => $id], $data), $entity, true);
            $entity->setSite($site);
        }

        return $entity;
    }

    private function getLanguage(array $data, PiwikSite $site)
    {
        $id = \md5(\implode(';', \array_merge(\array_values($data), [PiwikLanguage::class, $site->getUuid()])));

        /** @var PiwikLanguage $entity */
        $entity = $this->findEntity(PiwikLanguage::class, $id, true);

        if (null === $entity->getUuid()) {
            $this->setEntityValue(\array_merge(['uuid' => $id], $data), $entity, true);
            $entity->setSite($site);
        }

        return $entity;
    }

    private function getDevice(array $data, PiwikSite $site)
    {
        $id = \md5(\implode(';', \array_merge(\array_values($data), [PiwikDevice::class, $site->getUuid()])));

        /** @var PiwikDevice $entity */
        $entity = $this->findEntity(PiwikDevice::class, $id, true);

        if (null === $entity->getUuid()) {
            $this->setEntityValue(\array_merge(['uuid' => $id], $data), $entity, true);
            $entity->setSite($site);
        }

        return $entity;
    }

    private function getOperatingSystem(array $data, PiwikSite $site)
    {
        $id = \md5(\implode(';', \array_merge(\array_values($data), [PiwikOperatingSystem::class, $site->getUuid()])));

        /** @var PiwikOperatingSystem $entity */
        $entity = $this->findEntity(PiwikOperatingSystem::class, $id, true);

        if (null === $entity->getUuid()) {
            $this->setEntityValue(\array_merge(['uuid' => $id], $data), $entity, true);
            $entity->setSite($site);
        }

        return $entity;
    }

    private function getBrowser(array $data, PiwikSite $site)
    {
        $id = \md5(\implode(';', \array_merge(\array_values($data), [PiwikBrowser::class, $site->getUuid()])));

        /** @var PiwikBrowser $entity */
        $entity = $this->findEntity(PiwikBrowser::class, $id, true);

        if (null === $entity->getUuid()) {
            $this->setEntityValue(\array_merge(['uuid' => $id], $data), $entity, true);
            $entity->setSite($site);
        }

        return $entity;
    }

    private function getCountry(array $data, PiwikSite $site)
    {
        $id = \md5(\implode(';', \array_merge(\array_values($data), [PiwikCountry::class, $site->getUuid()])));

        /** @var PiwikCountry $entity */
        $entity = $this->findEntity(PiwikCountry::class, $id, true);

        if (null === $entity->getUuid()) {
            $this->setEntityValue(\array_merge(['uuid' => $id], $data), $entity, true);
            $entity->setSite($site);
        }

        return $entity;
    }

    private function getLocation(array $data, PiwikSite $site, PiwikCountry $country)
    {
        $id = \md5(\implode(';', \array_merge(\array_values($data), [PiwikLocation::class, $site->getUuid()])));

        /** @var PiwikLocation $entity */
        $entity = $this->findEntity(PiwikLocation::class, $id, true);

        if (null === $entity->getUuid()) {
            $this->setEntityValue(\array_merge(['uuid' => $id], $data), $entity, true);
            $entity->setSite($site);
            $entity->setCountry($country);
        }

        return $entity;
    }

    private function getResolution(array $data, PiwikSite $site)
    {
        $id = \md5(\implode(';', \array_merge(\array_values($data), [PiwikResolution::class, $site->getUuid()])));

        /** @var PiwikResolution $entity */
        $entity = $this->findEntity(PiwikResolution::class, $id, true);

        if (null === $entity->getUuid()) {
            $this->setEntityValue(\array_merge(['uuid' => $id], $data), $entity, true);
            $entity->setSite($site);
        }

        return $entity;
    }

    private function getVisitPlugin(array $data, PiwikSite $site)
    {
        $plugins = $data['plugins'];
        unset($data['plugins']);

        foreach ((array) $plugins as $pluginDate) {
            $data[] = $pluginDate['pluginName'];
        }

        $id = \md5(\implode(';', \array_merge(\array_values($data), [PiwikVisitPlugin::class, $site->getUuid()])));

        /** @var PiwikVisitPlugin $entity */
        $entity = $this->findEntity(PiwikVisitPlugin::class, $id, true);

        if (null === $entity->getUuid()) {
            $this->setEntityValue(\array_merge(['uuid' => $id], $data), $entity, true);
            $entity->setSite($site);

            foreach ((array) $plugins as $pluginDate) {
                $entity->addPlugin(
                    $this->getPlugin(
                        [
                            'name' => $pluginDate['pluginName'],
                            'icon' => $pluginDate['pluginIcon']
                        ],
                        $site,
                        $entity
                    )
                );
            }
        }

        return $entity;
    }

    private function getPlugin(array $data, PiwikSite $site, PiwikVisitPlugin $visitPlugin)
    {
        $id = \md5(\implode(';', \array_merge(\array_values($data), [PiwikPlugin::class, $site->getUuid()])));

        /** @var PiwikPlugin $entity */
        $entity = $this->findEntity(PiwikPlugin::class, $id, true);

        if (null === $entity->getUuid()) {
            $this->setEntityValue(\array_merge(['uuid' => $id], $data), $entity, true);
            $entity
                ->setVisitPlugin($visitPlugin)
                ->setSite($site);
        }

        return $entity;
    }

    private function distanceCountVisitAction($idSite)
    {
        $this->connection
            ->setFormat(ConnectionInterface::FORMAT_SERIALIZED)
            ->setParameter('method', 'VisitsSummary.getActions')
            ->setParameter('idSite', $idSite)
            ->setParameter('period', 'range')
            ->setParameter('date', '2008-01-01,now');

        return \unserialize($this->connection->request()->getBody()->getContents());
    }

    private function distanceCountVisit($idSite)
    {
        $this->connection
            ->setFormat(ConnectionInterface::FORMAT_SERIALIZED)
            ->setParameter('method', 'VisitsSummary.getVisits')
            ->setParameter('idSite', $idSite)
            ->setParameter('period', 'range')
            ->setParameter('date', '2008-01-01,now');

        return \unserialize($this->connection->request()->getBody()->getContents());
    }

    private function distanceVisitAction($idSite, $all = false, PiwikSite $site = null)
    {
        if (true === $all) {
            $this->connection
                ->setParameter('date', '2008-01-01,now')
                ->setParameter('countVisitorsToFetch', 0);
        }

        if ((false === $all) && (null !== $site)) {
            $criteria = new Criteria();
            $criteria
                ->orderBy(['time' => Criteria::DESC])
                ->setMaxResults(1);

            /** @var PiwikVisitAction $lastVisitAction */
            $lastVisitAction = $site->getVisitAction()->matching($criteria)->first();
            $lastTime = $lastVisitAction->getTime()->format('Y-m-d');

            if (!($countVisitorsToFetch = $this->distanceCountVisit($idSite) - $site->getVisit()->count())) {
                return [];
            }

            $this->connection
                ->setParameter('date', $lastTime . ',now')
                ->setParameter('countVisitorsToFetch', $countVisitorsToFetch);
        }

        $this->connection
            ->setFormat(ConnectionInterface::FORMAT_SERIALIZED)
            ->setParameter('method', 'Live.getLastVisitsDetails')
            ->setParameter('idSite', $idSite)
            ->setParameter('period', 'range');

        return \unserialize($this->connection->request()->getBody()->getContents());
    }

    private function setEntityValue(array $values, $entity, $persist = false)
    {
        $reflection = new \ReflectionClass($entity);
        foreach ($values as $field => $value) {
            if ('group' === $field) {
                $field = 'groups';
            }
            $property = \lcfirst(\str_replace('_', '', \ucwords($field, '_')));
            $method   = 'set' . \ucfirst($property);
            if (!$reflection->hasMethod($method)) {
                continue;
            }

            $entity->{$method}($this->convertValue($value, $reflection->getProperty($property)));
        }

        if (false === $persist) {
            return;
        }

        $this->doctrine->getManager()->persist($entity);
    }

    private function convertValue($value, \ReflectionProperty $property)
    {
        $em            = $this->doctrine->getManager();
        $classMetaData = $em->getClassMetadata($property->class);

        $type = $classMetaData->getTypeOfField($property->name);
        if ('integer' === $type) {
            return (integer) $value;
        }

        if ('datetime' === $type) {
            return new \DateTime($value);
        }

        return (string) $value;
    }

    private function getRepository($repository)
    {
        return $this->doctrine->getRepository($repository);
    }

    private function findEntity($repositoryName, $id, $newEntity = false)
    {
        $repository = $this->getRepository($repositoryName);

        $entity = $repository->find($id);
        if ($entity || false === $newEntity) {
            return $entity;
        }

        $relfection = new \ReflectionClass($repository->getClassName());
        return $relfection->newInstance();
    }
}
