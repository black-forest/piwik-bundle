<?php

namespace BlackForest\PiwikBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PiwikLogVisit
 *
 * @ORM\Table(name="piwik_log_visit")
 * @ORM\Entity(repositoryClass="BlackForest\PiwikBundle\Entity\PiwikLogVisitRepository")
 */
class PiwikLogVisit
{
    /**
     * @var uuid_binary_ordered_time
     *
     * @ORM\Column(name="uuid", type="uuid_binary_ordered_time")
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
     * @ORM\Column(name="idvisit", type="bigint", nullable=false)
     */
    private $idvisit;

    /**
     * @var binary
     *
     * @ORM\Column(name="visitorId", type="binary", length=8, nullable=false)
     */
    private $visitorId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="goalConversions", type="integer", nullable=true)
     */
    private $goalConversions;

    /**
     * @var int|null
     *
     * @ORM\Column(name="userId", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="visitConverted", type="integer", nullable=true)
     */
    private $visitConverted;

    /**
     * @var string|null
     *
     * @ORM\Column(name="visitConvertedIcon", type="text", nullable=true)
     */
    private $visitConvertedIcon;

    /**
     * @var int|null
     *
     * @ORM\Column(name="daysSinceLastEcommerceOrder", type="integer", nullable=true)
     */
    private $daysSinceLastEcommerceOrder;

    /**
     * @var int|null
     *
     * @ORM\Column(name="searches", type="smallint", nullable=true)
     */
    private $searches;

    /**
     * @var string|null
     *
     * @ORM\Column(name="referrerName", type="string", length=128, nullable=true)
     */
    private $referrerName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="referrerKeyword", type="string", length=255, nullable=true)
     */
    private $referrerKeyword;

    /**
     * @var int|null
     *
     * @ORM\Column(name="referrerKeywordPosition", type="integer", nullable=true)
     */
    private $referrerKeywordPosition;

    /**
     * @var string|null
     *
     * @ORM\Column(name="referrerUrl", type="text", nullable=true)
     */
    private $referrerUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="searchEngine", type="string", length=32, nullable=true)
     */
    private $searchEngine;

    /**
     * @var string|null
     *
     * @ORM\Column(name="language", type="string", length=32, nullable=true)
     */
    private $language;

    /**
     * @var string|null
     *
     * @ORM\Column(name="device", type="string", length=32, nullable=true)
     */
    private $device;

    /**
     * @var string|null
     *
     * @ORM\Column(name="operatingSystem", type="string", length=32, nullable=true)
     */
    private $operatingSystem;

    /**
     * @var string|null
     *
     * @ORM\Column(name="browser", type="string", length=32, nullable=true)
     */
    private $browser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="totalEcommerceRevenue", type="decimal", nullable=true)
     */
    private $totalEcommerceRevenue;

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalEcommerceConversions", type="integer", nullable=true)
     */
    private $totalEcommerceConversions;

    /**
     * @var string|null
     *
     * @ORM\Column(name="totalEcommerceItems", type="string", length=64, nullable=true)
     */
    private $totalEcommerceItems;

    /**
     * @var string|null
     *
     * @ORM\Column(name="totalAbandonedCartsRevenue", type="decimal", nullable=true)
     */
    private $totalAbandonedCartsRevenue;

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalAbandonedCarts", type="integer", nullable=true)
     */
    private $totalAbandonedCarts;

    /**
     * @var string|null
     *
     * @ORM\Column(name="totalAbandonedCartsItems", type="string", length=64, nullable=true)
     */
    private $totalAbandonedCartsItems;

    /**
     * @var int|null
     *
     * @ORM\Column(name="events", type="integer", nullable=true)
     */
    private $events;

    /**
     * @var string|null
     *
     * @ORM\Column(name="country", type="string", length=32, nullable=true)
     */
    private $country;

    /**
     * @var string|null
     *
     * @ORM\Column(name="location", type="string", length=32, nullable=true)
     */
    private $location;

    /**
     * @var string|null
     *
     * @ORM\Column(name="resolution", type="string", length=32, nullable=true)
     */
    private $resolution;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikSite
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikSite", inversedBy="logVisit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="site_id", referencedColumnName="uuid")
     * })
     */
    private $site;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikCurrency
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikCurrency", inversedBy="logVisit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="currency_id", referencedColumnName="uuid")
     * })
     */
    private $currency;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikVisitorType
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikVisitorType", inversedBy="logVisit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="visitorType_id", referencedColumnName="uuid")
     * })
     */
    private $visitorType;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikEcomerceStatus
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikEcomerceStatus", inversedBy="logVisit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ecommmerceStatus_id", referencedColumnName="uuid")
     * })
     */
    private $ecommmerceStatus;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikReferrerType
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikReferrerType", inversedBy="logVisit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="referrerType", referencedColumnName="uuid")
     * })
     */
    private $referrerType;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikSearchEngine
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikSearchEngine", inversedBy="logVisit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="searchEngine", referencedColumnName="uuid")
     * })
     */
    private $searchEngineDetail;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikLanguage
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikLanguage", inversedBy="logVisit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="language", referencedColumnName="uuid")
     * })
     */
    private $languageDetail;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikDevice
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikDevice", inversedBy="logVisit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="device", referencedColumnName="uuid")
     * })
     */
    private $deviceDetail;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikOperatingSystem
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikOperatingSystem", inversedBy="logVisit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="operatingSystem", referencedColumnName="uuid")
     * })
     */
    private $operatingSystemDetail;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikBrowser
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikBrowser", inversedBy="logVisit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="browser", referencedColumnName="uuid")
     * })
     */
    private $browserDetail;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikCountry
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikCountry", inversedBy="logVisit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country", referencedColumnName="uuid")
     * })
     */
    private $countryDetail;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikResolution
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikResolution", inversedBy="logVisit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="resolution", referencedColumnName="uuid")
     * })
     */
    private $resolutionDetail;


    /**
     * Get uuid.
     *
     * @return uuid_binary_ordered_time
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
     * @return PiwikLogVisit
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
     * @return PiwikLogVisit
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
     * Set idvisit.
     *
     * @param int $idvisit
     *
     * @return PiwikLogVisit
     */
    public function setIdvisit($idvisit)
    {
        $this->idvisit = $idvisit;

        return $this;
    }

    /**
     * Get idvisit.
     *
     * @return int
     */
    public function getIdvisit()
    {
        return $this->idvisit;
    }

    /**
     * Set visitorId.
     *
     * @param binary $visitorId
     *
     * @return PiwikLogVisit
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;

        return $this;
    }

    /**
     * Get visitorId.
     *
     * @return binary
     */
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * Set goalConversions.
     *
     * @param int|null $goalConversions
     *
     * @return PiwikLogVisit
     */
    public function setGoalConversions($goalConversions = null)
    {
        $this->goalConversions = $goalConversions;

        return $this;
    }

    /**
     * Get goalConversions.
     *
     * @return int|null
     */
    public function getGoalConversions()
    {
        return $this->goalConversions;
    }

    /**
     * Set userId.
     *
     * @param int|null $userId
     *
     * @return PiwikLogVisit
     */
    public function setUserId($userId = null)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId.
     *
     * @return int|null
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set visitConverted.
     *
     * @param int|null $visitConverted
     *
     * @return PiwikLogVisit
     */
    public function setVisitConverted($visitConverted = null)
    {
        $this->visitConverted = $visitConverted;

        return $this;
    }

    /**
     * Get visitConverted.
     *
     * @return int|null
     */
    public function getVisitConverted()
    {
        return $this->visitConverted;
    }

    /**
     * Set visitConvertedIcon.
     *
     * @param string|null $visitConvertedIcon
     *
     * @return PiwikLogVisit
     */
    public function setVisitConvertedIcon($visitConvertedIcon = null)
    {
        $this->visitConvertedIcon = $visitConvertedIcon;

        return $this;
    }

    /**
     * Get visitConvertedIcon.
     *
     * @return string|null
     */
    public function getVisitConvertedIcon()
    {
        return $this->visitConvertedIcon;
    }

    /**
     * Set daysSinceLastEcommerceOrder.
     *
     * @param int|null $daysSinceLastEcommerceOrder
     *
     * @return PiwikLogVisit
     */
    public function setDaysSinceLastEcommerceOrder($daysSinceLastEcommerceOrder = null)
    {
        $this->daysSinceLastEcommerceOrder = $daysSinceLastEcommerceOrder;

        return $this;
    }

    /**
     * Get daysSinceLastEcommerceOrder.
     *
     * @return int|null
     */
    public function getDaysSinceLastEcommerceOrder()
    {
        return $this->daysSinceLastEcommerceOrder;
    }

    /**
     * Set searches.
     *
     * @param int|null $searches
     *
     * @return PiwikLogVisit
     */
    public function setSearches($searches = null)
    {
        $this->searches = $searches;

        return $this;
    }

    /**
     * Get searches.
     *
     * @return int|null
     */
    public function getSearches()
    {
        return $this->searches;
    }

    /**
     * Set referrerName.
     *
     * @param string|null $referrerName
     *
     * @return PiwikLogVisit
     */
    public function setReferrerName($referrerName = null)
    {
        $this->referrerName = $referrerName;

        return $this;
    }

    /**
     * Get referrerName.
     *
     * @return string|null
     */
    public function getReferrerName()
    {
        return $this->referrerName;
    }

    /**
     * Set referrerKeyword.
     *
     * @param string|null $referrerKeyword
     *
     * @return PiwikLogVisit
     */
    public function setReferrerKeyword($referrerKeyword = null)
    {
        $this->referrerKeyword = $referrerKeyword;

        return $this;
    }

    /**
     * Get referrerKeyword.
     *
     * @return string|null
     */
    public function getReferrerKeyword()
    {
        return $this->referrerKeyword;
    }

    /**
     * Set referrerKeywordPosition.
     *
     * @param int|null $referrerKeywordPosition
     *
     * @return PiwikLogVisit
     */
    public function setReferrerKeywordPosition($referrerKeywordPosition = null)
    {
        $this->referrerKeywordPosition = $referrerKeywordPosition;

        return $this;
    }

    /**
     * Get referrerKeywordPosition.
     *
     * @return int|null
     */
    public function getReferrerKeywordPosition()
    {
        return $this->referrerKeywordPosition;
    }

    /**
     * Set referrerUrl.
     *
     * @param string|null $referrerUrl
     *
     * @return PiwikLogVisit
     */
    public function setReferrerUrl($referrerUrl = null)
    {
        $this->referrerUrl = $referrerUrl;

        return $this;
    }

    /**
     * Get referrerUrl.
     *
     * @return string|null
     */
    public function getReferrerUrl()
    {
        return $this->referrerUrl;
    }

    /**
     * Set searchEngine.
     *
     * @param string|null $searchEngine
     *
     * @return PiwikLogVisit
     */
    public function setSearchEngine($searchEngine = null)
    {
        $this->searchEngine = $searchEngine;

        return $this;
    }

    /**
     * Get searchEngine.
     *
     * @return string|null
     */
    public function getSearchEngine()
    {
        return $this->searchEngine;
    }

    /**
     * Set language.
     *
     * @param string|null $language
     *
     * @return PiwikLogVisit
     */
    public function setLanguage($language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language.
     *
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set device.
     *
     * @param string|null $device
     *
     * @return PiwikLogVisit
     */
    public function setDevice($device = null)
    {
        $this->device = $device;

        return $this;
    }

    /**
     * Get device.
     *
     * @return string|null
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * Set operatingSystem.
     *
     * @param string|null $operatingSystem
     *
     * @return PiwikLogVisit
     */
    public function setOperatingSystem($operatingSystem = null)
    {
        $this->operatingSystem = $operatingSystem;

        return $this;
    }

    /**
     * Get operatingSystem.
     *
     * @return string|null
     */
    public function getOperatingSystem()
    {
        return $this->operatingSystem;
    }

    /**
     * Set browser.
     *
     * @param string|null $browser
     *
     * @return PiwikLogVisit
     */
    public function setBrowser($browser = null)
    {
        $this->browser = $browser;

        return $this;
    }

    /**
     * Get browser.
     *
     * @return string|null
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * Set totalEcommerceRevenue.
     *
     * @param string|null $totalEcommerceRevenue
     *
     * @return PiwikLogVisit
     */
    public function setTotalEcommerceRevenue($totalEcommerceRevenue = null)
    {
        $this->totalEcommerceRevenue = $totalEcommerceRevenue;

        return $this;
    }

    /**
     * Get totalEcommerceRevenue.
     *
     * @return string|null
     */
    public function getTotalEcommerceRevenue()
    {
        return $this->totalEcommerceRevenue;
    }

    /**
     * Set totalEcommerceConversions.
     *
     * @param int|null $totalEcommerceConversions
     *
     * @return PiwikLogVisit
     */
    public function setTotalEcommerceConversions($totalEcommerceConversions = null)
    {
        $this->totalEcommerceConversions = $totalEcommerceConversions;

        return $this;
    }

    /**
     * Get totalEcommerceConversions.
     *
     * @return int|null
     */
    public function getTotalEcommerceConversions()
    {
        return $this->totalEcommerceConversions;
    }

    /**
     * Set totalEcommerceItems.
     *
     * @param string|null $totalEcommerceItems
     *
     * @return PiwikLogVisit
     */
    public function setTotalEcommerceItems($totalEcommerceItems = null)
    {
        $this->totalEcommerceItems = $totalEcommerceItems;

        return $this;
    }

    /**
     * Get totalEcommerceItems.
     *
     * @return string|null
     */
    public function getTotalEcommerceItems()
    {
        return $this->totalEcommerceItems;
    }

    /**
     * Set totalAbandonedCartsRevenue.
     *
     * @param string|null $totalAbandonedCartsRevenue
     *
     * @return PiwikLogVisit
     */
    public function setTotalAbandonedCartsRevenue($totalAbandonedCartsRevenue = null)
    {
        $this->totalAbandonedCartsRevenue = $totalAbandonedCartsRevenue;

        return $this;
    }

    /**
     * Get totalAbandonedCartsRevenue.
     *
     * @return string|null
     */
    public function getTotalAbandonedCartsRevenue()
    {
        return $this->totalAbandonedCartsRevenue;
    }

    /**
     * Set totalAbandonedCarts.
     *
     * @param int|null $totalAbandonedCarts
     *
     * @return PiwikLogVisit
     */
    public function setTotalAbandonedCarts($totalAbandonedCarts = null)
    {
        $this->totalAbandonedCarts = $totalAbandonedCarts;

        return $this;
    }

    /**
     * Get totalAbandonedCarts.
     *
     * @return int|null
     */
    public function getTotalAbandonedCarts()
    {
        return $this->totalAbandonedCarts;
    }

    /**
     * Set totalAbandonedCartsItems.
     *
     * @param string|null $totalAbandonedCartsItems
     *
     * @return PiwikLogVisit
     */
    public function setTotalAbandonedCartsItems($totalAbandonedCartsItems = null)
    {
        $this->totalAbandonedCartsItems = $totalAbandonedCartsItems;

        return $this;
    }

    /**
     * Get totalAbandonedCartsItems.
     *
     * @return string|null
     */
    public function getTotalAbandonedCartsItems()
    {
        return $this->totalAbandonedCartsItems;
    }

    /**
     * Set events.
     *
     * @param int|null $events
     *
     * @return PiwikLogVisit
     */
    public function setEvents($events = null)
    {
        $this->events = $events;

        return $this;
    }

    /**
     * Get events.
     *
     * @return int|null
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Set country.
     *
     * @param string|null $country
     *
     * @return PiwikLogVisit
     */
    public function setCountry($country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country.
     *
     * @return string|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set location.
     *
     * @param string|null $location
     *
     * @return PiwikLogVisit
     */
    public function setLocation($location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location.
     *
     * @return string|null
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set resolution.
     *
     * @param string|null $resolution
     *
     * @return PiwikLogVisit
     */
    public function setResolution($resolution = null)
    {
        $this->resolution = $resolution;

        return $this;
    }

    /**
     * Get resolution.
     *
     * @return string|null
     */
    public function getResolution()
    {
        return $this->resolution;
    }

    /**
     * Set site.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikSite|null $site
     *
     * @return PiwikLogVisit
     */
    public function setSite(\BlackForest\PiwikBundle\Entity\PiwikSite $site = null)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikSite|null
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set currency.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikCurrency|null $currency
     *
     * @return PiwikLogVisit
     */
    public function setCurrency(\BlackForest\PiwikBundle\Entity\PiwikCurrency $currency = null)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikCurrency|null
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set visitorType.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisitorType|null $visitorType
     *
     * @return PiwikLogVisit
     */
    public function setVisitorType(\BlackForest\PiwikBundle\Entity\PiwikVisitorType $visitorType = null)
    {
        $this->visitorType = $visitorType;

        return $this;
    }

    /**
     * Get visitorType.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikVisitorType|null
     */
    public function getVisitorType()
    {
        return $this->visitorType;
    }

    /**
     * Set ecommmerceStatus.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikEcomerceStatus|null $ecommmerceStatus
     *
     * @return PiwikLogVisit
     */
    public function setEcommmerceStatus(\BlackForest\PiwikBundle\Entity\PiwikEcomerceStatus $ecommmerceStatus = null)
    {
        $this->ecommmerceStatus = $ecommmerceStatus;

        return $this;
    }

    /**
     * Get ecommmerceStatus.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikEcomerceStatus|null
     */
    public function getEcommmerceStatus()
    {
        return $this->ecommmerceStatus;
    }

    /**
     * Set referrerType.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikReferrerType|null $referrerType
     *
     * @return PiwikLogVisit
     */
    public function setReferrerType(\BlackForest\PiwikBundle\Entity\PiwikReferrerType $referrerType = null)
    {
        $this->referrerType = $referrerType;

        return $this;
    }

    /**
     * Get referrerType.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikReferrerType|null
     */
    public function getReferrerType()
    {
        return $this->referrerType;
    }

    /**
     * Set searchEngineDetail.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikSearchEngine|null $searchEngineDetail
     *
     * @return PiwikLogVisit
     */
    public function setSearchEngineDetail(\BlackForest\PiwikBundle\Entity\PiwikSearchEngine $searchEngineDetail = null)
    {
        $this->searchEngineDetail = $searchEngineDetail;

        return $this;
    }

    /**
     * Get searchEngineDetail.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikSearchEngine|null
     */
    public function getSearchEngineDetail()
    {
        return $this->searchEngineDetail;
    }

    /**
     * Set languageDetail.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikLanguage|null $languageDetail
     *
     * @return PiwikLogVisit
     */
    public function setLanguageDetail(\BlackForest\PiwikBundle\Entity\PiwikLanguage $languageDetail = null)
    {
        $this->languageDetail = $languageDetail;

        return $this;
    }

    /**
     * Get languageDetail.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikLanguage|null
     */
    public function getLanguageDetail()
    {
        return $this->languageDetail;
    }

    /**
     * Set deviceDetail.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikDevice|null $deviceDetail
     *
     * @return PiwikLogVisit
     */
    public function setDeviceDetail(\BlackForest\PiwikBundle\Entity\PiwikDevice $deviceDetail = null)
    {
        $this->deviceDetail = $deviceDetail;

        return $this;
    }

    /**
     * Get deviceDetail.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikDevice|null
     */
    public function getDeviceDetail()
    {
        return $this->deviceDetail;
    }

    /**
     * Set operatingSystemDetail.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikOperatingSystem|null $operatingSystemDetail
     *
     * @return PiwikLogVisit
     */
    public function setOperatingSystemDetail(\BlackForest\PiwikBundle\Entity\PiwikOperatingSystem $operatingSystemDetail = null)
    {
        $this->operatingSystemDetail = $operatingSystemDetail;

        return $this;
    }

    /**
     * Get operatingSystemDetail.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikOperatingSystem|null
     */
    public function getOperatingSystemDetail()
    {
        return $this->operatingSystemDetail;
    }

    /**
     * Set browserDetail.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikBrowser|null $browserDetail
     *
     * @return PiwikLogVisit
     */
    public function setBrowserDetail(\BlackForest\PiwikBundle\Entity\PiwikBrowser $browserDetail = null)
    {
        $this->browserDetail = $browserDetail;

        return $this;
    }

    /**
     * Get browserDetail.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikBrowser|null
     */
    public function getBrowserDetail()
    {
        return $this->browserDetail;
    }

    /**
     * Set countryDetail.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikCountry|null $countryDetail
     *
     * @return PiwikLogVisit
     */
    public function setCountryDetail(\BlackForest\PiwikBundle\Entity\PiwikCountry $countryDetail = null)
    {
        $this->countryDetail = $countryDetail;

        return $this;
    }

    /**
     * Get countryDetail.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikCountry|null
     */
    public function getCountryDetail()
    {
        return $this->countryDetail;
    }

    /**
     * Set resolutionDetail.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikResolution|null $resolutionDetail
     *
     * @return PiwikLogVisit
     */
    public function setResolutionDetail(\BlackForest\PiwikBundle\Entity\PiwikResolution $resolutionDetail = null)
    {
        $this->resolutionDetail = $resolutionDetail;

        return $this;
    }

    /**
     * Get resolutionDetail.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikResolution|null
     */
    public function getResolutionDetail()
    {
        return $this->resolutionDetail;
    }
}
