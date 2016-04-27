<?php

namespace Etourisme\HotelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hotel
 *
 * @ORM\Table(name="hotel")
 * @ORM\Entity(repositoryClass="Etourisme\HotelBundle\Repository\HotelRepository")
 */
class Hotel
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
     * @ORM\Column(name="nom_hotel", type="string", length=100)
     */
    private $nomHotel;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=50)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="text", nullable=true)
     */
    private $descrip;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="text", nullable=true)
     */
    private $details;

    /**
     * @var string
     *
     * @ORM\Column(name="img1", type="string", length=50, nullable=true)
     */
    private $img1;

    /**
     * @var string
     *
     * @ORM\Column(name="img2", type="string", length=50, nullable=true)
     */
    private $img2;
    
     /**
     * @var string
     *
     * @ORM\Column(name="img3", type="string", length=50, nullable=true)
     */
    private $img3;
    
     /**
     * @var string
     *
     * @ORM\Column(name="img4", type="string", length=50, nullable=true)
     */
    private $img4;
     /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=20, nullable=true)
     */
    private $categorie;
    
     /**
     * @var string
     *
     * @ORM\Column(name="promotion", type="text", nullable=true)
     */
    private $promotion;
    
     /**
     * @var string
     *
     * @ORM\Column(name="dispo", type="string", length=20, nullable=true)
     */
    private $dispo;
    
    /**
     * @var int
     *
     * @ORM\Column(name="age_min", type="integer", nullable=true)
     */
    private $age_min;

     /**
     * @var int
     *
     * @ORM\Column(name="age_max", type="integer", nullable=true)
     */
    private $age_max;
    /**
     * @ORM\OneToMany(targetEntity="Etourisme\HotelBundle\Entity\Image",mappedBy="hotelimages",cascade={"All"})
     */
    private $images;


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
     * Set nomHotel
     *
     * @param string $nomHotel
     *
     * @return Hotel
     */
    public function setNomHotel($nomHotel)
    {
        $this->nomHotel = $nomHotel;

        return $this;
    }

    /**
     * Get nomHotel
     *
     * @return string
     */
    public function getNomHotel()
    {
        return $this->nomHotel;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Hotel
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set descrip
     *
     * @param string $descrip
     *
     * @return Hotel
     */
    public function setDescrip($descrip)
    {
        $this->descrip = $descrip;

        return $this;
    }

    /**
     * Get descrip
     *
     * @return string
     */
    public function getDescrip()
    {
        return $this->descrip;
    }

    /**
     * Set details
     *
     * @param string $details
     *
     * @return Hotel
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set img1
     *
     * @param string $img1
     *
     * @return Hotel
     */
    public function setImg1($img1)
    {
        $this->img1 = $img1;

        return $this;
    }

    /**
     * Get img1
     *
     * @return string
     */
    public function getImg1()
    {
        return $this->img1;
    }

    /**
     * Set img2
     *
     * @param string $img2
     *
     * @return Hotel
     */
    public function setImg2($img2)
    {
        $this->img2 = $img2;

        return $this;
    }

    /**
     * Get img2
     *
     * @return string
     */
    public function getImg2()
    {
        return $this->img2;
    }

    /**
     * Set img3
     *
     * @param string $img3
     *
     * @return Hotel
     */
    public function setImg3($img3)
    {
        $this->img3 = $img3;

        return $this;
    }

    /**
     * Get img3
     *
     * @return string
     */
    public function getImg3()
    {
        return $this->img3;
    }

    /**
     * Set img4
     *
     * @param string $img4
     *
     * @return Hotel
     */
    public function setImg4($img4)
    {
        $this->img4 = $img4;

        return $this;
    }

    /**
     * Get img4
     *
     * @return string
     */
    public function getImg4()
    {
        return $this->img4;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Hotel
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set promotion
     *
     * @param string $promotion
     *
     * @return Hotel
     */
    public function setPromotion($promotion)
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * Get promotion
     *
     * @return string
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * Set dispo
     *
     * @param string $dispo
     *
     * @return Hotel
     */
    public function setDispo($dispo)
    {
        $this->dispo = $dispo;

        return $this;
    }

    /**
     * Get dispo
     *
     * @return string
     */
    public function getDispo()
    {
        return $this->dispo;
    }

    /**
     * Set ageMin
     *
     * @param integer $ageMin
     *
     * @return Hotel
     */
    public function setAgeMin($ageMin)
    {
        $this->age_min = $ageMin;

        return $this;
    }

    /**
     * Get ageMin
     *
     * @return integer
     */
    public function getAgeMin()
    {
        return $this->age_min;
    }

    /**
     * Set ageMax
     *
     * @param integer $ageMax
     *
     * @return Hotel
     */
    public function setAgeMax($ageMax)
    {
        $this->age_max = $ageMax;

        return $this;
    }

    /**
     * Get ageMax
     *
     * @return integer
     */
    public function getAgeMax()
    {
        return $this->age_max;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add image
     *
     * @param \Etourisme\HotelBundle\Entity\Hotel $image
     *
     * @return Hotel
     */
    public function addImage(\Etourisme\HotelBundle\Entity\Image $image)
    {
        $this->images[] = $image;
        $image->setHotelimages($this);
       
        return $this;
    }

    /**
     * Remove image
     *
     * @param \Etourisme\HotelBundle\Entity\Hotel $image
     */
    public function removeImage(\Etourisme\HotelBundle\Entity\Image $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }
}
