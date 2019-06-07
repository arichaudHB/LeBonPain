<?php

namespace App\Repository;

use App\Entity\AdBread;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AdBread|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdBread|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdBread[]    findAll()
 * @method AdBread[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdBreadRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AdBread::class);
    }

    // /**
    //  * @return AdBread[] Returns an array of AdBread objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AdBread
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
