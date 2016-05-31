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
        
        $occ2 = new Occupant();
        $occ2->setType('enf_avec_reduc_plus2ad');
        $manager->persist($occ2);
        
        $occ3 = new Occupant();
        $occ3->setType('occ_avec_reduc_3eme_lit');
        $manager->persist($occ3);
        
        $occ4 = new Occupant();
        $occ4->setType('enf_avec_reduc_plus1ad');
        $manager->persist($occ4);
        
        $occ5 = new Occupant();
        $occ5->setType('enf_avec_reduc_chsep');
        $manager->persist($occ5);
        
        $occ6 = new Occupant();
        $occ6->setType('occ_avec_reduc_4eme_lit');
        $manager->persist($occ6);
        
       

        $manager->flush();
    }

}
