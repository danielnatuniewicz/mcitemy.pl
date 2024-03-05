<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use App\Helper\SellixHelper;

class CategoryController extends AbstractController
{
    public function index(SellixHelper $sellix) :response 
    {
        $category = $sellix->getCategoryList();

        if($category['status'] == 200){
            return $this->render('category/category.html.twig', [
                'category'  => $category,
            ]);
        }

        return $this->render('error/error.html.twig', [
            'message'  => 'Coś poszło nie tak z ładowaniem listy serwerów, spróbuj ponownie później',
        ]);               
    }

    public function category($category, SellixHelper $sellix) :response
    {
        $categoryList = $sellix->getProductList($category);
        
        if($categoryList['status'] == 200 && $categoryList['data']['category']['products_count'] > 0){
            return $this->render('category/categoryProduct.html.twig', [
                'product'   => $categoryList['data']['category'],
            ]);            
        }

        return $this->render('error/error.html.twig', [
            'message'  => 'Przykro nam ale nie ma takiego serwera u nas w ofercie lub w kategorii nie ma aktualnie żadnych produktów.',
        ]);    
    }
}
