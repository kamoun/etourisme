<?php

namespace UsersBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Etourisme\HotelBundle\Entity\Ville;

class VilleFixture implements FixtureInterface {

    public function load(ObjectManager $manager) {
        
        
        $ville1 = new Ville;
        $ville1->setLibelle('Aîn Draham');
        $manager->persist($ville1);
        
        $ville2 = new Ville;
        $ville2->setLibelle('Bizerte');
        $manager->persist($ville2);
        
        $ville3 = new Ville;
        $ville3->setLibelle('Côtes de Carthage');
        $manager->persist($ville3);
        
        $ville4 = new Ville;
        $ville4->setLibelle('Djerba');
        $manager->persist($ville4);
        
        $ville5 = new Ville;
        $ville5->setLibelle('Dougga');
        $manager->persist($ville5);
        
        $ville6 = new Ville;
        $ville6->setLibelle('Douz');
        $manager->persist($ville6);
        
        $ville7 = new Ville;
        $ville7->setLibelle('Gabes');
        $manager->persist($ville7);

        $ville8 = new Ville;
        $ville8->setLibelle('Gafsa');
        $manager->persist($ville8);

        $ville9 = new Ville;
        $ville9->setLibelle('Hammamet');
        $manager->persist($ville9);

        $ville10 = new Ville;
        $ville10->setLibelle('Kairouan');
        $manager->persist($ville10);

        $ville11 = new Ville;
        $ville11->setLibelle('Kebili');
        $manager->persist($ville11);

        $ville12 = new Ville;
        $ville12->setLibelle('Kef');
        $manager->persist($ville12);

        $ville13 = new Ville;
        $ville13->setLibelle('Kelibia');
        $manager->persist($ville13);

        $ville14 = new Ville;
        $ville14->setLibelle('Korba');
        $manager->persist($ville14);

        $ville15 = new Ville;
        $ville15->setLibelle('Korbous');
        $manager->persist($ville15);

        $ville16 = new Ville;
        $ville16->setLibelle('Mahdia');
        $manager->persist($ville16);

        $ville17 = new Ville;
        $ville17->setLibelle('Matmata');
        $manager->persist($ville17);

        $ville18 = new Ville;
        $ville18->setLibelle('Monastir');
        $manager->persist($ville18);

        $ville19 = new Ville;
        $ville19->setLibelle('Nabeul');
        $manager->persist($ville19);

        $ville20 = new Ville;
        $ville20->setLibelle('Nefta');
        $manager->persist($ville20);

        $ville21 = new Ville;
        $ville21->setLibelle('Sbeitla');
        $manager->persist($ville21);

        $ville22 = new Ville;
        $ville22->setLibelle('Sfax');
        $manager->persist($ville22);

        $ville23 = new Ville;
        $ville23->setLibelle('Sidi Bou Saïd');
        $manager->persist($ville23);

        $ville24 = new Ville;
        $ville24->setLibelle('Sousse');
        $manager->persist($ville24);
        
        $ville25 = new Ville;
        $ville25->setLibelle('Tabarka');
        $manager->persist($ville25);

        $ville26 = new Ville;
        $ville26->setLibelle('Tataouine');
        $manager->persist($ville26);

        $ville27 = new Ville;
        $ville27->setLibelle('Tozeur');
        $manager->persist($ville27);

        $ville28 = new Ville;
        $ville28->setLibelle('Tunis');
        $manager->persist($ville28);

        $ville29 = new Ville;
        $ville29->setLibelle('Zaghouan');
        $manager->persist($ville29);
        
        $ville30 = new Ville;
        $ville30->setLibelle('Zarzis');
        $manager->persist($ville30);


        $manager->flush();
    }

}
