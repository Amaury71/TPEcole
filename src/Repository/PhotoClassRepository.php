<?php

namespace App\Repository;

use App\Entity\PhotoClass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PhotoClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhotoClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhotoClass[]    findAll()
 * @method PhotoClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotoClassRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhotoClass::class);
    }

    // /**
    //  * @return PhotoClass[] Returns an array of PhotoClass objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PhotoClass
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
