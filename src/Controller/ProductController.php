<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use App\Helper\SellixHelper;

class ProductController extends AbstractController
{
    public function product($product, SellixHelper $sellix)
    {
        $product =  $sellix->getProduct($product);

        if($product['status'] == 200){
            return $this->render('product/product.html.twig', [
                'product'   => $product['data']['product'],
            ]);
        }else{
            return $this->render('error/error.html.twig', [
                'message'  => 'Przykro nam ale nie ma takiego produktu.',
            ]); 
        } 
    }
}
