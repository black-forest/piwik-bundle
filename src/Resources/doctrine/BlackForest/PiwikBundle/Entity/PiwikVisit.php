<?php

namespace BlackForest\PiwikBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PiwikVisit
 *
 * @ORM\Table(name="piwik_visit")
 * @ORM\Entity(repositoryClass="BlackForest\PiwikBundle\Entity\PiwikVisitRepository")
 */
class PiwikVisit
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
     * @ORM\Column(name="idVisit", type="bigint", nullable=false)
     */
    private $idVisit;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikVisitAction", mappedBy="visit")
     */
    private $visitAction;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikSite
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikSite", inversedBy="visit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="site_id", referencedColumnName="uuid")
     * })
     */
    private $site;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikCurrency
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikCurrency", inversedBy="visit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="currency_id", referencedColumnName="uuid")
     * })
     */
    private $currency;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikVisitor
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikVisitor", inversedBy="visit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="visitor_id", referencedColumnName="uuid")
     * })
     */
    private $visitor;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikVisitorType
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikVisitorType", inversedBy="visit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="visitorType_id", referencedColumnName="uuid")
     * })
     */
    private $visitorType;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikEcomerceStatus
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikEcomerceStatus", inversedBy="visit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ecommmerceStatus_id", referencedColumnName="uuid")
     * })
     */
    private $ecommmerceStatus;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikReferrerType
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikReferrerType", inversedBy="visit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="referrerType_id", referencedColumnName="uuid")
     * })
     */
    private $referrerType;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikSearchEngine
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikSearchEngine", inversedBy="visit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="searchEngine_id", referencedColumnName="uuid")
     * })
     */
    private $searchEngine;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikLanguage
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikLanguage", inversedBy="visit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="language_id", referencedColumnName="uuid")
     * })
     */
    private $language;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikDevice
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikDevice", inversedBy="visit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="device_id", referencedColumnName="uuid")
     * })
     */
    private $device;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikOperatingSystem
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikOperatingSystem", inversedBy="visit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="operatingSystem_id", referencedColumnName="uuid")
     * })
     */
    private $operatingSystem;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikBrowser
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikBrowser", inversedBy="visit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="browser_id", referencedColumnName="uuid")
     * })
     */
    private $browser;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikCountry
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikCountry", inversedBy="visit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="uuid")
     * })
     */
    private $country;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikLocation
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikLocation", inversedBy="visit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="location_id", referencedColumnName="uuid")
     * })
     */
    private $location;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikResolution
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikResolution", inversedBy="visit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="resolution_id", referencedColumnName="uuid")
     * })
     */
    private $resolution;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikVisitPlugin
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikVisitPlugin", inversedBy="visit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="plugin_id", referencedColumnName="uuid")
     * })
     */
    private $plugin;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->visitAction = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return PiwikVisit
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
     * @return PiwikVisit
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
     * Set idVisit.
     *
     * @param int $idVisit
     *
     * @return PiwikVisit
     */
    public function setIdVisit($idVisit)
    {
        $this->idVisit = $idVisit;

        return $this;
    }

    /**
     * Get idVisit.
     *
     * @return int
     */
    public function getIdVisit()
    {
        return $this->idVisit;
    }

    /**
     * Set goalConversions.
     *
     * @param int|null $goalConversions
     *
     * @return PiwikVisit
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
     * @return PiwikVisit
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
     * @return PiwikVisit
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
     * @return PiwikVisit
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
     * @return PiwikVisit
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
     * @return PiwikVisit
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
     * @return PiwikVisit
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
     * @return PiwikVisit
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
     * @return PiwikVisit
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
     * @return PiwikVisit
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
     * Set totalEcommerceRevenue.
     *
     * @param string|null $totalEcommerceRevenue
     *
     * @return PiwikVisit
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
     * @return PiwikVisit
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
     * @return PiwikVisit
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
     * @return PiwikVisit
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
     * @return PiwikVisit
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
     * @return PiwikVisit
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
     * @return PiwikVisit
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
     * Add visitAction.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisitAction $visitAction
     *
     * @return PiwikVisit
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
     * Set site.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikSite|null $site
     *
     * @return PiwikVisit
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
     * @return PiwikVisit
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
     * Set visitor.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisitor|null $visitor
     *
     * @return PiwikVisit
     */
    public function setVisitor(\BlackForest\PiwikBundle\Entity\PiwikVisitor $visitor = null)
    {
        $this->visitor = $visitor;

        return $this;
    }

    /**
     * Get visitor.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikVisitor|null
     */
    public function getVisitor()
    {
        return $this->visitor;
    }

    /**
     * Set visitorType.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisitorType|null $visitorType
     *
     * @return PiwikVisit
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
     * @return PiwikVisit
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
     * @return PiwikVisit
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
     * Set searchEngine.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikSearchEngine|null $searchEngine
     *
     * @return PiwikVisit
     */
    public function setSearchEngine(\BlackForest\PiwikBundle\Entity\PiwikSearchEngine $searchEngine = null)
    {
        $this->searchEngine = $searchEngine;

        return $this;
    }

    /**
     * Get searchEngine.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikSearchEngine|null
     */
    public function getSearchEngine()
    {
        return $this->searchEngine;
    }

    /**
     * Set language.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikLanguage|null $language
     *
     * @return PiwikVisit
     */
    public function setLanguage(\BlackForest\PiwikBundle\Entity\PiwikLanguage $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikLanguage|null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set device.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikDevice|null $device
     *
     * @return PiwikVisit
     */
    public function setDevice(\BlackForest\PiwikBundle\Entity\PiwikDevice $device = null)
    {
        $this->device = $device;

        return $this;
    }

    /**
     * Get device.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikDevice|null
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * Set operatingSystem.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikOperatingSystem|null $operatingSystem
     *
     * @return PiwikVisit
     */
    public function setOperatingSystem(\BlackForest\PiwikBundle\Entity\PiwikOperatingSystem $operatingSystem = null)
    {
        $this->operatingSystem = $operatingSystem;

        return $this;
    }

    /**
     * Get operatingSystem.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikOperatingSystem|null
     */
    public function getOperatingSystem()
    {
        return $this->operatingSystem;
    }

    /**
     * Set browser.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikBrowser|null $browser
     *
     * @return PiwikVisit
     */
    public function setBrowser(\BlackForest\PiwikBundle\Entity\PiwikBrowser $browser = null)
    {
        $this->browser = $browser;

        return $this;
    }

    /**
     * Get browser.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikBrowser|null
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * Set country.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikCountry|null $country
     *
     * @return PiwikVisit
     */
    public function setCountry(\BlackForest\PiwikBundle\Entity\PiwikCountry $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikCountry|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set location.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikLocation|null $location
     *
     * @return PiwikVisit
     */
    public function setLocation(\BlackForest\PiwikBundle\Entity\PiwikLocation $location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikLocation|null
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set resolution.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikResolution|null $resolution
     *
     * @return PiwikVisit
     */
    public function setResolution(\BlackForest\PiwikBundle\Entity\PiwikResolution $resolution = null)
    {
        $this->resolution = $resolution;

        return $this;
    }

    /**
     * Get resolution.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikResolution|null
     */
    public function getResolution()
    {
        return $this->resolution;
    }

    /**
     * Set plugin.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisitPlugin|null $plugin
     *
     * @return PiwikVisit
     */
    public function setPlugin(\BlackForest\PiwikBundle\Entity\PiwikVisitPlugin $plugin = null)
    {
        $this->plugin = $plugin;

        return $this;
    }

    /**
     * Get plugin.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikVisitPlugin|null
     */
    public function getPlugin()
    {
        return $this->plugin;
    }
}
