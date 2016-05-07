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
}
