<?php

namespace HotelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Etourisme\HotelBundle\Entity\Occupant;

class OccupantFixture implements FixtureInterface {

    public function load(ObjectManager $manager) {
        
        
        $occ1 = new Occupant();
        $occ1->setType('occ_ss_reduc');
        $manager->persist($occ1);
        
       

        $manager->flush();
    }

}
