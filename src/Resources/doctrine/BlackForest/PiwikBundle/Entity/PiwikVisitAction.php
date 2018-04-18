<?php

namespace BlackForest\PiwikBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PiwikVisitAction
 *
 * @ORM\Table(name="piwik_visit_action")
 * @ORM\Entity(repositoryClass="BlackForest\PiwikBundle\Entity\PiwikVisitActionRepository")
 */
class PiwikVisitAction
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
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=false)
     */
    private $time;

    /**
     * @var int
     *
     * @ORM\Column(name="pageId", type="integer", nullable=false)
     */
    private $pageId;

    /**
     * @var string
     *
     * @ORM\Column(name="idpageview", type="string", length=6, nullable=false)
     */
    private $idpageview;

    /**
     * @var string
     *
     * @ORM\Column(name="generationTime", type="decimal", nullable=false)
     */
    private $generationTime;

    /**
     * @var int
     *
     * @ORM\Column(name="interactionPosition", type="integer", nullable=false)
     */
    private $interactionPosition;

    /**
     * @var string|null
     *
     * @ORM\Column(name="icon", type="text", nullable=true)
     */
    private $icon;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikSite
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikSite", inversedBy="visitAction")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="site_id", referencedColumnName="uuid")
     * })
     */
    private $site;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikVisit
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikVisit", inversedBy="visitAction")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="visit_id", referencedColumnName="uuid")
     * })
     */
    private $visit;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikActionType
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikActionType", inversedBy="visitAction")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_id", referencedColumnName="uuid")
     * })
     */
    private $type;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikAction
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikAction", inversedBy="visitAction")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="action_id", referencedColumnName="uuid")
     * })
     */
    private $action;


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
     * @return PiwikVisitAction
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
     * @return PiwikVisitAction
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
     * Set time.
     *
     * @param \DateTime $time
     *
     * @return PiwikVisitAction
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time.
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set pageId.
     *
     * @param int $pageId
     *
     * @return PiwikVisitAction
     */
    public function setPageId($pageId)
    {
        $this->pageId = $pageId;

        return $this;
    }

    /**
     * Get pageId.
     *
     * @return int
     */
    public function getPageId()
    {
        return $this->pageId;
    }

    /**
     * Set idpageview.
     *
     * @param string $idpageview
     *
     * @return PiwikVisitAction
     */
    public function setIdpageview($idpageview)
    {
        $this->idpageview = $idpageview;

        return $this;
    }

    /**
     * Get idpageview.
     *
     * @return string
     */
    public function getIdpageview()
    {
        return $this->idpageview;
    }

    /**
     * Set generationTime.
     *
     * @param string $generationTime
     *
     * @return PiwikVisitAction
     */
    public function setGenerationTime($generationTime)
    {
        $this->generationTime = $generationTime;

        return $this;
    }

    /**
     * Get generationTime.
     *
     * @return string
     */
    public function getGenerationTime()
    {
        return $this->generationTime;
    }

    /**
     * Set interactionPosition.
     *
     * @param int $interactionPosition
     *
     * @return PiwikVisitAction
     */
    public function setInteractionPosition($interactionPosition)
    {
        $this->interactionPosition = $interactionPosition;

        return $this;
    }

    /**
     * Get interactionPosition.
     *
     * @return int
     */
    public function getInteractionPosition()
    {
        return $this->interactionPosition;
    }

    /**
     * Set icon.
     *
     * @param string|null $icon
     *
     * @return PiwikVisitAction
     */
    public function setIcon($icon = null)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon.
     *
     * @return string|null
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set site.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikSite|null $site
     *
     * @return PiwikVisitAction
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
     * Set visit.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisit|null $visit
     *
     * @return PiwikVisitAction
     */
    public function setVisit(\BlackForest\PiwikBundle\Entity\PiwikVisit $visit = null)
    {
        $this->visit = $visit;

        return $this;
    }

    /**
     * Get visit.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikVisit|null
     */
    public function getVisit()
    {
        return $this->visit;
    }

    /**
     * Set type.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikActionType|null $type
     *
     * @return PiwikVisitAction
     */
    public function setType(\BlackForest\PiwikBundle\Entity\PiwikActionType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikActionType|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set action.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikAction|null $action
     *
     * @return PiwikVisitAction
     */
    public function setAction(\BlackForest\PiwikBundle\Entity\PiwikAction $action = null)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikAction|null
     */
    public function getAction()
    {
        return $this->action;
    }
}
