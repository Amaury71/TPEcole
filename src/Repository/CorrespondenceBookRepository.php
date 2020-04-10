<?php

namespace App\Repository;

use App\Entity\CorrespondenceBook;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CorrespondenceBook|null find($id, $lockMode = null, $lockVersion = null)
 * @method CorrespondenceBook|null findOneBy(array $criteria, array $orderBy = null)
 * @method CorrespondenceBook[]    findAll()
 * @method CorrespondenceBook[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CorrespondenceBookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CorrespondenceBook::class);
    }

    // /**
    //  * @return CorrespondenceBook[] Returns an array of CorrespondenceBook objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CorrespondenceBook
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
