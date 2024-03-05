<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

//use App\Entity\Product;
//use App\Entity\Category;

class IndexController extends AbstractController
{
    public function index(EntityManagerInterface $doctrine): Response
    {
//        $product    = $doctrine->getRepository(Product::class)->productList();
//        $category   = $doctrine->getRepository(Category::class)->categoryList();
        // $product = new Product();
        // $product->setName('tessst2');
        // $product->setDescription('dssragon2');
        // $product->setAvailable(120);
        // $product->setPrice(2220);
        // $product->setCategory(2);
        // $product->setStatus(1);
        // $entityManager->persist($product);
        // $entityManager->flush();



        // $product = new Category();
        // $product->setName('dragonsurvival2.eu');
        // $product->setEdition('2');
        // $doctrine->persist($product);
        // $doctrine->flush();        

        /* kiedyś może będzie najpopularniejsze produkty z kategorią
        // $sorted = [];
        
        // foreach($category as $ckey => $cvalue){
        //     foreach($product as $pkey => $pvalue)
        //         if($cvalue['id'] == $pvalue['category']){
        //             $sorted[$cvalue['name']][] = ["name" => $pvalue['name'], "available" => $pvalue['available'], "price" => $pvalue['price']]; 
        //         }
        // }
         //var_dump($sorted);
        // return new Response('okay');
        */

        return $this->render('index/index.html.twig', [
//            'category'  => $category,
//            'product'   => $product,
            //'sorted'    => $sorted
        ]);
    }
}
