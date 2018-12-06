<?php

namespace App\Repository;

use App\Entity\TypeAliment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeAliment|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeAliment|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeAliment[]    findAll()
 * @method TypeAliment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeAlimentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeAliment::class);
    }

    // /**
    //  * @return TypeAliment[] Returns an array of TypeAliment objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeAliment
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
