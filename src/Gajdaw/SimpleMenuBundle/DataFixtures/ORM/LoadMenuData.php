<?php

namespace Gajdaw\SimpleMenuBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Gajdaw\SimpleMenuBundle\Entity\Menu;
use Symfony\Component\Yaml\Yaml;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $yml = Yaml::parse('data/menu.yml');

        foreach ($yml as $e) {
            echo $e['title'] . "\n";

            $r = new Menu();
            $r->setTitle($e['title']);
            $r->setContents($e['contents']);
            $r->setSlug($e['slug']);

            $manager->persist($r);
            $manager->flush();
        }

    }
}
