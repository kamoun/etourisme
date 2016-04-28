<?php

namespace UsersBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Etourisme\HotelBundle\Entity\Arrangement;

class ArrangementFixture implements FixtureInterface {

    public function load(ObjectManager $manager) {
        
        
        $arrangement1 = new Arrangement;
        $arrangement1->setLibelle('Logement Petit Déjeuner');
        $manager->persist($arrangement1);
        
        $arrangement2 = new Arrangement;
        $arrangement2->setLibelle('Demi Pension');
        $manager->persist($arrangement2);
        
        $arrangement3 = new Arrangement;
        $arrangement3->setLibelle('Pension Complète');
        $manager->persist($arrangement3);
        
        $arrangement4 = new Arrangement;
        $arrangement4->setLibelle('All Inclusive');
        $manager->persist($arrangement4);
        
        $arrangement5 = new Arrangement;
        $arrangement5->setLibelle('Logement Seul');
        $manager->persist($arrangement5);
        
        $arrangement6 = new Arrangement;
        $arrangement6->setLibelle('All Inclusive Soft');
        $manager->persist($arrangement6);
        
        $arrangement7 = new Arrangement;
        $arrangement7->setLibelle('Ultra All Inclusive');
        $manager->persist($arrangement7);
        
        $arrangement8 = new Arrangement;
        $arrangement8->setLibelle('Demi Pension Plus');
        $manager->persist($arrangement8);

        $arrangement9 = new Arrangement;
        $arrangement9->setLibelle('Pension Compléte Plus');
        $manager->persist($arrangement9);

        $manager->flush();
    }

}
