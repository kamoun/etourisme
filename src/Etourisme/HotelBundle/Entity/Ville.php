<?php

namespace Etourisme\HotelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 *
 * @ORM\Table(name="ville")
 * @ORM\Entity(repositoryClass="Etourisme\HotelBundle\Repository\VilleRepository")
 */
class Ville
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
     * @ORM\Column(name="libelle", type="string", length=50)
     */
    private $libelle;
    
     /**
     * @ORM\OneToMany(targetEntity="Etourisme\HotelBundle\Entity\Hotel",mappedBy="ville",cascade={"All"})
     */
    private $hotelsville;



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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Ville
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    
    public function __toString() {
         return $this->getLibelle();
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hotels = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add hotel
     *
     * @param \Etourisme\HotelBundle\Entity\Hotel $hotel
     *
     * @return Ville
     */
    public function addHotel(\Etourisme\HotelBundle\Entity\Hotel $hotel)
    {
        $this->hotels[] = $hotel;

        return $this;
    }

   

    /**
     * Add hotelsville
     *
     * @param \Etourisme\HotelBundle\Entity\Hotel $hotelsville
     *
     * @return Ville
     */
    public function addHotelsville(\Etourisme\HotelBundle\Entity\Hotel $hotelsville)
    {
        $this->hotelsville[] = $hotelsville;

        return $this;
    }

    /**
     * Remove hotelsville
     *
     * @param \Etourisme\HotelBundle\Entity\Hotel $hotelsville
     */
    public function removeHotelsville(\Etourisme\HotelBundle\Entity\Hotel $hotelsville)
    {
        $this->hotelsville->removeElement($hotelsville);
    }

    /**
     * Get hotelsville
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHotelsville()
    {
        return $this->hotelsville;
    }
}
