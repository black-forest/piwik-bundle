<?php

namespace BlackForest\PiwikBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PiwikVisitPlugin
 *
 * @ORM\Table(name="piwik_visit_plugin")
 * @ORM\Entity(repositoryClass="BlackForest\PiwikBundle\Entity\PiwikVisitPluginRepository")
 */
class PiwikVisitPlugin
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikVisit", mappedBy="plugin")
     */
    private $visit;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikPlugin", mappedBy="visitPlugin")
     */
    private $plugin;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikSite
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikSite", inversedBy="visitPlugin")
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
        $this->visit = new \Doctrine\Common\Collections\ArrayCollection();
        $this->plugin = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set uuid.
     *
     * @param string $uuid
     *
     * @return PiwikVisitPlugin
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
     * @return PiwikVisitPlugin
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
     * @return PiwikVisitPlugin
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
     * Add visit.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisit $visit
     *
     * @return PiwikVisitPlugin
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
     * Add plugin.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikPlugin $plugin
     *
     * @return PiwikVisitPlugin
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

    /**
     * Set site.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikSite|null $site
     *
     * @return PiwikVisitPlugin
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
