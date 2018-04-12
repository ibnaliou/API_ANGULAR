<?php

namespace App\Repository;

use App\Entity\TestR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TestR|null find($id, $lockMode = null, $lockVersion = null)
 * @method TestR|null findOneBy(array $criteria, array $orderBy = null)
 * @method TestR[]    findAll()
 * @method TestR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestRRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TestR::class);
    }

//    /**
//     * @return TestR[] Returns an array of TestR objects
//     */
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

    
    public function findOneBySomeField($value): ?TestR
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
  
    

    public function findBiens(){

        $dql = "SELECT * FROM TestR   " ;
        $query = $this->getEntityManager()->createQuery($dql);
        return $query->getResult();
     
    }

    public function findId()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT b FROM App\Entity\TestR b ORDER BY b.id ASC'
            )
            ->getResult();
    }



}

