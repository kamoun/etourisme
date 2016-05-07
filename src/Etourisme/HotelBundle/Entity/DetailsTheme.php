<?php

namespace Etourisme\HotelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetailsTheme
 *
 * @ORM\Table(name="details_theme")
 * @ORM\Entity(repositoryClass="Etourisme\HotelBundle\Repository\DetailsThemeRepository")
 */
class DetailsTheme {

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
     * @ORM\ManyToOne(targetEntity="Etourisme\HotelBundle\Entity\Theme")
     * @ORM\JoinColumn(nullable=false)
     */
    private $theme;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set hotel
     *
     * @param \Etourisme\HotelBundle\Entity\Hotel $hotel
     *
     * @return DetailsTheme
     */
    public function setHotel(\Etourisme\HotelBundle\Entity\Hotel $hotel) {
        $this->hotel = $hotel;

        return $this;
    }

    /**
     * Get hotel
     *
     * @return \Etourisme\HotelBundle\Entity\Hotel
     */
    public function getHotel() {
        return $this->hotel;
    }

    /**
     * Set theme
     *
     * @param \Etourisme\HotelBundle\Entity\Theme $theme
     *
     * @return DetailsTheme
     */
    public function setTheme(\Etourisme\HotelBundle\Entity\Theme $theme) {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return \Etourisme\HotelBundle\Entity\Theme
     */
    public function getTheme() {
        return $this->theme;
    }

}
