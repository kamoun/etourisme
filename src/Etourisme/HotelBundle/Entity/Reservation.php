<?php

namespace Etourisme\HotelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="Etourisme\HotelBundle\Repository\ReservationRepository")
 */
class Reservation
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateArrivee", type="date")
     */
    private $dateArrivee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDepart", type="date")
     */
    private $dateDepart;

    /**
     * @var string
     *
     * @ORM\Column(name="montantTotal", type="decimal", precision=9, scale=3)
     */
    private $montantTotal;
    
     /**
     * @ORM\ManyToOne(targetEntity="Etourisme\HotelBundle\Entity\Hotel",inversedBy="reservation")
     * 
     */
    private $hotel;
    
    /**
     * @ORM\OneToMany(targetEntity="Etourisme\HotelBundle\Entity\Client",mappedBy="reservation",cascade={"All"})
     * 
     */
    private $client;

    /**
     * @var int
     *
     * @ORM\Column(name="nbads1", type="integer", nullable=true)
     */
    private $nbads1;

    /**
     * @var int
     *
     * @ORM\Column(name="nbens1", type="integer", nullable=true)
     */
    private $nbens1;

    /**
     * @var string
     *
     * @ORM\Column(name="idars1", type="integer", nullable=true)
     */
    private $idars1;

    /**
     * @var int
     *
     * @ORM\Column(name="nbads2", type="integer", nullable=true)
     */
    private $nbads2;

    /**
     * @var int
     *
     * @ORM\Column(name="nbens2", type="integer", nullable=true)
     */
    private $nbens2;

    /**
     * @var string
     *
     * @ORM\Column(name="idars2", type="integer", nullable=true)
     */
    private $idars2;

    /**
     * @var int
     *
     * @ORM\Column(name="nbads3", type="integer", nullable=true)
     */
    private $nbads3;

    /**
     * @var int
     *
     * @ORM\Column(name="nbens3", type="integer", nullable=true)
     */
    private $nbens3;

    /**
     * @var int
     *
     * @ORM\Column(name="idars3", type="integer", nullable=true)
     */
    private $idars3;

    /**
     * @var int
     *
     * @ORM\Column(name="nbads4", type="integer", nullable=true)
     */
    private $nbads4;

    /**
     * @var int
     *
     * @ORM\Column(name="nbens4", type="integer", nullable=true)
     */
    private $nbens4;

    /**
     * @var int
     *
     * @ORM\Column(name="idars4", type="integer", nullable=true)
     */
    private $idars4;

    /**
     * @var int
     *
     * @ORM\Column(name="nbads5", type="integer", nullable=true)
     */
    private $nbads5;

    /**
     * @var int
     *
     * @ORM\Column(name="nbens5", type="integer", nullable=true)
     */
    private $nbens5;

    /**
     * @var int
     *
     * @ORM\Column(name="idars5", type="integer", nullable=true)
     */
    private $idars5;

    /**
     * @var int
     *
     * @ORM\Column(name="nbadd1", type="integer", nullable=true)
     */
    private $nbadd1;

    /**
     * @var int
     *
     * @ORM\Column(name="nbend1", type="integer", nullable=true)
     */
    private $nbend1;

    /**
     * @var int
     *
     * @ORM\Column(name="idard1", type="integer", nullable=true)
     */
    private $idard1;

    /**
     * @var int
     *
     * @ORM\Column(name="nbadd2", type="integer", nullable=true)
     */
    private $nbadd2;

    /**
     * @var int
     *
     * @ORM\Column(name="nbend2", type="integer", nullable=true)
     */
    private $nbend2;

    /**
     * @var int
     *
     * @ORM\Column(name="idard2", type="integer", nullable=true)
     */
    private $idard2;

    /**
     * @var int
     *
     * @ORM\Column(name="nbadd3", type="integer", nullable=true)
     */
    private $nbadd3;

    /**
     * @var int
     *
     * @ORM\Column(name="nbend3", type="integer", nullable=true)
     */
    private $nbend3;

    /**
     * @var int
     *
     * @ORM\Column(name="idard3", type="integer", nullable=true)
     */
    private $idard3;

    /**
     * @var int
     *
     * @ORM\Column(name="nbadd4", type="integer", nullable=true)
     */
    private $nbadd4;

    /**
     * @var int
     *
     * @ORM\Column(name="nbend4", type="integer", nullable=true)
     */
    private $nbend4;

    /**
     * @var int
     *
     * @ORM\Column(name="idard4", type="integer", nullable=true)
     */
    private $idard4;

    /**
     * @var int
     *
     * @ORM\Column(name="nbadd5", type="integer", nullable=true)
     */
    private $nbadd5;

    /**
     * @var int
     *
     * @ORM\Column(name="nbend5", type="integer", nullable=true)
     */
    private $nbend5;

    /**
     * @var int
     *
     * @ORM\Column(name="idard5", type="integer", nullable=true)
     */
    private $idard5;

    /**
     * @var int
     *
     * @ORM\Column(name="nbadt1", type="integer", nullable=true)
     */
    private $nbadt1;

    /**
     * @var int
     *
     * @ORM\Column(name="nbent1", type="integer", nullable=true)
     */
    private $nbent1;

    /**
     * @var int
     *
     * @ORM\Column(name="idart1", type="integer", nullable=true)
     */
    private $idart1;

    /**
     * @var int
     *
     * @ORM\Column(name="nbadt2", type="integer", nullable=true)
     */
    private $nbadt2;

    /**
     * @var int
     *
     * @ORM\Column(name="nbent2", type="integer", nullable=true)
     */
    private $nbent2;

    /**
     * @var int
     *
     * @ORM\Column(name="idart2", type="integer", nullable=true)
     */
    private $idart2;

    /**
     * @var int
     *
     * @ORM\Column(name="nbadt3", type="integer", nullable=true)
     */
    private $nbadt3;

    /**
     * @var int
     *
     * @ORM\Column(name="nbent3", type="integer", nullable=true)
     */
    private $nbent3;

    /**
     * @var int
     *
     * @ORM\Column(name="nbadt4", type="integer", nullable=true)
     */
    private $nbadt4;

    /**
     * @var int
     *
     * @ORM\Column(name="nbent4", type="integer", nullable=true)
     */
    private $nbent4;

    /**
     * @var int
     *
     * @ORM\Column(name="idart4", type="integer", nullable=true)
     */
    private $idart4;

    /**
     * @var int
     *
     * @ORM\Column(name="nbadt5", type="integer", nullable=true)
     */
    private $nbadt5;

    /**
     * @var int
     *
     * @ORM\Column(name="nbent5", type="integer", nullable=true)
     */
    private $nbent5;

    /**
     * @var int
     *
     * @ORM\Column(name="idart5", type="integer", nullable=true)
     */
    private $idart5;

    /**
     * @var int
     *
     * @ORM\Column(name="nbadq1", type="integer", nullable=true)
     */
    private $nbadq1;

    /**
     * @var int
     *
     * @ORM\Column(name="nbenq1", type="integer", nullable=true)
     */
    private $nbenq1;

    /**
     * @var int
     *
     * @ORM\Column(name="idarq1", type="integer", nullable=true)
     */
    private $idarq1;

    /**
     * @var int
     *
     * @ORM\Column(name="nbadq2", type="integer", nullable=true)
     */
    private $nbadq2;

    /**
     * @var int
     *
     * @ORM\Column(name="nbenq2", type="integer", nullable=true)
     */
    private $nbenq2;

    /**
     * @var int
     *
     * @ORM\Column(name="idarq2", type="integer", nullable=true)
     */
    private $idarq2;

    /**
     * @var int
     *
     * @ORM\Column(name="nbadq3", type="integer", nullable=true)
     */
    private $nbadq3;

    /**
     * @var int
     *
     * @ORM\Column(name="nbenq3", type="integer", nullable=true)
     */
    private $nbenq3;

    /**
     * @var int
     *
     * @ORM\Column(name="idarq3", type="integer", nullable=true)
     */
    private $idarq3;

    /**
     * @var int
     *
     * @ORM\Column(name="nbadq4", type="integer", nullable=true)
     */
    private $nbadq4;

    /**
     * @var int
     *
     * @ORM\Column(name="nbenq4", type="integer", nullable=true)
     */
    private $nbenq4;

    /**
     * @var int
     *
     * @ORM\Column(name="idarq4", type="integer", nullable=true)
     */
    private $idarq4;

    /**
     * @var int
     *
     * @ORM\Column(name="nbadq5", type="integer", nullable=true)
     */
    private $nbadq5;

    /**
     * @var int
     *
     * @ORM\Column(name="nbenq5", type="integer", nullable=true)
     */
    private $nbenq5;

    /**
     * @var int
     *
     * @ORM\Column(name="idarq5", type="integer", nullable=true)
     */
    private $idarq5;
    
    /**
     * @var int
     *
     * @ORM\Column(name="nbs", type="integer", nullable=true)
     */
    private $nbs;
    
     /**
     * @var int
     *
     * @ORM\Column(name="nbd", type="integer", nullable=true)
     */
    private $nbd;
    
     /**
     * @var int
     *
     * @ORM\Column(name="nbt", type="integer", nullable=true)
     */
    private $nbt;
    
     /**
     * @var int
     *
     * @ORM\Column(name="nbq", type="integer", nullable=true)
     */
    private $nbq;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataCreation", type="date")
     */
    private $dataCreation;


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
     * Set dateArrivee
     *
     * @param \DateTime $dateArrivee
     *
     * @return Reservation
     */
    public function setDateArrivee($dateArrivee)
    {
        $this->dateArrivee = $dateArrivee;

        return $this;
    }

    /**
     * Get dateArrivee
     *
     * @return \DateTime
     */
    public function getDateArrivee()
    {
        return $this->dateArrivee;
    }

    /**
     * Set dateDepart
     *
     * @param \DateTime $dateDepart
     *
     * @return Reservation
     */
    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    /**
     * Get dateDepart
     *
     * @return \DateTime
     */
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * Set montantTotal
     *
     * @param string $montantTotal
     *
     * @return Reservation
     */
    public function setMontantTotal($montantTotal)
    {
        $this->montantTotal = $montantTotal;

        return $this;
    }

    /**
     * Get montantTotal
     *
     * @return string
     */
    public function getMontantTotal()
    {
        return $this->montantTotal;
    }

    /**
     * Set nbads1
     *
     * @param integer $nbads1
     *
     * @return Reservation
     */
    public function setNbads1($nbads1)
    {
        $this->nbads1 = $nbads1;

        return $this;
    }

    /**
     * Get nbads1
     *
     * @return int
     */
    public function getNbads1()
    {
        return $this->nbads1;
    }

    /**
     * Set nbens1
     *
     * @param integer $nbens1
     *
     * @return Reservation
     */
    public function setNbens1($nbens1)
    {
        $this->nbens1 = $nbens1;

        return $this;
    }

    /**
     * Get nbens1
     *
     * @return int
     */
    public function getNbens1()
    {
        return $this->nbens1;
    }

    /**
     * Set nbars1
     *
     * @param string $nbars1
     *
     * @return Reservation
     */
    public function setNbars1($nbars1)
    {
        $this->nbars1 = $nbars1;

        return $this;
    }

    /**
     * Get nbars1
     *
     * @return string
     */
    public function getNbars1()
    {
        return $this->nbars1;
    }

    /**
     * Set nbads2
     *
     * @param integer $nbads2
     *
     * @return Reservation
     */
    public function setNbads2($nbads2)
    {
        $this->nbads2 = $nbads2;

        return $this;
    }

    /**
     * Get nbads2
     *
     * @return int
     */
    public function getNbads2()
    {
        return $this->nbads2;
    }

    /**
     * Set nbens2
     *
     * @param integer $nbens2
     *
     * @return Reservation
     */
    public function setNbens2($nbens2)
    {
        $this->nbens2 = $nbens2;

        return $this;
    }

    /**
     * Get nbens2
     *
     * @return int
     */
    public function getNbens2()
    {
        return $this->nbens2;
    }

    /**
     * Set idars2
     *
     * @param string $idars2
     *
     * @return Reservation
     */
    public function setIdars2($idars2)
    {
        $this->idars2 = $idars2;

        return $this;
    }

    /**
     * Get idars2
     *
     * @return string
     */
    public function getIdars2()
    {
        return $this->idars2;
    }

    /**
     * Set nbads3
     *
     * @param integer $nbads3
     *
     * @return Reservation
     */
    public function setNbads3($nbads3)
    {
        $this->nbads3 = $nbads3;

        return $this;
    }

    /**
     * Get nbads3
     *
     * @return int
     */
    public function getNbads3()
    {
        return $this->nbads3;
    }

    /**
     * Set nbens3
     *
     * @param integer $nbens3
     *
     * @return Reservation
     */
    public function setNbens3($nbens3)
    {
        $this->nbens3 = $nbens3;

        return $this;
    }

    /**
     * Get nbens3
     *
     * @return int
     */
    public function getNbens3()
    {
        return $this->nbens3;
    }

    /**
     * Set idars3
     *
     * @param integer $idars3
     *
     * @return Reservation
     */
    public function setIdars3($idars3)
    {
        $this->idars3 = $idars3;

        return $this;
    }

    /**
     * Get idars3
     *
     * @return int
     */
    public function getIdars3()
    {
        return $this->idars3;
    }

    /**
     * Set nbads4
     *
     * @param integer $nbads4
     *
     * @return Reservation
     */
    public function setNbads4($nbads4)
    {
        $this->nbads4 = $nbads4;

        return $this;
    }

    /**
     * Get nbads4
     *
     * @return int
     */
    public function getNbads4()
    {
        return $this->nbads4;
    }

    /**
     * Set nbens4
     *
     * @param integer $nbens4
     *
     * @return Reservation
     */
    public function setNbens4($nbens4)
    {
        $this->nbens4 = $nbens4;

        return $this;
    }

    /**
     * Get nbens4
     *
     * @return int
     */
    public function getNbens4()
    {
        return $this->nbens4;
    }

    /**
     * Set idars4
     *
     * @param integer $idars4
     *
     * @return Reservation
     */
    public function setIdars4($idars4)
    {
        $this->idars4 = $idars4;

        return $this;
    }

    /**
     * Get idars4
     *
     * @return int
     */
    public function getIdars4()
    {
        return $this->idars4;
    }

    /**
     * Set nbads5
     *
     * @param integer $nbads5
     *
     * @return Reservation
     */
    public function setNbads5($nbads5)
    {
        $this->nbads5 = $nbads5;

        return $this;
    }

    /**
     * Get nbads5
     *
     * @return int
     */
    public function getNbads5()
    {
        return $this->nbads5;
    }

    /**
     * Set nbens5
     *
     * @param integer $nbens5
     *
     * @return Reservation
     */
    public function setNbens5($nbens5)
    {
        $this->nbens5 = $nbens5;

        return $this;
    }

    /**
     * Get nbens5
     *
     * @return int
     */
    public function getNbens5()
    {
        return $this->nbens5;
    }

    /**
     * Set idars5
     *
     * @param integer $idars5
     *
     * @return Reservation
     */
    public function setIdars5($idars5)
    {
        $this->idars5 = $idars5;

        return $this;
    }

    /**
     * Get idars5
     *
     * @return int
     */
    public function getIdars5()
    {
        return $this->idars5;
    }

    /**
     * Set nbadd1
     *
     * @param integer $nbadd1
     *
     * @return Reservation
     */
    public function setNbadd1($nbadd1)
    {
        $this->nbadd1 = $nbadd1;

        return $this;
    }

    /**
     * Get nbadd1
     *
     * @return int
     */
    public function getNbadd1()
    {
        return $this->nbadd1;
    }

    /**
     * Set nbend1
     *
     * @param integer $nbend1
     *
     * @return Reservation
     */
    public function setNbend1($nbend1)
    {
        $this->nbend1 = $nbend1;

        return $this;
    }

    /**
     * Get nbend1
     *
     * @return int
     */
    public function getNbend1()
    {
        return $this->nbend1;
    }

    /**
     * Set idard1
     *
     * @param integer $idard1
     *
     * @return Reservation
     */
    public function setIdard1($idard1)
    {
        $this->idard1 = $idard1;

        return $this;
    }

    /**
     * Get idard1
     *
     * @return int
     */
    public function getIdard1()
    {
        return $this->idard1;
    }

    /**
     * Set nbadd2
     *
     * @param integer $nbadd2
     *
     * @return Reservation
     */
    public function setNbadd2($nbadd2)
    {
        $this->nbadd2 = $nbadd2;

        return $this;
    }

    /**
     * Get nbadd2
     *
     * @return int
     */
    public function getNbadd2()
    {
        return $this->nbadd2;
    }

    /**
     * Set nbend2
     *
     * @param integer $nbend2
     *
     * @return Reservation
     */
    public function setNbend2($nbend2)
    {
        $this->nbend2 = $nbend2;

        return $this;
    }

    /**
     * Get nbend2
     *
     * @return int
     */
    public function getNbend2()
    {
        return $this->nbend2;
    }

    /**
     * Set idard2
     *
     * @param integer $idard2
     *
     * @return Reservation
     */
    public function setIdard2($idard2)
    {
        $this->idard2 = $idard2;

        return $this;
    }

    /**
     * Get idard2
     *
     * @return int
     */
    public function getIdard2()
    {
        return $this->idard2;
    }

    /**
     * Set nbadd3
     *
     * @param integer $nbadd3
     *
     * @return Reservation
     */
    public function setNbadd3($nbadd3)
    {
        $this->nbadd3 = $nbadd3;

        return $this;
    }

    /**
     * Get nbadd3
     *
     * @return int
     */
    public function getNbadd3()
    {
        return $this->nbadd3;
    }

    /**
     * Set nbend3
     *
     * @param integer $nbend3
     *
     * @return Reservation
     */
    public function setNbend3($nbend3)
    {
        $this->nbend3 = $nbend3;

        return $this;
    }

    /**
     * Get nbend3
     *
     * @return int
     */
    public function getNbend3()
    {
        return $this->nbend3;
    }

    /**
     * Set idard3
     *
     * @param integer $idard3
     *
     * @return Reservation
     */
    public function setIdard3($idard3)
    {
        $this->idard3 = $idard3;

        return $this;
    }

    /**
     * Get idard3
     *
     * @return int
     */
    public function getIdard3()
    {
        return $this->idard3;
    }

    /**
     * Set nbadd4
     *
     * @param integer $nbadd4
     *
     * @return Reservation
     */
    public function setNbadd4($nbadd4)
    {
        $this->nbadd4 = $nbadd4;

        return $this;
    }

    /**
     * Get nbadd4
     *
     * @return int
     */
    public function getNbadd4()
    {
        return $this->nbadd4;
    }

    /**
     * Set nbend4
     *
     * @param integer $nbend4
     *
     * @return Reservation
     */
    public function setNbend4($nbend4)
    {
        $this->nbend4 = $nbend4;

        return $this;
    }

    /**
     * Get nbend4
     *
     * @return int
     */
    public function getNbend4()
    {
        return $this->nbend4;
    }

    /**
     * Set idard4
     *
     * @param integer $idard4
     *
     * @return Reservation
     */
    public function setIdard4($idard4)
    {
        $this->idard4 = $idard4;

        return $this;
    }

    /**
     * Get idard4
     *
     * @return int
     */
    public function getIdard4()
    {
        return $this->idard4;
    }

    /**
     * Set nbadd5
     *
     * @param integer $nbadd5
     *
     * @return Reservation
     */
    public function setNbadd5($nbadd5)
    {
        $this->nbadd5 = $nbadd5;

        return $this;
    }

    /**
     * Get nbadd5
     *
     * @return int
     */
    public function getNbadd5()
    {
        return $this->nbadd5;
    }

    /**
     * Set nbend5
     *
     * @param integer $nbend5
     *
     * @return Reservation
     */
    public function setNbend5($nbend5)
    {
        $this->nbend5 = $nbend5;

        return $this;
    }

    /**
     * Get nbend5
     *
     * @return int
     */
    public function getNbend5()
    {
        return $this->nbend5;
    }

    /**
     * Set idard5
     *
     * @param integer $idard5
     *
     * @return Reservation
     */
    public function setIdard5($idard5)
    {
        $this->idard5 = $idard5;

        return $this;
    }

    /**
     * Get idard5
     *
     * @return int
     */
    public function getIdard5()
    {
        return $this->idard5;
    }

    /**
     * Set nbadt1
     *
     * @param integer $nbadt1
     *
     * @return Reservation
     */
    public function setNbadt1($nbadt1)
    {
        $this->nbadt1 = $nbadt1;

        return $this;
    }

    /**
     * Get nbadt1
     *
     * @return int
     */
    public function getNbadt1()
    {
        return $this->nbadt1;
    }

    /**
     * Set nbent1
     *
     * @param integer $nbent1
     *
     * @return Reservation
     */
    public function setNbent1($nbent1)
    {
        $this->nbent1 = $nbent1;

        return $this;
    }

    /**
     * Get nbent1
     *
     * @return int
     */
    public function getNbent1()
    {
        return $this->nbent1;
    }

    /**
     * Set idart1
     *
     * @param integer $idart1
     *
     * @return Reservation
     */
    public function setIdart1($idart1)
    {
        $this->idart1 = $idart1;

        return $this;
    }

    /**
     * Get idart1
     *
     * @return int
     */
    public function getIdart1()
    {
        return $this->idart1;
    }

    /**
     * Set nbadt2
     *
     * @param integer $nbadt2
     *
     * @return Reservation
     */
    public function setNbadt2($nbadt2)
    {
        $this->nbadt2 = $nbadt2;

        return $this;
    }

    /**
     * Get nbadt2
     *
     * @return int
     */
    public function getNbadt2()
    {
        return $this->nbadt2;
    }

    /**
     * Set nbent2
     *
     * @param integer $nbent2
     *
     * @return Reservation
     */
    public function setNbent2($nbent2)
    {
        $this->nbent2 = $nbent2;

        return $this;
    }

    /**
     * Get nbent2
     *
     * @return int
     */
    public function getNbent2()
    {
        return $this->nbent2;
    }

    /**
     * Set idart2
     *
     * @param integer $idart2
     *
     * @return Reservation
     */
    public function setIdart2($idart2)
    {
        $this->idart2 = $idart2;

        return $this;
    }

    /**
     * Get idart2
     *
     * @return int
     */
    public function getIdart2()
    {
        return $this->idart2;
    }

    /**
     * Set nbadt3
     *
     * @param integer $nbadt3
     *
     * @return Reservation
     */
    public function setNbadt3($nbadt3)
    {
        $this->nbadt3 = $nbadt3;

        return $this;
    }

    /**
     * Get nbadt3
     *
     * @return int
     */
    public function getNbadt3()
    {
        return $this->nbadt3;
    }

    /**
     * Set nbent3
     *
     * @param integer $nbent3
     *
     * @return Reservation
     */
    public function setNbent3($nbent3)
    {
        $this->nbent3 = $nbent3;

        return $this;
    }

    /**
     * Get nbent3
     *
     * @return int
     */
    public function getNbent3()
    {
        return $this->nbent3;
    }

    /**
     * Set nbadt4
     *
     * @param integer $nbadt4
     *
     * @return Reservation
     */
    public function setNbadt4($nbadt4)
    {
        $this->nbadt4 = $nbadt4;

        return $this;
    }

    /**
     * Get nbadt4
     *
     * @return int
     */
    public function getNbadt4()
    {
        return $this->nbadt4;
    }

    /**
     * Set nbent4
     *
     * @param integer $nbent4
     *
     * @return Reservation
     */
    public function setNbent4($nbent4)
    {
        $this->nbent4 = $nbent4;

        return $this;
    }

    /**
     * Get nbent4
     *
     * @return int
     */
    public function getNbent4()
    {
        return $this->nbent4;
    }

    /**
     * Set idart4
     *
     * @param integer $idart4
     *
     * @return Reservation
     */
    public function setIdart4($idart4)
    {
        $this->idart4 = $idart4;

        return $this;
    }

    /**
     * Get idart4
     *
     * @return int
     */
    public function getIdart4()
    {
        return $this->idart4;
    }

    /**
     * Set nbadt5
     *
     * @param integer $nbadt5
     *
     * @return Reservation
     */
    public function setNbadt5($nbadt5)
    {
        $this->nbadt5 = $nbadt5;

        return $this;
    }

    /**
     * Get nbadt5
     *
     * @return int
     */
    public function getNbadt5()
    {
        return $this->nbadt5;
    }

    /**
     * Set nbent5
     *
     * @param integer $nbent5
     *
     * @return Reservation
     */
    public function setNbent5($nbent5)
    {
        $this->nbent5 = $nbent5;

        return $this;
    }

    /**
     * Get nbent5
     *
     * @return int
     */
    public function getNbent5()
    {
        return $this->nbent5;
    }

    /**
     * Set idart5
     *
     * @param integer $idart5
     *
     * @return Reservation
     */
    public function setIdart5($idart5)
    {
        $this->idart5 = $idart5;

        return $this;
    }

    /**
     * Get idart5
     *
     * @return int
     */
    public function getIdart5()
    {
        return $this->idart5;
    }

    /**
     * Set nbadq1
     *
     * @param integer $nbadq1
     *
     * @return Reservation
     */
    public function setNbadq1($nbadq1)
    {
        $this->nbadq1 = $nbadq1;

        return $this;
    }

    /**
     * Get nbadq1
     *
     * @return int
     */
    public function getNbadq1()
    {
        return $this->nbadq1;
    }

    /**
     * Set nbenq1
     *
     * @param integer $nbenq1
     *
     * @return Reservation
     */
    public function setNbenq1($nbenq1)
    {
        $this->nbenq1 = $nbenq1;

        return $this;
    }

    /**
     * Get nbenq1
     *
     * @return int
     */
    public function getNbenq1()
    {
        return $this->nbenq1;
    }

    /**
     * Set idarq1
     *
     * @param integer $idarq1
     *
     * @return Reservation
     */
    public function setIdarq1($idarq1)
    {
        $this->idarq1 = $idarq1;

        return $this;
    }

    /**
     * Get idarq1
     *
     * @return int
     */
    public function getIdarq1()
    {
        return $this->idarq1;
    }

    /**
     * Set nbadq2
     *
     * @param integer $nbadq2
     *
     * @return Reservation
     */
    public function setNbadq2($nbadq2)
    {
        $this->nbadq2 = $nbadq2;

        return $this;
    }

    /**
     * Get nbadq2
     *
     * @return int
     */
    public function getNbadq2()
    {
        return $this->nbadq2;
    }

    /**
     * Set nbenq2
     *
     * @param integer $nbenq2
     *
     * @return Reservation
     */
    public function setNbenq2($nbenq2)
    {
        $this->nbenq2 = $nbenq2;

        return $this;
    }

    /**
     * Get nbenq2
     *
     * @return int
     */
    public function getNbenq2()
    {
        return $this->nbenq2;
    }

    /**
     * Set idarq2
     *
     * @param integer $idarq2
     *
     * @return Reservation
     */
    public function setIdarq2($idarq2)
    {
        $this->idarq2 = $idarq2;

        return $this;
    }

    /**
     * Get idarq2
     *
     * @return int
     */
    public function getIdarq2()
    {
        return $this->idarq2;
    }

    /**
     * Set nbadq3
     *
     * @param integer $nbadq3
     *
     * @return Reservation
     */
    public function setNbadq3($nbadq3)
    {
        $this->nbadq3 = $nbadq3;

        return $this;
    }

    /**
     * Get nbadq3
     *
     * @return int
     */
    public function getNbadq3()
    {
        return $this->nbadq3;
    }

    /**
     * Set nbenq3
     *
     * @param integer $nbenq3
     *
     * @return Reservation
     */
    public function setNbenq3($nbenq3)
    {
        $this->nbenq3 = $nbenq3;

        return $this;
    }

    /**
     * Get nbenq3
     *
     * @return int
     */
    public function getNbenq3()
    {
        return $this->nbenq3;
    }

    /**
     * Set idarq3
     *
     * @param integer $idarq3
     *
     * @return Reservation
     */
    public function setIdarq3($idarq3)
    {
        $this->idarq3 = $idarq3;

        return $this;
    }

    /**
     * Get idarq3
     *
     * @return int
     */
    public function getIdarq3()
    {
        return $this->idarq3;
    }

    /**
     * Set nbadq4
     *
     * @param integer $nbadq4
     *
     * @return Reservation
     */
    public function setNbadq4($nbadq4)
    {
        $this->nbadq4 = $nbadq4;

        return $this;
    }

    /**
     * Get nbadq4
     *
     * @return int
     */
    public function getNbadq4()
    {
        return $this->nbadq4;
    }

    /**
     * Set nbenq4
     *
     * @param integer $nbenq4
     *
     * @return Reservation
     */
    public function setNbenq4($nbenq4)
    {
        $this->nbenq4 = $nbenq4;

        return $this;
    }

    /**
     * Get nbenq4
     *
     * @return int
     */
    public function getNbenq4()
    {
        return $this->nbenq4;
    }

    /**
     * Set idarq4
     *
     * @param integer $idarq4
     *
     * @return Reservation
     */
    public function setIdarq4($idarq4)
    {
        $this->idarq4 = $idarq4;

        return $this;
    }

    /**
     * Get idarq4
     *
     * @return int
     */
    public function getIdarq4()
    {
        return $this->idarq4;
    }

    /**
     * Set nbadq5
     *
     * @param integer $nbadq5
     *
     * @return Reservation
     */
    public function setNbadq5($nbadq5)
    {
        $this->nbadq5 = $nbadq5;

        return $this;
    }

    /**
     * Get nbadq5
     *
     * @return int
     */
    public function getNbadq5()
    {
        return $this->nbadq5;
    }

    /**
     * Set nbenq5
     *
     * @param integer $nbenq5
     *
     * @return Reservation
     */
    public function setNbenq5($nbenq5)
    {
        $this->nbenq5 = $nbenq5;

        return $this;
    }

    /**
     * Get nbenq5
     *
     * @return int
     */
    public function getNbenq5()
    {
        return $this->nbenq5;
    }

    /**
     * Set idarq5
     *
     * @param integer $idarq5
     *
     * @return Reservation
     */
    public function setIdarq5($idarq5)
    {
        $this->idarq5 = $idarq5;

        return $this;
    }

    /**
     * Get idarq5
     *
     * @return int
     */
    public function getIdarq5()
    {
        return $this->idarq5;
    }

    /**
     * Set dataCreation
     *
     * @param \DateTime $dataCreation
     *
     * @return Reservation
     */
    public function setDataCreation($dataCreation)
    {
        $this->dataCreation = $dataCreation;

        return $this;
    }

    /**
     * Get dataCreation
     *
     * @return \DateTime
     */
    public function getDataCreation()
    {
        return $this->dataCreation;
    }

    /**
     * Set idars1
     *
     * @param integer $idars1
     *
     * @return Reservation
     */
    public function setIdars1($idars1)
    {
        $this->idars1 = $idars1;

        return $this;
    }

    /**
     * Get idars1
     *
     * @return integer
     */
    public function getIdars1()
    {
        return $this->idars1;
    }

    /**
     * Set nbs
     *
     * @param integer $nbs
     *
     * @return Reservation
     */
    public function setNbs($nbs)
    {
        $this->nbs = $nbs;

        return $this;
    }

    /**
     * Get nbs
     *
     * @return integer
     */
    public function getNbs()
    {
        return $this->nbs;
    }

    /**
     * Set nbd
     *
     * @param integer $nbd
     *
     * @return Reservation
     */
    public function setNbd($nbd)
    {
        $this->nbd = $nbd;

        return $this;
    }

    /**
     * Get nbd
     *
     * @return integer
     */
    public function getNbd()
    {
        return $this->nbd;
    }

    /**
     * Set nbt
     *
     * @param integer $nbt
     *
     * @return Reservation
     */
    public function setNbt($nbt)
    {
        $this->nbt = $nbt;

        return $this;
    }

    /**
     * Get nbt
     *
     * @return integer
     */
    public function getNbt()
    {
        return $this->nbt;
    }

    /**
     * Set nbq
     *
     * @param integer $nbq
     *
     * @return Reservation
     */
    public function setNbq($nbq)
    {
        $this->nbq = $nbq;

        return $this;
    }

    /**
     * Get nbq
     *
     * @return integer
     */
    public function getNbq()
    {
        return $this->nbq;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->client = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set hotel
     *
     * @param \Etourisme\HotelBundle\Entity\Hotel $hotel
     *
     * @return Reservation
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
     * Add client
     *
     * @param \Etourisme\HotelBundle\Entity\Client $client
     *
     * @return Reservation
     */
    public function addClient(\Etourisme\HotelBundle\Entity\Client $client)
    {
        $this->client[] = $client;

        return $this;
    }

    /**
     * Remove client
     *
     * @param \Etourisme\HotelBundle\Entity\Client $client
     */
    public function removeClient(\Etourisme\HotelBundle\Entity\Client $client)
    {
        $this->client->removeElement($client);
    }

    /**
     * Get client
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClient()
    {
        return $this->client;
    }
}
