<?php

namespace Etourisme\HotelBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

// DON'T forget this use statement!!!
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Tarif
 *
 * @ORM\Table(name="tarif",uniqueConstraints={@ORM\UniqueConstraint(name="details_unique", columns={"hotel_id","arrangement_id","occupant_id","tempsd","tempsf"})})
 * @ORM\Entity(repositoryClass="Etourisme\HotelBundle\Repository\TarifRepository")
 */
class Tarif
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="decimal", precision=9, scale=3)
     */
    private $prix;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tempsd", type="datetime")
     */
    private $tempsd;

     /**
     * @var \DateTime
     *
     * @ORM\Column(name="tempsf", type="datetime")
     */
    private $tempsf;

    
     /**
     * @ORM\ManyToOne(targetEntity="Etourisme\HotelBundle\Entity\Hotel")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Hotel;
    
     /**
     * @ORM\ManyToOne(targetEntity="Etourisme\HotelBundle\Entity\Arrangement")
     * @ORM\JoinColumn(nullable=false)
     */
    private $arrangement;
    
      /**
     * @ORM\ManyToOne(targetEntity="Etourisme\HotelBundle\Entity\Chambre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $chambre;
    
      /**
     * @ORM\ManyToOne(targetEntity="Etourisme\HotelBundle\Entity\Occupant")
     * @ORM\JoinColumn(nullable=false)
     */
    private $occupant;

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
     * Set prix
     *
     * @param string $prix
     *
     * @return Tarif
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set tempsd
     *
     * @param \DateTime $tempsd
     *
     * @return Tarif
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
     * @return Tarif
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

    /**
     * Set hotel
     *
     * @param \Etourisme\HotelBundle\Entity\Hotel $hotel
     *
     * @return Tarif
     */
    public function setHotel(\Etourisme\HotelBundle\Entity\Hotel $hotel)
    {
        $this->Hotel = $hotel;

        return $this;
    }

    /**
     * Get hotel
     *
     * @return \Etourisme\HotelBundle\Entity\Hotel
     */
    public function getHotel()
    {
        return $this->Hotel;
    }

    /**
     * Set arrangement
     *
     * @param \Etourisme\HotelBundle\Entity\Arrangement $arrangement
     *
     * @return Tarif
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
     * Set chambre
     *
     * @param \Etourisme\HotelBundle\Entity\Chambre $chambre
     *
     * @return Tarif
     */
    public function setChambre(\Etourisme\HotelBundle\Entity\Chambre $chambre)
    {
        $this->chambre = $chambre;

        return $this;
    }

    /**
     * Get chambre
     *
     * @return \Etourisme\HotelBundle\Entity\Chambre
     */
    public function getChambre()
    {
        return $this->chambre;
    }

    /**
     * Set occupant
     *
     * @param \Etourisme\HotelBundle\Entity\Occupant $occupant
     *
     * @return Tarif
     */
    public function setOccupant(\Etourisme\HotelBundle\Entity\Occupant $occupant)
    {
        $this->occupant = $occupant;

        return $this;
    }

    /**
     * Get occupant
     *
     * @return \Etourisme\HotelBundle\Entity\Occupant
     */
    public function getOccupant()
    {
        return $this->occupant;
    }
}
