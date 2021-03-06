<?php

namespace App\Repository;

use App\Entity\Messege;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Messege|null find($id, $lockMode = null, $lockVersion = null)
 * @method Messege|null findOneBy(array $criteria, array $orderBy = null)
 * @method Messege[]    findAll()
 * @method Messege[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MessegeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Messege::class);
    }

    public function findOrder()
    {
        return $this->findBy(array(), array('createdAt' => 'DESC'),10);
    }

    // /**
    //  * @return Messege[] Returns an array of Messege objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Messege
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
