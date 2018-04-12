<?php

namespace App\Repository;

use App\Entity\Bien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Bien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bien[]    findAll()
 * @method Bien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BienRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Bien::class);
    }

//    /**
//     * @return Bien[] Returns an array of Bien objects
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

    
    public function findOneBySomeField($value): ?Bien
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
  
    

    
public function findBiens($idLocalite=0,$idType=0,$budget=0)
{
    $dql = "SELECT b, i FROM App\Entity\Bien b 
    left Join b.images i Join b.typeBien t Join b.localite l WHERE b.etat = 1";
 
    if ($idLocalite != 0) {
        $dql .= ' AND l.id = :idLoc';
    }
    if ($idType != 0) {
        $dql .= ' AND t.id = :idType';
    }
    if ($budget != 0) {
        $dql .= ' AND b.prixlocation BETWEEN :prixMin AND :prixMax';
    }

    $query = $this->getEntityManager()->createQuery($dql);

    if ($idLocalite != 0) {
        $query->setParameter('idLoc', $idLocalite);
    }
    if ($idType != 0) {
        $query->setParameter('idType', $idType);
    }
    if ($budget != 0) {
        $query->setParameter('prixMin', $budget - 10000)
        ->setParameter('prixMax', $budget + 20000);
    }


    return $query->getResult();
}

public function findOderById()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT b FROM App\Entity\Bien b ORDER BY b.id ASC'
            )
            ->getResult();
    }



    public function AllBiens(){
    $dql = "SELECT b, i FROM App\Entity\Bien b 
    left Join b.images i Join b.typeBien t Join b.localite l WHERE b.etat = 1";
    $query = $this->getEntityManager()->createQuery($dql);
    return $query->getResult();
    }

}

