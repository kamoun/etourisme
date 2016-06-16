<?php

namespace Etourisme\HotelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hotel
 *
 * @ORM\Table(name="hotel")
 * @ORM\Entity(repositoryClass="Etourisme\HotelBundle\Repository\HotelRepository")
 */
class Hotel {

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
     * @ORM\ManyToOne(targetEntity="Etourisme\HotelBundle\Entity\Categorie",inversedBy="hotels")
     *  @ORM\JoinColumn(name="categorie_id", referencedColumnName="id", nullable=true)
     */
    private $categorie;
    
     /**
     * @ORM\ManyToOne(targetEntity="Etourisme\HotelBundle\Entity\Ville",inversedBy="hotelsVille")
     *  @ORM\JoinColumn(name="ville_id", referencedColumnName="id", nullable=false)
     */
    private $ville;
    
    /** @ORM\OneToMany(targetEntity="Etourisme\HotelBundle\Entity\DetailsTheme",mappedBy="hotel", cascade={"All"})
     *
     */
    private $detailstheme;
    
    /** @ORM\OneToMany(targetEntity="Etourisme\HotelBundle\Entity\DetailsChambre",mappedBy="hotel", cascade={"All"})
     * 
     */
    private $detailschambre;
     /** @ORM\OneToMany(targetEntity="Etourisme\HotelBundle\Entity\DetailsArrangement",mappedBy="hotel", cascade={"All"})
     * 
     */
    private $detailsarrangement;
    
    /** @ORM\OneToMany(targetEntity="Etourisme\HotelBundle\Entity\Tarif",mappedBy="hotel", cascade={"All"})
     * 
     */
    private $tarif;

     /** @ORM\OneToMany(targetEntity="Etourisme\HotelBundle\Entity\DetailsReduction",mappedBy="hotel", cascade={"All"})
     * 
     */
    private $detailsreduction;


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
     *
     */
    private $age_min;

    /**
     * @var int
     * 
     * 
     * @ORM\Column(name="age_max", type="integer", nullable=true)
     */
    private $age_max;

    /**
     * @ORM\OneToMany(targetEntity="Etourisme\HotelBundle\Entity\Image",mappedBy="hotelimages",cascade={"All"})
     */
    private $images;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="string", length=50,nullable=true)
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longtitude", type="string", length=50,nullable=true)
     */
    private $longtitude;
    
     /**
     * @ORM\OneToMany(targetEntity="Etourisme\HotelBundle\Entity\DetailsHotel",mappedBy="hotel",cascade={"All"})
     * 
     */
    private $detailshotel;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nomHotel
     *
     * @param string $nomHotel
     *
     * @return Hotel
     */
    public function setNomHotel($nomHotel) {
        $this->nomHotel = $nomHotel;

        return $this;
    }

    /**
     * Get nomHotel
     *
     * @return string
     */
    public function getNomHotel() {
        return $this->nomHotel;
    }

   

    /**
     * Set descrip
     *
     * @param string $descrip
     *
     * @return Hotel
     */
    public function setDescrip($descrip) {
        $this->descrip = $descrip;

        return $this;
    }

    /**
     * Get descrip
     *
     * @return string
     */
    public function getDescrip() {
        return $this->descrip;
    }

    /**
     * Set details
     *
     * @param string $details
     *
     * @return Hotel
     */
    public function setDetails($details) {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails() {
        return $this->details;
    }

    /**
     * Set promotion
     *
     * @param string $promotion
     *
     * @return Hotel
     */
    public function setPromotion($promotion) {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * Get promotion
     *
     * @return string
     */
    public function getPromotion() {
        return $this->promotion;
    }

    /**
     * Set dispo
     *
     * @param string $dispo
     *
     * @return Hotel
     */
    public function setDispo($dispo) {
        $this->dispo = $dispo;

        return $this;
    }

    /**
     * Get dispo
     *
     * @return string
     */
    public function getDispo() {
        return $this->dispo;
    }

    /**
     * Set ageMin
     *
     * @param integer $ageMin
     *
     * @return Hotel
     */
    public function setAgeMin($ageMin) {
        $this->age_min = $ageMin;

        return $this;
    }

    /**
     * Get ageMin
     *
     * @return integer
     */
    public function getAgeMin() {
        return $this->age_min;
    }

    /**
     * Set ageMax
     *
     * @param integer $ageMax
     *
     * @return Hotel
     */
    public function setAgeMax($ageMax) {
        $this->age_max = $ageMax;

        return $this;
    }

    /**
     * Get ageMax
     *
     * @return integer
     */
    public function getAgeMax() {
        return $this->age_max;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add image
     *
     * @param \Etourisme\HotelBundle\Entity\Hotel $image
     *
     * @return Hotel
     */
    public function addImage(\Etourisme\HotelBundle\Entity\Image $image) {
        $this->images[] = $image;
        $image->setHotelimages($this);

        return $this;
    }

    /**
     * Remove image
     *
     * @param \Etourisme\HotelBundle\Entity\Hotel $image
     */
    public function removeImage(\Etourisme\HotelBundle\Entity\Image $image) {
        $this->images->removeElement($image);
        $image->setHotelimages(null);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages() {
        return $this->images;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return Hotel
     */
    public function setLatitude($latitude) {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude() {
        return $this->latitude;
    }

    /**
     * Set longtitude
     *
     * @param string $longtitude
     *
     * @return Hotel
     */
    public function setLongtitude($longtitude) {
        $this->longtitude = $longtitude;

        return $this;
    }

    /**
     * Get longtitude
     *
     * @return string
     */
    public function getLongtitude() {
        return $this->longtitude;
    }


    /**
     * Set categorie
     *
     * @param \Etourisme\HotelBundle\Entity\Categorie $categorie
     *
     * @return Hotel
     */
    public function setCategorie(\Etourisme\HotelBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Etourisme\HotelBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set ville
     *
     * @param \Etourisme\HotelBundle\Entity\Ville $ville
     *
     * @return Hotel
     */
    public function setVille(\Etourisme\HotelBundle\Entity\Ville $ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \Etourisme\HotelBundle\Entity\Ville
     */
    public function getVille()
    {
        return $this->ville;
    }
    
    public function __toString() {
        return $this->getNomHotel();
    }

    /**
     * Add detailstheme
     *
     * @param \Etourisme\HotelBundle\Entity\DetailsTheme $detailstheme
     *
     * @return Hotel
     */
    public function addDetailstheme(\Etourisme\HotelBundle\Entity\DetailsTheme $detailstheme)
    {
        $this->detailstheme[] = $detailstheme;

        return $this;
    }

    /**
     * Remove detailstheme
     *
     * @param \Etourisme\HotelBundle\Entity\DetailsTheme $detailstheme
     */
    public function removeDetailstheme(\Etourisme\HotelBundle\Entity\DetailsTheme $detailstheme)
    {
        $this->detailstheme->removeElement($detailstheme);
    }

    /**
     * Get detailstheme
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDetailstheme()
    {
        return $this->detailstheme;
    }

    /**
     * Add detailschambre
     *
     * @param \Etourisme\HotelBundle\Entity\DetailsChambre $detailschambre
     *
     * @return Hotel
     */
    public function addDetailschambre(\Etourisme\HotelBundle\Entity\DetailsChambre $detailschambre)
    {
        $this->detailschambre[] = $detailschambre;

        return $this;
    }

    /**
     * Remove detailschambre
     *
     * @param \Etourisme\HotelBundle\Entity\DetailsChambre $detailschambre
     */
    public function removeDetailschambre(\Etourisme\HotelBundle\Entity\DetailsChambre $detailschambre)
    {
        $this->detailschambre->removeElement($detailschambre);
    }

    /**
     * Get detailschambre
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDetailschambre()
    {
        return $this->detailschambre;
    }

    /**
     * Add detailsarrangement
     *
     * @param \Etourisme\HotelBundle\Entity\DetailsArrangement $detailsarrangement
     *
     * @return Hotel
     */
    public function addDetailsarrangement(\Etourisme\HotelBundle\Entity\DetailsArrangement $detailsarrangement)
    {
        $this->detailsarrangement[] = $detailsarrangement;

        return $this;
    }

    /**
     * Remove detailsarrangement
     *
     * @param \Etourisme\HotelBundle\Entity\DetailsArrangement $detailsarrangement
     */
    public function removeDetailsarrangement(\Etourisme\HotelBundle\Entity\DetailsArrangement $detailsarrangement)
    {
        $this->detailsarrangement->removeElement($detailsarrangement);
    }

    /**
     * Get detailsarrangement
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDetailsarrangement()
    {
        return $this->detailsarrangement;
    }

    /**
     * Add detailsreduction
     *
     * @param \Etourisme\HotelBundle\Entity\DetailsReduction $detailsreduction
     *
     * @return Hotel
     */
    public function addDetailsreduction(\Etourisme\HotelBundle\Entity\DetailsReduction $detailsreduction)
    {
        $this->detailsreduction[] = $detailsreduction;

        return $this;
    }

    /**
     * Remove detailsreduction
     *
     * @param \Etourisme\HotelBundle\Entity\DetailsReduction $detailsreduction
     */
    public function removeDetailsreduction(\Etourisme\HotelBundle\Entity\DetailsReduction $detailsreduction)
    {
        $this->detailsreduction->removeElement($detailsreduction);
    }

    /**
     * Get detailsreduction
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDetailsreduction()
    {
        return $this->detailsreduction;
    }

    /**
     * Add detailshotel
     *
     * @param \Etourisme\HotelBundle\Entity\DetailsHotel $detailshotel
     *
     * @return Hotel
     */
    public function addDetailshotel(\Etourisme\HotelBundle\Entity\DetailsHotel $detailshotel)
    {
        $this->detailshotel[] = $detailshotel;

        return $this;
    }

    /**
     * Remove detailshotel
     *
     * @param \Etourisme\HotelBundle\Entity\DetailsHotel $detailshotel
     */
    public function removeDetailshotel(\Etourisme\HotelBundle\Entity\DetailsHotel $detailshotel)
    {
        $this->detailshotel->removeElement($detailshotel);
    }

    /**
     * Get detailshotel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDetailshotel()
    {
        return $this->detailshotel;
    }

    /**
     * Add tarif
     *
     * @param \Etourisme\HotelBundle\Entity\Tarif $tarif
     *
     * @return Hotel
     */
    public function addTarif(\Etourisme\HotelBundle\Entity\Tarif $tarif)
    {
        $this->tarif[] = $tarif;

        return $this;
    }

    /**
     * Remove tarif
     *
     * @param \Etourisme\HotelBundle\Entity\Tarif $tarif
     */
    public function removeTarif(\Etourisme\HotelBundle\Entity\Tarif $tarif)
    {
        $this->tarif->removeElement($tarif);
    }

    /**
     * Get tarif
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTarif()
    {
        return $this->tarif;
    }
}
