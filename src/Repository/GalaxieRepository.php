<?php

namespace App\Repository;

use App\Entity\Galaxie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Galaxie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Galaxie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Galaxie[]    findAll()
 * @method Galaxie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GalaxieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Galaxie::class);
    }

    // /**
    //  * @return Galaxie[] Returns an array of Galaxie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Galaxie
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
