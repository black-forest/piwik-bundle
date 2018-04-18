<?php

namespace BlackForest\PiwikBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PiwikLogAction
 *
 * @ORM\Table(name="piwik_log_action")
 * @ORM\Entity(repositoryClass="BlackForest\PiwikBundle\Entity\PiwikLogActionRepository")
 */
class PiwikLogAction
{
    /**
     * @var string
     *
     * @ORM\Column(name="uuid", type="string", length=32)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
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
     * @ORM\Column(name="url", type="text", nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="pageTitle", type="text", nullable=false)
     */
    private $pageTitle;

    /**
     * @var int
     *
     * @ORM\Column(name="pageIdAction", type="integer", nullable=false)
     */
    private $pageIdAction;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikLogLinkVisitAction", mappedBy="logActionDetail")
     */
    private $logLinkVisitAction;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->logLinkVisitAction = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set uuid.
     *
     * @param string $uuid
     *
     * @return PiwikLogAction
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Get uuid.
     *
     * @return string
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
     * @return PiwikLogAction
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
     * @return PiwikLogAction
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
     * Set url.
     *
     * @param string $url
     *
     * @return PiwikLogAction
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set pageTitle.
     *
     * @param string $pageTitle
     *
     * @return PiwikLogAction
     */
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;

        return $this;
    }

    /**
     * Get pageTitle.
     *
     * @return string
     */
    public function getPageTitle()
    {
        return $this->pageTitle;
    }

    /**
     * Set pageIdAction.
     *
     * @param int $pageIdAction
     *
     * @return PiwikLogAction
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
     * Add logLinkVisitAction.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikLogLinkVisitAction $logLinkVisitAction
     *
     * @return PiwikLogAction
     */
    public function addLogLinkVisitAction(\BlackForest\PiwikBundle\Entity\PiwikLogLinkVisitAction $logLinkVisitAction)
    {
        $this->logLinkVisitAction[] = $logLinkVisitAction;

        return $this;
    }

    /**
     * Remove logLinkVisitAction.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikLogLinkVisitAction $logLinkVisitAction
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeLogLinkVisitAction(\BlackForest\PiwikBundle\Entity\PiwikLogLinkVisitAction $logLinkVisitAction)
    {
        return $this->logLinkVisitAction->removeElement($logLinkVisitAction);
    }

    /**
     * Get logLinkVisitAction.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLogLinkVisitAction()
    {
        return $this->logLinkVisitAction;
    }
}
