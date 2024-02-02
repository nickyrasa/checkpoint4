<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PostsFixtures extends Fixture implements DependentFixtureInterface
{
    public const POSTS = [
        [
            'postTitle' => 'Equipe 1 vs Equipe 2',
            'description' => ' Super match de la part de Equipe 1 qui remporte se derby',
            'picture' => 'photo1.jpg',
            'detail' => 'Vivamus vestibulum dignissim efficitur. Suspendisse arcu turpis,
             pretium eu ipsum quis, pretium commodo leo. Pellentesque eu pulvinar arcu, quis luctus erat.
              Nulla maximus lacus sit amet ipsum consectetur faucibus.',
            'PostedBy' => 'player_bobbydu38'
        ],
        [
            'postTitle' => 'Equipe 1 vs Equipe 4 ',
            'description' => ' Super match de la part de Equipe 1 qui remporte se derby',
            'picture' => 'photo2.jpg',
            'detail' => 'Vivamus vestibulum dignissim efficitur. Suspendisse arcu turpis, 
            pretium eu ipsum quis, pretium commodo leo. Pellentesque eu pulvinar arcu, quis luctus erat.
             Nulla maximus lacus sit amet ipsum consectetur faucibus.',
            'PostedBy' => 'player_darksasuke'
        ],
        [
            'postTitle' => 'Equipe 1 vs Equipe 6',
            'description' => ' Super match de la part de Equipe 1 qui remporte se derby',
            'picture' => 'photo4.jpg',
            'detail' => 'Vivamus vestibulum dignissim efficitur. Suspendisse arcu turpis,
             pretium eu ipsum quis, pretium commodo leo. Pellentesque eu pulvinar arcu, quis luctus erat.
              Nulla maximus lacus sit amet ipsum consectetur faucibus.',
            'PostedBy' => 'player_billyBoy'
        ],
    ];


    public function load(ObjectManager $manager): void
    {
        foreach (self::POSTS as $postsFixture) {
            $posts = new Post();
            $posts->setPostTitle($postsFixture['postTitle']);
            $posts->setDescription($postsFixture['description']);
            $posts->setPicture($postsFixture['picture']);
            $posts->setPostedBy($this->getReference($postsFixture['PostedBy']));
            $manager->persist($posts);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [PlayersFixtures::class,];
    }
}
