<?php

namespace CMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Banniere
 *
 * @ORM\Table(name="banniere")
 * @ORM\Entity(repositoryClass="CMSBundle\Repository\BanniereRepository")
 */
class Banniere
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
     * @ORM\Column(name="titre", type="string", length=80, nullable=true)
     */
    private $titre;

    /**
     * @var bool
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    private $etat;
    
    /**
    * @ORM\OneToOne(targetEntity="Etourisme\HotelBundle\Entity\Image",mappedBy="banimage", cascade={"All"})
    * 
    * 
    */
    private $image;
    
    public function __construct() {
        $this->setEtat(0);       
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
     * Set titre
     *
     * @param string $titre
     *
     * @return Banniere
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Banniere
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return bool
     */
    public function getEtat()
    {
        return $this->etat;
    } 
    
   

    /**
     * Set image
     *
     * @param \Etourisme\HotelBundle\Entity\Image $image
     *
     * @return Banniere
     */
    public function setImage(\Etourisme\HotelBundle\Entity\Image $image = null)
    {
        $this->image = $image;
        $image->setBanimage($this);

        return $this;
    }

    /**
     * Get image
     *
     * @return \Etourisme\HotelBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }
}
