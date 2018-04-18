<?php

namespace BlackForest\PiwikBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PiwikLocation
 *
 * @ORM\Table(name="piwik_location")
 * @ORM\Entity(repositoryClass="BlackForest\PiwikBundle\Entity\PiwikLocationRepository")
 */
class PiwikLocation
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
     * @ORM\Column(name="city", type="text", nullable=false)
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="latitude", type="text", nullable=true)
     */
    private $latitude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="longitude", type="text", nullable=true)
     */
    private $longitude;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikVisit", mappedBy="location")
     */
    private $visit;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikCountry
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikCountry", inversedBy="location")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="uuid")
     * })
     */
    private $country;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikSite
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikSite", inversedBy="location")
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
     * @return PiwikLocation
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
     * @return PiwikLocation
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
     * @return PiwikLocation
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
     * @return PiwikLocation
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
     * @return PiwikLocation
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
     * Set city.
     *
     * @param string $city
     *
     * @return PiwikLocation
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set latitude.
     *
     * @param string|null $latitude
     *
     * @return PiwikLocation
     */
    public function setLatitude($latitude = null)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude.
     *
     * @return string|null
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude.
     *
     * @param string|null $longitude
     *
     * @return PiwikLocation
     */
    public function setLongitude($longitude = null)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude.
     *
     * @return string|null
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Add visit.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisit $visit
     *
     * @return PiwikLocation
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
     * Set country.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikCountry|null $country
     *
     * @return PiwikLocation
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
     * Set site.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikSite|null $site
     *
     * @return PiwikLocation
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
