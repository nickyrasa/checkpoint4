<?php

namespace App\DataFixtures;

use App\Entity\Player;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PlayersFixtures extends Fixture implements DependentFixtureInterface
{
    public const PLAYERS = [
        [
            'pseudo' => 'bobbydu38',
            'age' => 44,
            'teamName' => 'team_DragonBaller'

        ],
        [
            'pseudo' => 'darksasuke',
            'age' => 44,
            'teamName' => 'team_Whoopers'
        ],
        [
            'pseudo' => 'billyBoy',
            'age' => 44,
            'teamName' => 'team_BBallin'
        ],

    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::PLAYERS as $playersFixtures) {
            $players = new Player();
            $players->setPseudo($playersFixtures['pseudo']);
            $players->setAge($playersFixtures['age']);
            $players->setTeam($this->getReference($playersFixtures['teamName']));
            $manager->persist($players);
            $this->addReference('player_' . $playersFixtures['pseudo'], $players);
        }

        $manager->flush();
    }


    public function getDependencies()
    {
        return [TeamsFixtures::class,];
    }
}
