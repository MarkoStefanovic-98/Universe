<?php

namespace App\Repository;

use App\Entity\Trounoir;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Trounoir|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trounoir|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trounoir[]    findAll()
 * @method Trounoir[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrounoirRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trounoir::class);
    }

    // /**
    //  * @return Trounoir[] Returns an array of Trounoir objects
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
    public function findOneBySomeField($value): ?Trounoir
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
