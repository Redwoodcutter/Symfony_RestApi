<?php

namespace App\Repository;

use App\Entity\OrderPost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OrderPost|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderPost|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderPost[]    findAll()
 * @method OrderPost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderPostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrderPost::class);
    }

    // /**
    //  * @return OrderPost[] Returns an array of OrderPost objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrderPost
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
