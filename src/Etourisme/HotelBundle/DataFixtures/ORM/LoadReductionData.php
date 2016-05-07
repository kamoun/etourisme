<?php

namespace HotelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Etourisme\HotelBundle\Entity\Reduction;

class ReductionFixture implements FixtureInterface {

    public function load(ObjectManager $manager) {
        
        
        $reduction1 = new Reduction;
        $reduction1->setLibelle('Réduction enfant plus 2 adultes');
        $manager->persist($reduction1);
        
        $reduction2 = new Reduction;
        $reduction2->setLibelle('Réduction enfant plus 1 adulte');
        $manager->persist($reduction2);
        
        $reduction3 = new Reduction;
        $reduction3->setLibelle('Réduction enfant chambre séparer');
        $manager->persist($reduction3);
        
        $reduction4 = new Reduction;
        $reduction4->setLibelle('Réduction 3 éme lit');
        $manager->persist($reduction4);
        
        $reduction5 = new Reduction;
        $reduction5->setLibelle('Réduction 4 éme lit');
        $manager->persist($reduction5);        

        $manager->flush();
    }

}
