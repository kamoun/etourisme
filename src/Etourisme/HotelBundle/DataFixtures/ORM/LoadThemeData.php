<?php

namespace HotelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Etourisme\HotelBundle\Entity\Theme;

class ThemeFixture implements FixtureInterface {

    public function load(ObjectManager $manager) {
        
        
        $theme1 = new Theme;
        $theme1->setLibelle('Affaires');
        $manager->persist($theme1);
        
        $theme2 = new Theme;
        $theme2->setLibelle('Bien etre');
        $manager->persist($theme2);
        
        $theme3 = new Theme;
        $theme3->setLibelle('Séjour en famille');
        $manager->persist($theme3);
        
        $theme4 = new Theme;
        $theme4->setLibelle('Voyage de Noce');
        $manager->persist($theme4);
        
        $theme5 = new Theme;
        $theme5->setLibelle('Promo');
        $manager->persist($theme5);  
        
        $theme6 = new Theme;
        $theme6->setLibelle('Evénement');
        $manager->persist($theme6);
        
        $theme7 = new Theme;
        $theme7->setLibelle('Randonnée');
        $manager->persist($theme7);
        
        $theme8 = new Theme;
        $theme8->setLibelle('Last Minute');
        $manager->persist($theme8);
        
        $theme9 = new Theme;
        $theme9->setLibelle('Réveillon');
        $manager->persist($theme9);
        
        $theme10 = new Theme;
        $theme10->setLibelle('Week-end');
        $manager->persist($theme10);
        
        $theme11 = new Theme;
        $theme11->setLibelle('Pied dans l`eau');
        $manager->persist($theme11);
        
        $theme12 = new Theme;
        $theme12->setLibelle('Spéciale Famille');
        $manager->persist($theme12);
        
        $theme13 = new Theme;
        $theme13->setLibelle('Only Adult');
        $manager->persist($theme13);


        $manager->flush();
    }

}
