<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }


    public function findUserByNombre($nombre){
        $qb = $this->getEntityManager()->createQueryBuilder()
            ->select('u')
            ->from('App:User','u')
            ->where('u.nombre = :nombre')
            ->setParameter('nombre',$nombre);
            
        return $qb->getQuery()->getResult();
    }

    public function findUserByPassword($password){
        $qb = $this->getEntityManager()->createQueryBuilder()
            ->select('u')
            ->from('App:User','u')
            ->where('u.password = :password')
            ->setParameter('password',$password);
            
        return $qb->getQuery()->getResult();
    }

}
