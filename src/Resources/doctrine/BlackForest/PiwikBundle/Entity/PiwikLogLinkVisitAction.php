<?php

namespace BlackForest\PiwikBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PiwikLogLinkVisitAction
 *
 * @ORM\Table(name="piwik_log_link_visit_action")
 * @ORM\Entity(repositoryClass="BlackForest\PiwikBundle\Entity\PiwikLogLogLinkVisitActionRepository")
 */
class PiwikLogLinkVisitAction
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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=32, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="logAction", type="string", length=32, nullable=false)
     */
    private $logAction;

    /**
     * @var int
     *
     * @ORM\Column(name="pageIdAction", type="integer", nullable=false)
     */
    private $pageIdAction;

    /**
     * @var int
     *
     * @ORM\Column(name="pageId", type="integer", nullable=false)
     */
    private $pageId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timeSpent", type="time", nullable=false)
     */
    private $timeSpent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="generationTime", type="time", nullable=false)
     */
    private $generationTime;

    /**
     * @var int
     *
     * @ORM\Column(name="interactionPosition", type="integer", nullable=false)
     */
    private $interactionPosition;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikActionType
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikActionType", inversedBy="logLinkVisitAction")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type", referencedColumnName="uuid")
     * })
     */
    private $typeDetail;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikLogAction
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikLogAction", inversedBy="logLinkVisitAction")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="logAction", referencedColumnName="uuid")
     * })
     */
    private $logActionDetail;


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
     * @return PiwikLogLinkVisitAction
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
     * @return PiwikLogLinkVisitAction
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
     * Set type.
     *
     * @param string $type
     *
     * @return PiwikLogLinkVisitAction
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
     * Set logAction.
     *
     * @param string $logAction
     *
     * @return PiwikLogLinkVisitAction
     */
    public function setLogAction($logAction)
    {
        $this->logAction = $logAction;

        return $this;
    }

    /**
     * Get logAction.
     *
     * @return string
     */
    public function getLogAction()
    {
        return $this->logAction;
    }

    /**
     * Set pageIdAction.
     *
     * @param int $pageIdAction
     *
     * @return PiwikLogLinkVisitAction
     */
    public function setPageIdAction($pageIdAction)
    {
        $this->pageIdAction = $pageIdAction;

        return $this;
    }

    /**
     * Get pageIdAction.
     *
     * @return int
     */
    public function getPageIdAction()
    {
        return $this->pageIdAction;
    }

    /**
     * Set pageId.
     *
     * @param int $pageId
     *
     * @return PiwikLogLinkVisitAction
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
     * Set timeSpent.
     *
     * @param \DateTime $timeSpent
     *
     * @return PiwikLogLinkVisitAction
     */
    public function setTimeSpent($timeSpent)
    {
        $this->timeSpent = $timeSpent;

        return $this;
    }

    /**
     * Get timeSpent.
     *
     * @return \DateTime
     */
    public function getTimeSpent()
    {
        return $this->timeSpent;
    }

    /**
     * Set generationTime.
     *
     * @param \DateTime $generationTime
     *
     * @return PiwikLogLinkVisitAction
     */
    public function setGenerationTime($generationTime)
    {
        $this->generationTime = $generationTime;

        return $this;
    }

    /**
     * Get generationTime.
     *
     * @return \DateTime
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
     * @return PiwikLogLinkVisitAction
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
     * Set typeDetail.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikActionType|null $typeDetail
     *
     * @return PiwikLogLinkVisitAction
     */
    public function setTypeDetail(\BlackForest\PiwikBundle\Entity\PiwikActionType $typeDetail = null)
    {
        $this->typeDetail = $typeDetail;

        return $this;
    }

    /**
     * Get typeDetail.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikActionType|null
     */
    public function getTypeDetail()
    {
        return $this->typeDetail;
    }

    /**
     * Set logActionDetail.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikLogAction|null $logActionDetail
     *
     * @return PiwikLogLinkVisitAction
     */
    public function setLogActionDetail(\BlackForest\PiwikBundle\Entity\PiwikLogAction $logActionDetail = null)
    {
        $this->logActionDetail = $logActionDetail;

        return $this;
    }

    /**
     * Get logActionDetail.
     *
     * @return \BlackForest\PiwikBundle\Entity\PiwikLogAction|null
     */
    public function getLogActionDetail()
    {
        return $this->logActionDetail;
    }
}
