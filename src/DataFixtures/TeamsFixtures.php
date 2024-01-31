<?php

namespace App\DataFixtures;

use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TeamsFixtures extends Fixture
{
    public const TEAMS = [
        [
            'teamName' => 'DARKBOBBY'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::TEAMS as $teamsFixtures) {
            $teams = new Team();
            $teams->setTeamName($teamsFixtures['teamName']);
            $manager->persist($teams);
        }

        $manager->flush();
    }
}
