<?php

namespace Etourisme\HotelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * DetailsChambre
 *
 * @ORM\Table(name="detailschambre")
 * @ORM\Entity(repositoryClass="Etourisme\HotelBundle\Repository\DetailsChambreRepository")
 * @UniqueEntity(fields={"hotel","chambre"})
 */
class DetailsChambre
{
    
    
  /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
    /**
   * @ORM\ManyToOne(targetEntity="Etourisme\HotelBundle\Entity\Hotel",inversedBy="detailschambre")
   * @ORM\JoinColumn(nullable=false)
   */
  private $hotel;

  /**
   * @ORM\ManyToOne(targetEntity="Etourisme\HotelBundle\Entity\Chambre")
   * @ORM\JoinColumn(nullable=false)
   */
  private $chambre;

    /**
     * Set hotel
     *
     * @param \Etourisme\HotelBundle\Entity\Hotel $hotel
     *
     * @return DetailsChambre
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
     * Set chambre
     *
     * @param \Etourisme\HotelBundle\Entity\Chambre $chambre
     *
     * @return DetailsChambre
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
