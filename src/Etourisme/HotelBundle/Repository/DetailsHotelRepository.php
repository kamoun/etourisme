<?php

namespace Etourisme\HotelBundle\Repository;

use Symfony\Component\Form\Extension\Core\Type\DateType;
/**
 * DetailsHotelRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DetailsHotelRepository extends \Doctrine\ORM\EntityRepository
{
    public function getDetailsHotelByTemps($hotel_id,$checkin,$checkout) {
        $dayStart=date("d", strtotime($checkin));	
        $monthStart=date("m", strtotime($checkin));
        $yearStart=date("Y", strtotime($checkin));
        $dayFin=date("d", strtotime($checkout));	
        $monthFin=date("m", strtotime($checkout));
        $yearFin=date("Y", strtotime($checkout));
        $startdate=$yearStart.'-'.$monthStart.'-'.$dayStart;
        $enddate=$yearFin.'-'.$monthFin.'-'.$dayFin;
      
        $qb = $this->createQueryBuilder('j')
                ->where('j.hotel  = :hotel_id')  
                ->andWhere('j.tempsd <= :checkin ')
                ->andWhere('j.tempsf >= :checkout')
                ->setParameter('hotel_id', $hotel_id)
                ->setParameter('checkin',  new \Datetime($startdate))
                ->setParameter('checkout',  new \Datetime($enddate))
        ;
        $query = $qb->getQuery();
        return $query->getResult();
    }
}
