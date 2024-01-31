<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PostsFixtures extends Fixture
{
    public const POSTS = [
        [
            'postTitle' => 'Equipe 1 vs Equipe 2',
            'description' => ' Super match de la part de Equipe 1 qui remporte se derby',
            'picture' => 'photo1.jpg',
            'player' => 'player_bobbydu38'
        ],
        [
            'postTitle' => 'Equipe 1 vs Equipe 4 ',
            'description' => ' Super match de la part de Equipe 1 qui remporte se derby',
            'picture' => 'photo2.jpg',
            'player' => 'player_darksasuke'
        ],
        [
            'postTitle' => 'Equipe 1 vs Equipe 6',
            'description' => ' Super match de la part de Equipe 1 qui remporte se derby',
            'picture' => 'photo4.jpg',
            'player' => 'player_billyBoy'
        ],
    ];


    public function load(ObjectManager $manager): void
    {
        foreach (self::POSTS as $postsFixture) {
            $posts = new Post();
            $posts->setPostTitle($postsFixture['postTitle']);
            $posts->setDescription($postsFixture['description']);
            $posts->setPicture($postsFixture['picture']);
            $posts->setPlayer($this->getReference($postsFixture['player']));
            $manager->persist($posts);
        }

        $manager->flush();
    }
}
