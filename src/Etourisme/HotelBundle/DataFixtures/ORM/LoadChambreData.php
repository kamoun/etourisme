<?php

namespace HotelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Etourisme\HotelBundle\Entity\Chambre;

class ChambreFixture implements FixtureInterface {

    public function load(ObjectManager $manager) {
        
        
        $chambre1 = new Chambre;
        $chambre1->setType('Chambre Single');
        $manager->persist($chambre1);
        
        $chambre2 = new Chambre;
        $chambre2->setType('Chambre Double');
        $manager->persist($chambre2);
        
        $chambre3 = new Chambre;
        $chambre3->setType('Chambre Triple');
        $manager->persist($chambre3);
        
        $chambre4 = new Chambre;
        $chambre4->setType('Chambre Quadruple');
        $manager->persist($chambre4);
        

        $manager->flush();
    }

}
