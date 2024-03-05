<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    // /**
    //  * @return Product[] Returns an array of Product objects
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
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function productListCategory($categoryId)
    {
        $em = $this->getEntityManager();
        $productListQuery = $em->createQuery('SELECT p.id, p.name, p.available, p.price, p.photo, p.description FROM App\Entity\Product p WHERE p.category = :category')->setParameter('category', $categoryId);

        // return $productListQuery->getResult();
        // $productListQuery = $em->createQuery('SELECT p.id, p.name, p.available, p.price, 
        //                                       FROM App\Entity\Product p 
        //                                       WHERE p.category = :category')
        // ->setParameter('category', $categoryId);

        return $productListQuery->getResult();
        //zrobic tutaj że pobiera wszystkie elementy z category id
    }

    public function productList()
    {
        $em = $this->getEntityManager();

        $productListQuery   = $em->createQuery('SELECT p.id, p.name, p.available, p.price, p.category FROM App\Entity\Product p ORDER BY p.category ASC');

        // $categoryListQuery  = $em->createQuery('SELECT c.id, c.name FROM App\Entity\Category c ORDER BY c.id ASC');
        // $categoryListResult = $categoryListQuery->getResult();
    
        return $productListQuery->getResult();
    }

    public function getProductUsingId($productId)
    {
        $em = $this->getEntityManager();

        $product = $em->createQuery('SELECT p.id, p.name, p.available, p.price, p.photo, p.description FROM App\Entity\Product p WHERE p.id = :id')->setParameter('id', $productId);

        return $product->getResult();
    }
}
