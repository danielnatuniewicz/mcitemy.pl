<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

class IndexController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('index/index.html.twig');
    }
}
