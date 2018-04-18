<?php
/**
 * FRAMEWORK
 *
 * Copyright (C) FRAMEWORK
 *
 * @package   piwik-bundle
 * @file      Api.php
 * @author    Sven Baumann <baumann.sv@gmail.com>
 * @author    Dominik Tomasi <dominik.tomasi@gmail.com>
 * @license   GNU/LGPL
 * @copyright Copyright 2018 owner
 */


namespace BlackForest\PiwikBundle\Api;

use BlackForest\PiwikBundle\Connection\ConnectionInterface;

/**
 * The class provide function from module api.
 */
class Api
{
    private $format = ConnectionInterface::FORMAT_SERIALIZED;

    /**
     * The piwik connection.
     *
     * @var ConnectionInterface
     */
    private $connection;

    /**
     * Api constructor.
     *
     * @param ConnectionInterface $connection The piwik connection.
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    public function version($format = '')
    {
        $this->setFormat($format);
        $this->setParameters(
            [
                'method' => 'API.getPiwikVersion',
            ]
        );

        return $this->getContents();
    }

    public function ip($format = '')
    {
        $this->setFormat($format);
        $this->setParameters(
            [
                'method' => 'API.getIpFromHeader',
            ]
        );

        return $this->getContents();
    }

    public function settings($format = '')
    {
        $this->setFormat($format);
        $this->setParameters(
            [
                'method' => 'API.getSettings',
            ]
        );

        return $this->getContents();
    }

    public function segmentsMetadata(array $idSites, $format = '')
    {
        $this->setFormat($format);
        $this->setParameters(
            [
                'method'                  => 'API.getSegmentsMetadata',
                'idSites'                 => \implode(',', $idSites),
                '_hideImplementationData' => 1
            ]
        );

        return $this->getContents();
    }

    public function metadata($idSite, $period = '', $date = '', $format = '')
    {
        $this->setFormat($format);
        $this->setParameters(
            [
                'method'    => 'API.getMetadata',
                'idSite'    => $idSite,
                'apiModule' => 'UserCountry',
                'apiAction' => 'getCountry',
                'period'    => $period,
                'date'      => $date,
            ]
        );

        return $this->getContents();
    }

    public function reportMetadata(array $idSites, $idSite = '', $date = '', $format = '')
    {
        $this->setFormat($format);
        $this->setParameters(
            [
                'method'  => 'API.getReportMetadata',
                'idSites' => \implode(',', $idSites),
                'idSite'  => $idSite,
                'date'    => $date,
            ]
        );

        return $this->getContents();
    }

    public function reportPagesMetadata($idSite = '', $format = '')
    {
        $this->setFormat($format);
        $this->setParameters(
            [
                'method' => 'API.getReportPagesMetadata',
                'idSite' => $idSite
            ]
        );

        return $this->getContents();
    }

    public function widgetMetadata($idSite = '', $format = '')
    {
        $this->setFormat($format);
        $this->setParameters(
            [
                'method' => 'API.getWidgetMetadata',
                'idSite' => $idSite
            ]
        );

        return $this->getContents();
    }

    public function get($idSite = '', $period = '', $date = '', $format = '')
    {
        $this->setFormat($format);
        $this->setParameters(
            [
                'method' => 'API.get',
                'idSite' => $idSite,
                'period' => $period,
                'date'   => $date,
            ]
        );

        return $this->getContents();
    }

    public function bulkRequest($urls = '', $format = '')
    {
        $this->setFormat($format);
        $this->setParameters(
            [
                'method' => 'API.getBulkRequest',
                'urls'   => $urls
            ]
        );

        return $this->getContents();
    }

    public function isPluginActivated($pluginName = '', $format = '')
    {
        $this->setFormat($format);
        $this->setParameters(
            [
                'method'     => 'API.isPluginActivated',
                'pluginName' => $pluginName
            ]
        );

        return $this->getContents();
    }

    public function suggestedValuesForSegment($segmentName = '', $idSite = '', $format = '')
    {
        $this->setFormat($format);
        $this->setParameters(
            [
                'method'      => 'API.getSuggestedValuesForSegment',
                'segmentName' => $segmentName,
                'idSite'      => $idSite
            ]
        );

        return $this->getContents();
    }

    public function glossaryReports($idSite = '', $format = '')
    {
        $this->setFormat($format);
        $this->setParameters(
            [
                'method' => 'API.getGlossaryReports',
                'idSite' => $idSite
            ]
        );

        return $this->getContents();
    }

    public function glossaryMetrics($idSite = '', $format = '')
    {
        $this->setFormat($format);
        $this->setParameters(
            [
                'method' => 'API.getGlossaryMetrics',
                'idSite' => $idSite
            ]
        );

        return $this->getContents();
    }

    private function setParameters(array $parameters)
    {
        foreach ($parameters as $parameterKey => $parameterValue) {
            $this->connection->setParameter($parameterKey, $parameterValue);
        }
    }

    private function setFormat($format = '')
    {
        if (empty($format)) {
            $format = $this->format;
        }

        $this->connection->setFormat($format);
    }

    private function getContents()
    {
        if (ConnectionInterface::FORMAT_SERIALIZED === $this->connection->getFormat()) {
            return \unserialize($this->connection->request()->getBody()->getContents());
        }

        if (ConnectionInterface::FORMAT_JSON === $this->connection->getFormat()) {
            return \json_decode($this->connection->request()->getBody()->getContents());
        }

        return $this->connection->request()->getBody()->getContents();
    }
}
