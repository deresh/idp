<?php

namespace Web\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Domain\Member\Model\Role;
use Infrastructure\Doctrine\RoleEntity;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $csv = fopen(dirname(__FILE__).'/../../../var/data/roles.csv', 'r');

        $i = 0;

        while (!feof($csv)) {
            $line = fgetcsv($csv);

            $roleEntity = new RoleEntity();

            $roleEntity->setRole(Role::from($line[0]));
            $roleEntity->setDescription($line[1]);

            $manager->persist($roleEntity);

            $ref = 'role-'.$roleEntity->getRole()->value;

            $this->addReference($ref, $roleEntity);

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
        return 20;
    }
}
