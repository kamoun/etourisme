<?php

namespace Etourisme\HotelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetailsReduction
 *
 * @ORM\Table(name="detailsreduction")
 * @ORM\Entity(repositoryClass="Etourisme\HotelBundle\Repository\DetailsReductionRepository")
 */
class DetailsReduction
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
      *  @ORM\ManyToOne(targetEntity="Etourisme\HotelBundle\Entity\Hotel")
   * @ORM\JoinColumn(nullable=false)
   */
  private $hotel;

  /**
   * @ORM\ManyToOne(targetEntity="Etourisme\HotelBundle\Entity\Reduction")
   * @ORM\JoinColumn(nullable=false)
   */
  private $reduction;



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
     * @return DetailsReduction
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
     * Set reduction
     *
     * @param \Etourisme\HotelBundle\Entity\Reduction $reduction
     *
     * @return DetailsReduction
     */
    public function setReduction(\Etourisme\HotelBundle\Entity\Reduction $reduction)
    {
        $this->reduction = $reduction;

        return $this;
    }

    /**
     * Get reduction
     *
     * @return \Etourisme\HotelBundle\Entity\Reduction
     */
    public function getReduction()
    {
        return $this->reduction;
    }
}
