<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Infrastructure\Doctrine\TeamEntity;

class TeamFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $csv = fopen(dirname(__FILE__).'/../../../var/data/teams.csv', 'r');

        $i = 0;

        while (!feof($csv)) {
            $line = fgetcsv($csv);

            $teamEntity = new TeamEntity();

            $teamEntity->setName($line[0]);

            $manager->persist($teamEntity);

            $this->addReference('team-'.$i, $teamEntity);


            $i = $i + 1;

            if ($i % 25) {
                $manager->flush();
            }
        }

        fclose($csv);

        $manager->flush();
    }
    public function getOrder()
    {
        return 2;
    }
}
