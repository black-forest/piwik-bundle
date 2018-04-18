<?php

namespace BlackForest\PiwikBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PiwikSite
 *
 * @ORM\Table(name="piwik_site")
 * @ORM\Entity(repositoryClass="BlackForest\PiwikBundle\Entity\PiwikSiteRepository")
 */
class PiwikSite
{
    /**
     * @var uuid
     *
     * @ORM\Column(name="uuid", type="uuid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="CUSTOM")
     */
    private $uuid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=false)
     */
    private $updated;

    /**
     * @var int
     *
     * @ORM\Column(name="idsite", type="integer", nullable=false)
     */
    private $idsite;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=90, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="mainUrl", type="string", length=255, nullable=false)
     */
    private $mainUrl;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="tsCreated", type="datetime", nullable=true)
     */
    private $tsCreated;

    /**
     * @var int
     *
     * @ORM\Column(name="ecommerce", type="integer", nullable=false)
     */
    private $ecommerce = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="sitesearch", type="integer", nullable=false)
     */
    private $sitesearch = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="sitesearchKeywordParameters", type="text", nullable=false)
     */
    private $sitesearchKeywordParameters = '';

    /**
     * @var string
     *
     * @ORM\Column(name="sitesearchCategoryParameters", type="text", nullable=false)
     */
    private $sitesearchCategoryParameters = '';

    /**
     * @var string
     *
     * @ORM\Column(name="timezone", type="string", length=50, nullable=false)
     */
    private $timezone = '';

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=3, nullable=false)
     */
    private $currency = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="excludeUnknownUrls", type="boolean", nullable=false)
     */
    private $excludeUnknownUrls = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="excludedIps", type="text", nullable=false)
     */
    private $excludedIps = '';

    /**
     * @var string
     *
     * @ORM\Column(name="excludedParameters", type="text", nullable=false)
     */
    private $excludedParameters = '';

    /**
     * @var string
     *
     * @ORM\Column(name="excludedUserAgents", type="text", nullable=false)
     */
    private $excludedUserAgents = '';

    /**
     * @var string
     *
     * @ORM\Column(name="groups", type="string", length=250, nullable=false)
     */
    private $groups = '';

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type = '';

    /**
     * @var int
     *
     * @ORM\Column(name="keepUrlFragment", type="integer", nullable=false)
     */
    private $keepUrlFragment = 0;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikVisit", mappedBy="site")
     */
    private $visit;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikVisitor", mappedBy="site")
     */
    private $visitor;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikVisitorType", mappedBy="site")
     */
    private $visitorType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikReferrerType", mappedBy="site")
     */
    private $referrerType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikSearchEngine", mappedBy="site")
     */
    private $searchEngine;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikLanguage", mappedBy="site")
     */
    private $language;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikDevice", mappedBy="site")
     */
    private $device;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikOperatingSystem", mappedBy="site")
     */
    private $operatingSystem;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikBrowser", mappedBy="site")
     */
    private $browser;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikCountry", mappedBy="site")
     */
    private $country;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikLocation", mappedBy="site")
     */
    private $location;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikResolution", mappedBy="site")
     */
    private $resolution;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikEcomerceStatus", mappedBy="site")
     */
    private $ecomerceStatus;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikVisitPlugin", mappedBy="site")
     */
    private $visitPlugin;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikCurrency", mappedBy="site")
     */
    private $currencies;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikVisitAction", mappedBy="site")
     */
    private $visitAction;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikAction", mappedBy="site")
     */
    private $action;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikActionType", mappedBy="site")
     */
    private $actionType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikPlugin", mappedBy="site")
     */
    private $plugin;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->visit = new \Doctrine\Common\Collections\ArrayCollection();
        $this->visitor = new \Doctrine\Common\Collections\ArrayCollection();
        $this->visitorType = new \Doctrine\Common\Collections\ArrayCollection();
        $this->referrerType = new \Doctrine\Common\Collections\ArrayCollection();
        $this->searchEngine = new \Doctrine\Common\Collections\ArrayCollection();
        $this->language = new \Doctrine\Common\Collections\ArrayCollection();
        $this->device = new \Doctrine\Common\Collections\ArrayCollection();
        $this->operatingSystem = new \Doctrine\Common\Collections\ArrayCollection();
        $this->browser = new \Doctrine\Common\Collections\ArrayCollection();
        $this->country = new \Doctrine\Common\Collections\ArrayCollection();
        $this->location = new \Doctrine\Common\Collections\ArrayCollection();
        $this->resolution = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ecomerceStatus = new \Doctrine\Common\Collections\ArrayCollection();
        $this->visitPlugin = new \Doctrine\Common\Collections\ArrayCollection();
        $this->currencies = new \Doctrine\Common\Collections\ArrayCollection();
        $this->visitAction = new \Doctrine\Common\Collections\ArrayCollection();
        $this->action = new \Doctrine\Common\Collections\ArrayCollection();
        $this->actionType = new \Doctrine\Common\Collections\ArrayCollection();
        $this->plugin = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get uuid.
     *
     * @return uuid
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Set created.
     *
     * @param \DateTime $created
     *
     * @return PiwikSite
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created.
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated.
     *
     * @param \DateTime $updated
     *
     * @return PiwikSite
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated.
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set idsite.
     *
     * @param int $idsite
     *
     * @return PiwikSite
     */
    public function setIdsite($idsite)
    {
        $this->idsite = $idsite;

        return $this;
    }

    /**
     * Get idsite.
     *
     * @return int
     */
    public function getIdsite()
    {
        return $this->idsite;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return PiwikSite
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set mainUrl.
     *
     * @param string $mainUrl
     *
     * @return PiwikSite
     */
    public function setMainUrl($mainUrl)
    {
        $this->mainUrl = $mainUrl;

        return $this;
    }

    /**
     * Get mainUrl.
     *
     * @return string
     */
    public function getMainUrl()
    {
        return $this->mainUrl;
    }

    /**
     * Set tsCreated.
     *
     * @param \DateTime|null $tsCreated
     *
     * @return PiwikSite
     */
    public function setTsCreated($tsCreated = null)
    {
        $this->tsCreated = $tsCreated;

        return $this;
    }

    /**
     * Get tsCreated.
     *
     * @return \DateTime|null
     */
    public function getTsCreated()
    {
        return $this->tsCreated;
    }

    /**
     * Set ecommerce.
     *
     * @param int $ecommerce
     *
     * @return PiwikSite
     */
    public function setEcommerce($ecommerce)
    {
        $this->ecommerce = $ecommerce;

        return $this;
    }

    /**
     * Get ecommerce.
     *
     * @return int
     */
    public function getEcommerce()
    {
        return $this->ecommerce;
    }

    /**
     * Set sitesearch.
     *
     * @param int $sitesearch
     *
     * @return PiwikSite
     */
    public function setSitesearch($sitesearch)
    {
        $this->sitesearch = $sitesearch;

        return $this;
    }

    /**
     * Get sitesearch.
     *
     * @return int
     */
    public function getSitesearch()
    {
        return $this->sitesearch;
    }

    /**
     * Set sitesearchKeywordParameters.
     *
     * @param string $sitesearchKeywordParameters
     *
     * @return PiwikSite
     */
    public function setSitesearchKeywordParameters($sitesearchKeywordParameters)
    {
        $this->sitesearchKeywordParameters = $sitesearchKeywordParameters;

        return $this;
    }

    /**
     * Get sitesearchKeywordParameters.
     *
     * @return string
     */
    public function getSitesearchKeywordParameters()
    {
        return $this->sitesearchKeywordParameters;
    }

    /**
     * Set sitesearchCategoryParameters.
     *
     * @param string $sitesearchCategoryParameters
     *
     * @return PiwikSite
     */
    public function setSitesearchCategoryParameters($sitesearchCategoryParameters)
    {
        $this->sitesearchCategoryParameters = $sitesearchCategoryParameters;

        return $this;
    }

    /**
     * Get sitesearchCategoryParameters.
     *
     * @return string
     */
    public function getSitesearchCategoryParameters()
    {
        return $this->sitesearchCategoryParameters;
    }

    /**
     * Set timezone.
     *
     * @param string $timezone
     *
     * @return PiwikSite
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get timezone.
     *
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Set currency.
     *
     * @param string $currency
     *
     * @return PiwikSite
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency.
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set excludeUnknownUrls.
     *
     * @param bool $excludeUnknownUrls
     *
     * @return PiwikSite
     */
    public function setExcludeUnknownUrls($excludeUnknownUrls)
    {
        $this->excludeUnknownUrls = $excludeUnknownUrls;

        return $this;
    }

    /**
     * Get excludeUnknownUrls.
     *
     * @return bool
     */
    public function getExcludeUnknownUrls()
    {
        return $this->excludeUnknownUrls;
    }

    /**
     * Set excludedIps.
     *
     * @param string $excludedIps
     *
     * @return PiwikSite
     */
    public function setExcludedIps($excludedIps)
    {
        $this->excludedIps = $excludedIps;

        return $this;
    }

    /**
     * Get excludedIps.
     *
     * @return string
     */
    public function getExcludedIps()
    {
        return $this->excludedIps;
    }

    /**
     * Set excludedParameters.
     *
     * @param string $excludedParameters
     *
     * @return PiwikSite
     */
    public function setExcludedParameters($excludedParameters)
    {
        $this->excludedParameters = $excludedParameters;

        return $this;
    }

    /**
     * Get excludedParameters.
     *
     * @return string
     */
    public function getExcludedParameters()
    {
        return $this->excludedParameters;
    }

    /**
     * Set excludedUserAgents.
     *
     * @param string $excludedUserAgents
     *
     * @return PiwikSite
     */
    public function setExcludedUserAgents($excludedUserAgents)
    {
        $this->excludedUserAgents = $excludedUserAgents;

        return $this;
    }

    /**
     * Get excludedUserAgents.
     *
     * @return string
     */
    public function getExcludedUserAgents()
    {
        return $this->excludedUserAgents;
    }

    /**
     * Set groups.
     *
     * @param string $groups
     *
     * @return PiwikSite
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;

        return $this;
    }

    /**
     * Get groups.
     *
     * @return string
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Set type.
     *
     * @param string $type
     *
     * @return PiwikSite
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set keepUrlFragment.
     *
     * @param int $keepUrlFragment
     *
     * @return PiwikSite
     */
    public function setKeepUrlFragment($keepUrlFragment)
    {
        $this->keepUrlFragment = $keepUrlFragment;

        return $this;
    }

    /**
     * Get keepUrlFragment.
     *
     * @return int
     */
    public function getKeepUrlFragment()
    {
        return $this->keepUrlFragment;
    }

    /**
     * Add visit.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisit $visit
     *
     * @return PiwikSite
     */
    public function addVisit(\BlackForest\PiwikBundle\Entity\PiwikVisit $visit)
    {
        $this->visit[] = $visit;

        return $this;
    }

    /**
     * Remove visit.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisit $visit
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeVisit(\BlackForest\PiwikBundle\Entity\PiwikVisit $visit)
    {
        return $this->visit->removeElement($visit);
    }

    /**
     * Get visit.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVisit()
    {
        return $this->visit;
    }

    /**
     * Add visitor.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisitor $visitor
     *
     * @return PiwikSite
     */
    public function addVisitor(\BlackForest\PiwikBundle\Entity\PiwikVisitor $visitor)
    {
        $this->visitor[] = $visitor;

        return $this;
    }

    /**
     * Remove visitor.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisitor $visitor
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeVisitor(\BlackForest\PiwikBundle\Entity\PiwikVisitor $visitor)
    {
        return $this->visitor->removeElement($visitor);
    }

    /**
     * Get visitor.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVisitor()
    {
        return $this->visitor;
    }

    /**
     * Add visitorType.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisitorType $visitorType
     *
     * @return PiwikSite
     */
    public function addVisitorType(\BlackForest\PiwikBundle\Entity\PiwikVisitorType $visitorType)
    {
        $this->visitorType[] = $visitorType;

        return $this;
    }

    /**
     * Remove visitorType.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisitorType $visitorType
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeVisitorType(\BlackForest\PiwikBundle\Entity\PiwikVisitorType $visitorType)
    {
        return $this->visitorType->removeElement($visitorType);
    }

    /**
     * Get visitorType.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVisitorType()
    {
        return $this->visitorType;
    }

    /**
     * Add referrerType.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikReferrerType $referrerType
     *
     * @return PiwikSite
     */
    public function addReferrerType(\BlackForest\PiwikBundle\Entity\PiwikReferrerType $referrerType)
    {
        $this->referrerType[] = $referrerType;

        return $this;
    }

    /**
     * Remove referrerType.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikReferrerType $referrerType
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeReferrerType(\BlackForest\PiwikBundle\Entity\PiwikReferrerType $referrerType)
    {
        return $this->referrerType->removeElement($referrerType);
    }

    /**
     * Get referrerType.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReferrerType()
    {
        return $this->referrerType;
    }

    /**
     * Add searchEngine.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikSearchEngine $searchEngine
     *
     * @return PiwikSite
     */
    public function addSearchEngine(\BlackForest\PiwikBundle\Entity\PiwikSearchEngine $searchEngine)
    {
        $this->searchEngine[] = $searchEngine;

        return $this;
    }

    /**
     * Remove searchEngine.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikSearchEngine $searchEngine
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSearchEngine(\BlackForest\PiwikBundle\Entity\PiwikSearchEngine $searchEngine)
    {
        return $this->searchEngine->removeElement($searchEngine);
    }

    /**
     * Get searchEngine.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSearchEngine()
    {
        return $this->searchEngine;
    }

    /**
     * Add language.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikLanguage $language
     *
     * @return PiwikSite
     */
    public function addLanguage(\BlackForest\PiwikBundle\Entity\PiwikLanguage $language)
    {
        $this->language[] = $language;

        return $this;
    }

    /**
     * Remove language.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikLanguage $language
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeLanguage(\BlackForest\PiwikBundle\Entity\PiwikLanguage $language)
    {
        return $this->language->removeElement($language);
    }

    /**
     * Get language.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Add device.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikDevice $device
     *
     * @return PiwikSite
     */
    public function addDevice(\BlackForest\PiwikBundle\Entity\PiwikDevice $device)
    {
        $this->device[] = $device;

        return $this;
    }

    /**
     * Remove device.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikDevice $device
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeDevice(\BlackForest\PiwikBundle\Entity\PiwikDevice $device)
    {
        return $this->device->removeElement($device);
    }

    /**
     * Get device.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * Add operatingSystem.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikOperatingSystem $operatingSystem
     *
     * @return PiwikSite
     */
    public function addOperatingSystem(\BlackForest\PiwikBundle\Entity\PiwikOperatingSystem $operatingSystem)
    {
        $this->operatingSystem[] = $operatingSystem;

        return $this;
    }

    /**
     * Remove operatingSystem.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikOperatingSystem $operatingSystem
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeOperatingSystem(\BlackForest\PiwikBundle\Entity\PiwikOperatingSystem $operatingSystem)
    {
        return $this->operatingSystem->removeElement($operatingSystem);
    }

    /**
     * Get operatingSystem.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOperatingSystem()
    {
        return $this->operatingSystem;
    }

    /**
     * Add browser.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikBrowser $browser
     *
     * @return PiwikSite
     */
    public function addBrowser(\BlackForest\PiwikBundle\Entity\PiwikBrowser $browser)
    {
        $this->browser[] = $browser;

        return $this;
    }

    /**
     * Remove browser.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikBrowser $browser
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeBrowser(\BlackForest\PiwikBundle\Entity\PiwikBrowser $browser)
    {
        return $this->browser->removeElement($browser);
    }

    /**
     * Get browser.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * Add country.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikCountry $country
     *
     * @return PiwikSite
     */
    public function addCountry(\BlackForest\PiwikBundle\Entity\PiwikCountry $country)
    {
        $this->country[] = $country;

        return $this;
    }

    /**
     * Remove country.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikCountry $country
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCountry(\BlackForest\PiwikBundle\Entity\PiwikCountry $country)
    {
        return $this->country->removeElement($country);
    }

    /**
     * Get country.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add location.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikLocation $location
     *
     * @return PiwikSite
     */
    public function addLocation(\BlackForest\PiwikBundle\Entity\PiwikLocation $location)
    {
        $this->location[] = $location;

        return $this;
    }

    /**
     * Remove location.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikLocation $location
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeLocation(\BlackForest\PiwikBundle\Entity\PiwikLocation $location)
    {
        return $this->location->removeElement($location);
    }

    /**
     * Get location.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Add resolution.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikResolution $resolution
     *
     * @return PiwikSite
     */
    public function addResolution(\BlackForest\PiwikBundle\Entity\PiwikResolution $resolution)
    {
        $this->resolution[] = $resolution;

        return $this;
    }

    /**
     * Remove resolution.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikResolution $resolution
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeResolution(\BlackForest\PiwikBundle\Entity\PiwikResolution $resolution)
    {
        return $this->resolution->removeElement($resolution);
    }

    /**
     * Get resolution.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResolution()
    {
        return $this->resolution;
    }

    /**
     * Add ecomerceStatus.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikEcomerceStatus $ecomerceStatus
     *
     * @return PiwikSite
     */
    public function addEcomerceStatus(\BlackForest\PiwikBundle\Entity\PiwikEcomerceStatus $ecomerceStatus)
    {
        $this->ecomerceStatus[] = $ecomerceStatus;

        return $this;
    }

    /**
     * Remove ecomerceStatus.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikEcomerceStatus $ecomerceStatus
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeEcomerceStatus(\BlackForest\PiwikBundle\Entity\PiwikEcomerceStatus $ecomerceStatus)
    {
        return $this->ecomerceStatus->removeElement($ecomerceStatus);
    }

    /**
     * Get ecomerceStatus.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEcomerceStatus()
    {
        return $this->ecomerceStatus;
    }

    /**
     * Add visitPlugin.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisitPlugin $visitPlugin
     *
     * @return PiwikSite
     */
    public function addVisitPlugin(\BlackForest\PiwikBundle\Entity\PiwikVisitPlugin $visitPlugin)
    {
        $this->visitPlugin[] = $visitPlugin;

        return $this;
    }

    /**
     * Remove visitPlugin.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisitPlugin $visitPlugin
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeVisitPlugin(\BlackForest\PiwikBundle\Entity\PiwikVisitPlugin $visitPlugin)
    {
        return $this->visitPlugin->removeElement($visitPlugin);
    }

    /**
     * Get visitPlugin.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVisitPlugin()
    {
        return $this->visitPlugin;
    }

    /**
     * Add currency.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikCurrency $currency
     *
     * @return PiwikSite
     */
    public function addCurrency(\BlackForest\PiwikBundle\Entity\PiwikCurrency $currency)
    {
        $this->currencies[] = $currency;

        return $this;
    }

    /**
     * Remove currency.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikCurrency $currency
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCurrency(\BlackForest\PiwikBundle\Entity\PiwikCurrency $currency)
    {
        return $this->currencies->removeElement($currency);
    }

    /**
     * Get currencies.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCurrencies()
    {
        return $this->currencies;
    }

    /**
     * Add visitAction.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisitAction $visitAction
     *
     * @return PiwikSite
     */
    public function addVisitAction(\BlackForest\PiwikBundle\Entity\PiwikVisitAction $visitAction)
    {
        $this->visitAction[] = $visitAction;

        return $this;
    }

    /**
     * Remove visitAction.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisitAction $visitAction
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeVisitAction(\BlackForest\PiwikBundle\Entity\PiwikVisitAction $visitAction)
    {
        return $this->visitAction->removeElement($visitAction);
    }

    /**
     * Get visitAction.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVisitAction()
    {
        return $this->visitAction;
    }

    /**
     * Add action.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikAction $action
     *
     * @return PiwikSite
     */
    public function addAction(\BlackForest\PiwikBundle\Entity\PiwikAction $action)
    {
        $this->action[] = $action;

        return $this;
    }

    /**
     * Remove action.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikAction $action
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeAction(\BlackForest\PiwikBundle\Entity\PiwikAction $action)
    {
        return $this->action->removeElement($action);
    }

    /**
     * Get action.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Add actionType.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikActionType $actionType
     *
     * @return PiwikSite
     */
    public function addActionType(\BlackForest\PiwikBundle\Entity\PiwikActionType $actionType)
    {
        $this->actionType[] = $actionType;

        return $this;
    }

    /**
     * Remove actionType.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikActionType $actionType
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeActionType(\BlackForest\PiwikBundle\Entity\PiwikActionType $actionType)
    {
        return $this->actionType->removeElement($actionType);
    }

    /**
     * Get actionType.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActionType()
    {
        return $this->actionType;
    }

    /**
     * Add plugin.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikPlugin $plugin
     *
     * @return PiwikSite
     */
    public function addPlugin(\BlackForest\PiwikBundle\Entity\PiwikPlugin $plugin)
    {
        $this->plugin[] = $plugin;

        return $this;
    }

    /**
     * Remove plugin.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikPlugin $plugin
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePlugin(\BlackForest\PiwikBundle\Entity\PiwikPlugin $plugin)
    {
        return $this->plugin->removeElement($plugin);
    }

    /**
     * Get plugin.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlugin()
    {
        return $this->plugin;
    }
}
