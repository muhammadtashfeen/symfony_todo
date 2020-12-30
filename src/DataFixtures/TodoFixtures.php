<?php

namespace App\DataFixtures;

use App\Entity\Todo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TodoFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $description = "This is just a task description which will be shuffled for each task";

        for ($i=0; $i<10; $i++) {
            $todo = new Todo();
            $shuffledString = str_shuffle($description);

            $todo->setName(sprintf("Task No. %s", ($i + 1)));
            $todo->setDescription($shuffledString);
            $todo->setIsCompleted(rand(0, 1));

            $manager->persist($todo);
        }

        $manager->flush();
    }
}
