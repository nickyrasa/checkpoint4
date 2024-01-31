<?php

namespace App\DataFixtures;

use App\Entity\Player;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PlayersFixtures extends Fixture
{
    public const PLAYERS = [
        [
            'pseudo' => 'bobbydu38',
            'age' => 44,
        ],

    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::PLAYERS as $playersFixtures) {
            $players = new Player();
            $players->setPseudo($playersFixtures['pseudo']);
            $players->setAge($playersFixtures['age']);
            $manager->persist($players);
            $this->addReference('player_' . $playersFixtures['pseudo'], $players);
        }

        $manager->flush();
    }
}
