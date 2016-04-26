<?php

namespace UsersBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Etourisme\UsersBundle\Entity\Utilisateur;

class UserAdmin implements FixtureInterface {

    public function load(ObjectManager $manager) {
        $admin = new Utilisateur;

        $admin->setNom("test2");
        $admin->setPrenom("test2");
        $admin->setEmail('test2@gmail.com');
        $admin->setUsername('test2');
        $admin->setPlainPassword('test2');
        $admin->addRole("ROLE_ADMIN");
        $admin->setEnabled(true);
        $manager->persist($admin);



        $manager->flush();
    }

}
