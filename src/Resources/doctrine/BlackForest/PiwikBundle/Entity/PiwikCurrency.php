<?php

namespace BlackForest\PiwikBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PiwikCurrency
 *
 * @ORM\Table(name="piwik_currency")
 * @ORM\Entity(repositoryClass="BlackForest\PiwikBundle\Entity\PiwikCurrencyRepository")
 */
class PiwikCurrency
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
     * @ORM\Column(name="symbol", type="string", length=128, nullable=false)
     */
    private $symbol;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BlackForest\PiwikBundle\Entity\PiwikVisit", mappedBy="currency")
     */
    private $visit;

    /**
     * @var \BlackForest\PiwikBundle\Entity\PiwikSite
     *
     * @ORM\ManyToOne(targetEntity="BlackForest\PiwikBundle\Entity\PiwikSite", inversedBy="currencies")
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
     * @return PiwikCurrency
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
     * @return PiwikCurrency
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
     * @return PiwikCurrency
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
     * @return PiwikCurrency
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
     * Set symbol.
     *
     * @param string $symbol
     *
     * @return PiwikCurrency
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;

        return $this;
    }

    /**
     * Get symbol.
     *
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * Add visit.
     *
     * @param \BlackForest\PiwikBundle\Entity\PiwikVisit $visit
     *
     * @return PiwikCurrency
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
     * @return PiwikCurrency
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
