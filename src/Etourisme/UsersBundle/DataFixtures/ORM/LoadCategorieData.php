<?php

namespace UsersBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Etourisme\HotelBundle\Entity\Categorie;

class CategorieFixture implements FixtureInterface {

    public function load(ObjectManager $manager) {
        $categorie1 = new Categorie;
        $categorie1->setLibelle('Autres');
        $manager->persist($categorie1);
        
        $categorie2 = new Categorie;
        $categorie2->setLibelle('1 étoile');
        $manager->persist($categorie2);
        
        $categorie3 = new Categorie;
        $categorie3->setLibelle('2 étoiles');
        $manager->persist($categorie3);
        
        $categorie4 = new Categorie;
        $categorie4->setLibelle('3 étoiles');
        $manager->persist($categorie4);
        
        $categorie5 = new Categorie;
        $categorie5->setLibelle('5 étoiles');
        $manager->persist($categorie5);
        
        $categorie6 = new Categorie;
        $categorie6->setLibelle('Hôtel De Charme');
        $manager->persist($categorie6);
        
        $categorie7 = new Categorie;
        $categorie7->setLibelle('Résidences');
        $manager->persist($categorie7);



        $manager->flush();
    }

}
