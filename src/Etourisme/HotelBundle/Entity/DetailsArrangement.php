<?php

namespace Etourisme\HotelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetailsArrangement
 *
 * @ORM\Table(name="detailsarrangement")
 * @ORM\Entity(repositoryClass="Etourisme\HotelBundle\Repository\DetailsArrangementRepository")
 */
class DetailsArrangement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
     /** @ORM\ManyToOne(targetEntity="Etourisme\HotelBundle\Entity\Hotel")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hotel;

    /**
     * @ORM\ManyToOne(targetEntity="Etourisme\HotelBundle\Entity\Arrangement")
     * @ORM\JoinColumn(nullable=false)
     */
    private $arrangement;
    
     /**
     * @var boolean
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    private $etat;
    
     /**
     * @var \DateTime
     *
     * @ORM\Column(name="tempsd", type="datetime",nullable=true)
     */
    private $tempsd;
    
     /**
     * @var \DateTime
     *
     * @ORM\Column(name="tempsf", type="datetime",nullable=true)
     */
    private $tempsf;
    
    public function __construct() {
        $this->setEtat(1);
       
    }

    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set hotel
     *
     * @param \Etourisme\HotelBundle\Entity\Hotel $hotel
     *
     * @return DetailsArrangement
     */
    public function setHotel(\Etourisme\HotelBundle\Entity\Hotel $hotel)
    {
        $this->hotel = $hotel;

        return $this;
    }

    /**
     * Get hotel
     *
     * @return \Etourisme\HotelBundle\Entity\Hotel
     */
    public function getHotel()
    {
        return $this->hotel;
    }

    /**
     * Set arrangement
     *
     * @param \Etourisme\HotelBundle\Entity\Arrangement $arrangement
     *
     * @return DetailsArrangement
     */
    public function setArrangement(\Etourisme\HotelBundle\Entity\Arrangement $arrangement)
    {
        $this->arrangement = $arrangement;

        return $this;
    }

    /**
     * Get arrangement
     *
     * @return \Etourisme\HotelBundle\Entity\Arrangement
     */
    public function getArrangement()
    {
        return $this->arrangement;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return DetailsArrangement
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return boolean
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set tempsd
     *
     * @param \DateTime $tempsd
     *
     * @return DetailsArrangement
     */
    public function setTempsd($tempsd)
    {
        $this->tempsd = $tempsd;

        return $this;
    }

    /**
     * Get tempsd
     *
     * @return \DateTime
     */
    public function getTempsd()
    {
        return $this->tempsd;
    }

    /**
     * Set tempsf
     *
     * @param \DateTime $tempsf
     *
     * @return DetailsArrangement
     */
    public function setTempsf($tempsf)
    {
        $this->tempsf = $tempsf;

        return $this;
    }

    /**
     * Get tempsf
     *
     * @return \DateTime
     */
    public function getTempsf()
    {
        return $this->tempsf;
    }
}
