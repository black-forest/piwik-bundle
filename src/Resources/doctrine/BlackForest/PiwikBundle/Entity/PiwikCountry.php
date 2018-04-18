<?php

namespace BlackForest\PiwikBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PiwikCountry
 *
 * @ORM\Table(name="piwik_country")
 * @ORM\Entity(repositoryClass="BlackForest\PiwikBundle\Entity\PiwikCountryRepository")
 */
class PiwikCountry
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
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=128, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="continent", type="string", length=128, nullable=false)
     */
    private $continent;

    /**
     * @var string
     *
     * @ORM\Column(name="continentCode", type="string", length=128, nullable=false)
     */
    private $continentCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="icon", type="text", nullable=true)
     */
    private $icon;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikVisit", mappedBy="country")
     */
    private $visit;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikLocation", mappedBy="country")
     */
    private $location;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikSite
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikSite", inversedBy="country")
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
        $this->location = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set uuid.
     *
     * @param string $uuid
     *
     * @return PiwikCountry
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
     * @return PiwikCountry
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
     * @return PiwikCountry
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
     * @return PiwikCountry
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
     * Set code.
     *
     * @param string $code
     *
     * @return PiwikCountry
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set continent.
     *
     * @param string $continent
     *
     * @return PiwikCountry
     */
    public function setContinent($continent)
    {
        $this->continent = $continent;

        return $this;
    }

    /**
     * Get continent.
     *
     * @return string
     */
    public function getContinent()
    {
        return $this->continent;
    }

    /**
     * Set continentCode.
     *
     * @param string $continentCode
     *
     * @return PiwikCountry
     */
    public function setContinentCode($continentCode)
    {
        $this->continentCode = $continentCode;

        return $this;
    }

    /**
     * Get continentCode.
     *
     * @return string
     */
    public function getContinentCode()
    {
        return $this->continentCode;
    }

    /**
     * Set icon.
     *
     * @param string|null $icon
     *
     * @return PiwikCountry
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
     * @return PiwikCountry
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
     * Add location.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikLocation $location
     *
     * @return PiwikCountry
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
     * Set site.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikSite|null $site
     *
     * @return PiwikCountry
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
