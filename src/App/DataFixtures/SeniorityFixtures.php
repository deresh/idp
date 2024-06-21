<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Domain\Member\Model\Role;
use Domain\Member\Model\Seniority;
use Infrastructure\Doctrine\RoleEntity;
use Infrastructure\Doctrine\SeniorityEntity;
use Infrastructure\Doctrine\TeamEntity;

class SeniorityFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $csv = fopen(dirname(__FILE__).'/../../../var/data/seniority.csv', 'r');

        $i = 0;

        while (!feof($csv)) {
            $line = fgetcsv($csv);

            $roleEntity = new SeniorityEntity();

            $roleEntity->setSeniority(Seniority::from($line['0']));
            $roleEntity->setDescription($line[1]);
            $manager->persist($roleEntity);

            $this->addReference('seniority-'.$i, $roleEntity);


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
