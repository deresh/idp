<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Domain\Member\Model\Role;
use Domain\Member\Model\Seniority;
use Domain\Tools\Priority;
use Infrastructure\Doctrine\ToolEntity;

class ToolsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $csv = fopen(dirname(__FILE__).'/../../../var/data/tools.csv', 'r');

        $i = 0;

        while (!feof($csv)) {
            $line = fgetcsv($csv);

            $tool = new ToolEntity();

            dump($line);

            $tool->setName($line[2]);
            $tool->setDescription($line[3]);
            $tool->setPriority(Priority::from((int)$line[1]));
            $tool->setRole(Role::tryFrom($line[4]));
            $tool->setSeniority(Seniority::from($line[5]));

            $manager->persist($tool);

            $this->addReference('tool-'.$i, $tool);


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
        return 1;
    }
}
