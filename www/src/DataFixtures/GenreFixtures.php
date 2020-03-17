<?php


namespace App\DataFixtures;


use App\Entity\Genre\Genre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GenreFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $genre = new Genre();
        $genre->setName("Rock");
        $manager->persist($genre);

        $genre = new Genre();
        $genre->setName("Country");
        $manager->persist($genre);

        $genre = new Genre();
        $genre->setName("Pop");
        $manager->persist($genre);

        $genre = new Genre();
        $genre->setName("Disco");
        $manager->persist($genre);

        $genre = new Genre();
        $genre->setName("Jazz");
        $manager->persist($genre);

        $genre = new Genre();
        $genre->setName("The Blues");
        $manager->persist($genre);

        $manager->flush();
    }
}