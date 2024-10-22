<?php

namespace Web\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Domain\Member\Model\SeniorityLevel;
use Infrastructure\Doctrine\MemberEntity;

class MemberFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $csv = fopen(dirname(__FILE__).'/../../../var/data/members.csv', 'r');

        $i = 0;

        $mentorEmail = [];

        while (!feof($csv)) {
            $line = fgetcsv($csv);

            $memberEntity = new MemberEntity();

            $memberEntity->setEmail($line[0]);
            $memberEntity->setFirstName($line[1]);
            $memberEntity->setLastName($line[2]);
            $memberEntity->setRoles(new ArrayCollection([$this->getReference('role-'.$line[3])]));
            $memberEntity->setSeniority(SeniorityLevel::from($line[4]));
            $memberEntity->setHireDate(new \DateTime($line[9]));
            $memberEntity->setTeam($this->getReference('team-'.$line[5]));
            $memberEntity->setImage($line[12]);

            $filepath = dirname(__FILE__).'/../../../var/data/member_images/'.$line[12];

            if (file_exists($filepath)) {
                copy ($filepath, dirname(__FILE__).'/../../../public/uploads/images/members/'.$line[12]);
            }

            $mentorEmail[$i] = $line[6];

            $manager->persist($memberEntity);

            $this->addReference('member-'.$i, $memberEntity);

            if (! $this->hasReference('mentor-'. $memberEntity->getEmail())) {
                $this->addReference('mentor-'.$memberEntity->getEmail(), $memberEntity);
            }

            $i = $i + 1;
            if ($i % 25) {
                $manager->flush();
            }
        }
        fclose($csv);
        for ($j=0; $j < $i; $j++) {
            $memberEntity = $this->getReference('member-'.$j);

            $mentor = $this->getReference('mentor-'.$mentorEmail[$j]);

            $memberEntity->setMentor($mentor);

        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [RoleFixtures::class, TeamFixtures::class];
    }
}
