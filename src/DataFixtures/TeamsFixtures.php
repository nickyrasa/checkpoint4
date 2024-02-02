<?php

namespace App\DataFixtures;

use App\Entity\Player;
use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TeamsFixtures extends Fixture
{
    public const TEAMS = [
        [
            'teamName' => 'DragonBaller'
        ],
        [
            'teamName' => 'Whoopers'
        ],
        [
            'teamName' => 'BBallin'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::TEAMS as $teamsFixtures) {
            $teams = new Team();
            $teams->setTeamName($teamsFixtures['teamName']);
            $manager->persist($teams);
            $this->addReference('team_' . $teamsFixtures['teamName'], $teams);
        }

        $manager->flush();
    }
}
