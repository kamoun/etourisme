<?php

namespace UsersBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Etourisme\UsersBundle\Entity\Utilisateur;

class UserAdmin implements FixtureInterface {

    public function load(ObjectManager $manager) {
        $admin = new Utilisateur;

        $admin->setNom("kamoun");
        $admin->setPrenom("malik");
        $admin->setEmail('kamoun.malik@gmail.com');
        $admin->setUsername('malik');
        $admin->setPlainPassword('malik');
        $admin->addRole("ROLE_ADMIN");
        $admin->setEnabled(true);
        $manager->persist($admin);



        $manager->flush();
    }

}
