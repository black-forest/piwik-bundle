<?php

namespace BlackForest\PiwikBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PiwikVisitorType
 *
 * @ORM\Table(name="piwik_visitor_type")
 * @ORM\Entity(repositoryClass="BlackForest\PiwikBundle\Entity\PiwikVisitorTypeRepository")
 */
class PiwikVisitorType
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
     * @ORM\Column(name="name", type="string", length=24, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="icon", type="text", nullable=true)
     */
    private $icon;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikVisit", mappedBy="visitorType")
     */
    private $visit;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikSite
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikSite", inversedBy="visitorType")
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
    }

    /**
     * Set uuid.
     *
     * @param string $uuid
     *
     * @return PiwikVisitorType
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
     * @return PiwikVisitorType
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
     * @return PiwikVisitorType
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
     * Set name.
     *
     * @param string $name
     *
     * @return PiwikVisitorType
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
     * Set icon.
     *
     * @param string|null $icon
     *
     * @return PiwikVisitorType
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
     * Add visit.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisit $visit
     *
     * @return PiwikVisitorType
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
     * Set site.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikSite|null $site
     *
     * @return PiwikVisitorType
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
