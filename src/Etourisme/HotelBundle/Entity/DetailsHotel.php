<?php

namespace Etourisme\HotelBundle\Entity;


use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

// DON'T forget this use statement!!!
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;




/**
 * DetailsHotel
 *
 * @ORM\Table(name="details_hotel", uniqueConstraints={@ORM\UniqueConstraint(name="details_unique", columns={"hotel_id", "tempsd","tempsf"})})
 * @ORM\Entity(repositoryClass="Etourisme\HotelBundle\Repository\DetailsHotelRepository")
 */
class DetailsHotel
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
     * @ORM\ManyToOne(targetEntity="Etourisme\HotelBundle\Entity\Hotel",inversedBy="detailshotel")
     * 
     */
    private $hotel;
    
     /**
     * @var \DateTime
     *
     * @ORM\Column(name="tempsd", type="date")
     */
    private $tempsd;
    
      /**
     * @var \DateTime
     *
     * @ORM\Column(name="tempsf", type="date")
     */
    private $tempsf;

    /**
     * @var int
     *
     * @ORM\Column(name="tarifBase", type="integer")
     */
    private $tarifBase;

    /**
     * @var string
     *
     * @ORM\Column(name="delaiRetro", type="string", length=255)
     */
    private $delaiRetro;

    /**
     * @var int
     *
     * @ORM\Column(name="allot", type="integer")
     */
    private $allot;

    /**
     * @var int
     *
     * @ORM\Column(name="nbChambs", type="integer",nullable=true)
     */
    private $nbChambs;

    /**
     * @var int
     *
     * @ORM\Column(name="nbChambd", type="integer",nullable=true)
     */
    private $nbChambd;

    /**
     * @var int
     *
     * @ORM\Column(name="nbChambt", type="integer",nullable=true)
     */
    private $nbChambt;

    /**
     * @var string
     *
     * @ORM\Column(name="nbChambq", type="integer",nullable=true)
     */
    private $nbChambq;

    /**
     * @var int
     *
     * @ORM\Column(name="reduc1", type="integer",nullable=true)
     */
    private $reduc1;

    /**
     * @var int
     *
     * @ORM\Column(name="reduc2", type="integer",nullable=true)
     */
    private $reduc2;

    /**
     * @var int
     *
     * @ORM\Column(name="reduc3", type="integer",nullable=true)
     */
    private $reduc3;

    /**
     * @var int
     *
     * @ORM\Column(name="reduc4", type="integer",nullable=true)
     */
    private $reduc4;

    /**
     * @var int
     *
     * @ORM\Column(name="reduc5", type="integer",nullable=true)
     */
    private $reduc5;

    /**
     * @var int
     *
     * @ORM\Column(name="suppSingle", type="integer",nullable=true)
     */
    private $suppSingle;

    /**
     * @var int
     *
     * @ORM\Column(name="marge", type="integer")
     */
    private $marge;

    /**
     * @var int
     *
     * @ORM\Column(name="suppTarif", type="integer",nullable=true)
     */
    private $suppTarif;

    /**
     * @var int
     *
     * @ORM\Column(name="suppLpd", type="integer",nullable=true)
     */
    private $suppLpd;

    /**
     * @var int
     *
     * @ORM\Column(name="suppDp", type="integer",nullable=true)
     */
    private $suppDp;

    /**
     * @var int
     *
     * @ORM\Column(name="suppPc", type="integer",nullable=true)
     */
    private $suppPc;

    /**
     * @var int
     *
     * @ORM\Column(name="suppAll", type="integer",nullable=true)
     */
    private $suppAll;

    /**
     * @var int
     *
     * @ORM\Column(name="suppLs", type="integer",nullable=true)
     */
    private $suppLs;

    /**
     * @var int
     *
     * @ORM\Column(name="suppAllSoft", type="integer",nullable=true)
     */
    private $suppAllSoft;

    /**
     * @var int
     *
     * @ORM\Column(name="suppUltraAll", type="integer",nullable=true)
     */
    private $suppUltraAll;

    /**
     * @var int
     *
     * @ORM\Column(name="suppDpp", type="integer",nullable=true)
     */
    private $suppDpp;

    /**
     * @var int
     *
     * @ORM\Column(name="suppPcp", type="integer",nullable=true)
     */
    private $suppPcp;
    
    /** @ORM\OneToMany(targetEntity="Etourisme\HotelBundle\Entity\DetailsArrangement",mappedBy="detailsHotel", cascade={"All"})
     * 
     */
    private $detailsarrangement;


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
     * Set tarifBase
     *
     * @param integer $tarifBase
     *
     * @return DetailsHotel
     */
    public function setTarifBase($tarifBase)
    {
        $this->tarifBase = $tarifBase;

        return $this;
    }

    /**
     * Get tarifBase
     *
     * @return int
     */
    public function getTarifBase()
    {
        return $this->tarifBase;
    }

    /**
     * Set delaiRetro
     *
     * @param string $delaiRetro
     *
     * @return DetailsHotel
     */
    public function setDelaiRetro($delaiRetro)
    {
        $this->delaiRetro = $delaiRetro;

        return $this;
    }

    /**
     * Get delaiRetro
     *
     * @return string
     */
    public function getDelaiRetro()
    {
        return $this->delaiRetro;
    }

    /**
     * Set allot
     *
     * @param integer $allot
     *
     * @return DetailsHotel
     */
    public function setAllot($allot)
    {
        $this->allot = $allot;

        return $this;
    }

    /**
     * Get allot
     *
     * @return int
     */
    public function getAllot()
    {
        return $this->allot;
    }

    /**
     * Set nbChambs
     *
     * @param integer $nbChambs
     *
     * @return DetailsHotel
     */
    public function setNbChambs($nbChambs)
    {
        $this->nbChambs = $nbChambs;

        return $this;
    }

    /**
     * Get nbChambs
     *
     * @return int
     */
    public function getNbChambs()
    {
        return $this->nbChambs;
    }

    /**
     * Set nbChambd
     *
     * @param integer $nbChambd
     *
     * @return DetailsHotel
     */
    public function setNbChambd($nbChambd)
    {
        $this->nbChambd = $nbChambd;

        return $this;
    }

    /**
     * Get nbChambd
     *
     * @return int
     */
    public function getNbChambd()
    {
        return $this->nbChambd;
    }

    /**
     * Set nbChambt
     *
     * @param integer $nbChambt
     *
     * @return DetailsHotel
     */
    public function setNbChambt($nbChambt)
    {
        $this->nbChambt = $nbChambt;

        return $this;
    }

    /**
     * Get nbChambt
     *
     * @return int
     */
    public function getNbChambt()
    {
        return $this->nbChambt;
    }

    /**
     * Set nbChambq
     *
     * @param string $nbChambq
     *
     * @return DetailsHotel
     */
    public function setNbChambq($nbChambq)
    {
        $this->nbChambq = $nbChambq;

        return $this;
    }

    /**
     * Get nbChambq
     *
     * @return string
     */
    public function getNbChambq()
    {
        return $this->nbChambq;
    }

    /**
     * Set reduc1
     *
     * @param integer $reduc1
     *
     * @return DetailsHotel
     */
    public function setReduc1($reduc1)
    {
        $this->reduc1 = $reduc1;

        return $this;
    }

    /**
     * Get reduc1
     *
     * @return int
     */
    public function getReduc1()
    {
        return $this->reduc1;
    }

    /**
     * Set reduc2
     *
     * @param integer $reduc2
     *
     * @return DetailsHotel
     */
    public function setReduc2($reduc2)
    {
        $this->reduc2 = $reduc2;

        return $this;
    }

    /**
     * Get reduc2
     *
     * @return int
     */
    public function getReduc2()
    {
        return $this->reduc2;
    }

    /**
     * Set reduc3
     *
     * @param integer $reduc3
     *
     * @return DetailsHotel
     */
    public function setReduc3($reduc3)
    {
        $this->reduc3 = $reduc3;

        return $this;
    }

    /**
     * Get reduc3
     *
     * @return int
     */
    public function getReduc3()
    {
        return $this->reduc3;
    }

    /**
     * Set reduc4
     *
     * @param integer $reduc4
     *
     * @return DetailsHotel
     */
    public function setReduc4($reduc4)
    {
        $this->reduc4 = $reduc4;

        return $this;
    }

    /**
     * Get reduc4
     *
     * @return int
     */
    public function getReduc4()
    {
        return $this->reduc4;
    }

    /**
     * Set reduc5
     *
     * @param integer $reduc5
     *
     * @return DetailsHotel
     */
    public function setReduc5($reduc5)
    {
        $this->reduc5 = $reduc5;

        return $this;
    }

    /**
     * Get reduc5
     *
     * @return int
     */
    public function getReduc5()
    {
        return $this->reduc5;
    }

    /**
     * Set suppSingle
     *
     * @param integer $suppSingle
     *
     * @return DetailsHotel
     */
    public function setSuppSingle($suppSingle)
    {
        $this->suppSingle = $suppSingle;

        return $this;
    }

    /**
     * Get suppSingle
     *
     * @return int
     */
    public function getSuppSingle()
    {
        return $this->suppSingle;
    }

    /**
     * Set marge
     *
     * @param integer $marge
     *
     * @return DetailsHotel
     */
    public function setMarge($marge)
    {
        $this->marge = $marge;

        return $this;
    }

    /**
     * Get marge
     *
     * @return int
     */
    public function getMarge()
    {
        return $this->marge;
    }

    /**
     * Set suppTarif
     *
     * @param integer $suppTarif
     *
     * @return DetailsHotel
     */
    public function setSuppTarif($suppTarif)
    {
        $this->suppTarif = $suppTarif;

        return $this;
    }

    /**
     * Get suppTarif
     *
     * @return int
     */
    public function getSuppTarif()
    {
        return $this->suppTarif;
    }

    /**
     * Set suppLpd
     *
     * @param integer $suppLpd
     *
     * @return DetailsHotel
     */
    public function setSuppLpd($suppLpd)
    {
        $this->suppLpd = $suppLpd;

        return $this;
    }

    /**
     * Get suppLpd
     *
     * @return int
     */
    public function getSuppLpd()
    {
        return $this->suppLpd;
    }

    /**
     * Set suppDp
     *
     * @param integer $suppDp
     *
     * @return DetailsHotel
     */
    public function setSuppDp($suppDp)
    {
        $this->suppDp = $suppDp;

        return $this;
    }

    /**
     * Get suppDp
     *
     * @return int
     */
    public function getSuppDp()
    {
        return $this->suppDp;
    }

    /**
     * Set suppPc
     *
     * @param integer $suppPc
     *
     * @return DetailsHotel
     */
    public function setSuppPc($suppPc)
    {
        $this->suppPc = $suppPc;

        return $this;
    }

    /**
     * Get suppPc
     *
     * @return int
     */
    public function getSuppPc()
    {
        return $this->suppPc;
    }

    /**
     * Set suppAll
     *
     * @param integer $suppAll
     *
     * @return DetailsHotel
     */
    public function setSuppAll($suppAll)
    {
        $this->suppAll = $suppAll;

        return $this;
    }

    /**
     * Get suppAll
     *
     * @return int
     */
    public function getSuppAll()
    {
        return $this->suppAll;
    }

    /**
     * Set suppLs
     *
     * @param integer $suppLs
     *
     * @return DetailsHotel
     */
    public function setSuppLs($suppLs)
    {
        $this->suppLs = $suppLs;

        return $this;
    }

    /**
     * Get suppLs
     *
     * @return int
     */
    public function getSuppLs()
    {
        return $this->suppLs;
    }

    /**
     * Set suppAllSoft
     *
     * @param integer $suppAllSoft
     *
     * @return DetailsHotel
     */
    public function setSuppAllSoft($suppAllSoft)
    {
        $this->suppAllSoft = $suppAllSoft;

        return $this;
    }

    /**
     * Get suppAllSoft
     *
     * @return int
     */
    public function getSuppAllSoft()
    {
        return $this->suppAllSoft;
    }

    /**
     * Set suppUltraAll
     *
     * @param integer $suppUltraAll
     *
     * @return DetailsHotel
     */
    public function setSuppUltraAll($suppUltraAll)
    {
        $this->suppUltraAll = $suppUltraAll;

        return $this;
    }

    /**
     * Get suppUltraAll
     *
     * @return int
     */
    public function getSuppUltraAll()
    {
        return $this->suppUltraAll;
    }

    /**
     * Set suppDpp
     *
     * @param integer $suppDpp
     *
     * @return DetailsHotel
     */
    public function setSuppDpp($suppDpp)
    {
        $this->suppDpp = $suppDpp;

        return $this;
    }

    /**
     * Get suppDpp
     *
     * @return int
     */
    public function getSuppDpp()
    {
        return $this->suppDpp;
    }

    /**
     * Set suppPcp
     *
     * @param integer $suppPcp
     *
     * @return DetailsHotel
     */
    public function setSuppPcp($suppPcp)
    {
        $this->suppPcp = $suppPcp;

        return $this;
    }

    /**
     * Get suppPcp
     *
     * @return int
     */
    public function getSuppPcp()
    {
        return $this->suppPcp;
    }

    /**
     * Set tempsd
     *
     * @param \DateTime $tempsd
     *
     * @return DetailsHotel
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
     * @return DetailsHotel
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
     * @return DetailsHotel
     */
    public function setHotel(\Etourisme\HotelBundle\Entity\Hotel $hotel = null)
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
     * Constructor
     */
    public function __construct()
    {
        $this->detailsarrangement = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add detailsarrangement
     *
     * @param \Etourisme\HotelBundle\Entity\DetailsArrangement $detailsarrangement
     *
     * @return DetailsHotel
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
}
