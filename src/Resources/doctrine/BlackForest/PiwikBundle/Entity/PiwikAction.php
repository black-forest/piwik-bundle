<?php

namespace BlackForest\PiwikBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PiwikAction
 *
 * @ORM\Table(name="piwik_action")
 * @ORM\Entity(repositoryClass="BlackForest\PiwikBundle\Entity\PiwikActionRepository")
 */
class PiwikAction
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
     * @ORM\Column(name="scheme", type="string", length=6, nullable=false)
     */
    private $scheme;

    /**
     * @var string
     *
     * @ORM\Column(name="host", type="string", nullable=false)
     */
    private $host;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="text", nullable=false)
     */
    private $path;

    /**
     * @var string|null
     *
     * @ORM\Column(name="suffix", type="string", length=6, nullable=true)
     */
    private $suffix;

    /**
     * @var string|null
     *
     * @ORM\Column(name="query", type="text", nullable=true)
     */
    private $query;

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
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikVisitAction", mappedBy="action")
     */
    private $visitAction;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikSite
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikSite", inversedBy="action")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="site_id", referencedColumnName="uuid")
     * })
     */
    private $site;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->visitAction = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set uuid.
     *
     * @param string $uuid
     *
     * @return PiwikAction
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
     * @return PiwikAction
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
     * @return PiwikAction
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
     * Set scheme.
     *
     * @param string $scheme
     *
     * @return PiwikAction
     */
    public function setScheme($scheme)
    {
        $this->scheme = $scheme;

        return $this;
    }

    /**
     * Get scheme.
     *
     * @return string
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * Set host.
     *
     * @param string $host
     *
     * @return PiwikAction
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get host.
     *
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set path.
     *
     * @param string $path
     *
     * @return PiwikAction
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set suffix.
     *
     * @param string|null $suffix
     *
     * @return PiwikAction
     */
    public function setSuffix($suffix = null)
    {
        $this->suffix = $suffix;

        return $this;
    }

    /**
     * Get suffix.
     *
     * @return string|null
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * Set query.
     *
     * @param string|null $query
     *
     * @return PiwikAction
     */
    public function setQuery($query = null)
    {
        $this->query = $query;

        return $this;
    }

    /**
     * Get query.
     *
     * @return string|null
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Set pageTitle.
     *
     * @param string $pageTitle
     *
     * @return PiwikAction
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
     * @return PiwikAction
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
     * Add visitAction.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisitAction $visitAction
     *
     * @return PiwikAction
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
     * @return PiwikAction
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
}
