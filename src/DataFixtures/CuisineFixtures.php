<?php

namespace App\DataFixtures;

use App\Entity\Aliment;
use App\Entity\Stockage;
use App\Entity\TypeAliment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CuisineFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Type d'aliments de base
        $tabTypeAliment['matière grasse'][]='beurre';
        $tabTypeAliment['boisson'][] = 'eau';
        $tabTypeAliment['boisson'][] = 'coca';
        $tabTypeAliment['sucre'][] = 'sucre';
        $tabTypeAliment['laitier'][] = 'lait';
        $tabTypeAliment['féculent'][] = 'pâtes';
        $tabTypeAliment['viande'][] = 'haché de boeuf';
        $tabTypeAliment['poisson'][] = 'colin';
        $tabTypeAliment['oeuf'][] = 'oeuf';
        $tabTypeAliment['légume'][] = 'haricots verts';
        $tabTypeAliment['fruit'][] = 'banane';
        $tabTypeAliment['fruit'][] = 'kiwi';
        $tabTypeAliment['fruit'][] = 'pomme';

        foreach($tabTypeAliment as $type => $alim)
        {
            $typeAliment = new TypeAliment();
            $typeAliment->setNom($type);
            $manager->persist($typeAliment);
            foreach($alim as $nom)
            {
                $aliment = new Aliment();
                $aliment->setNom($nom);
                $aliment->setTypeAliment($typeAliment);
                $manager->persist($aliment);
            }
        }

        //Création des lieux de stockages
        $tabStockage['maison'][]='test';
        $tabTypeAliment['boisson'][] = 'eau';
        $tabTypeAliment['boisson'][] = 'coca';

        $stockage1 = new Stockage();
        $stockage1->setNom('maison');
        $manager->persist($stockage1);

        $stockage = new Stockage();
        $stockage->setNom('sous-sol')->setParent($stockage1);
        $manager->persist($stockage);

        $stockage = new Stockage();
        $stockage->setNom('rez-de-chaussée')->setParent($stockage1);
        $manager->persist($stockage);

        $manager->flush();
    }
}
