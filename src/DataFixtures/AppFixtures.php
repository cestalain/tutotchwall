<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $generator=Faker\Factory::create('fr-FR');
        for ($i=0; $i < 10; $i++) { 
            $user = new User();
            $user->setFirstName($generator->firstName())
            ->setLastName($generator->lastName())
            ->setEmail($generator->email())
            ->setPassword('password');
            $manager->persist($user);
        }
        $manager->flush();
    }
}
