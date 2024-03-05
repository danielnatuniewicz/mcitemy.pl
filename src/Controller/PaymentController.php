<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Helper\PaymentHelper;

class PaymentController extends AbstractController
{
    public function createPayment(Request $request, PaymentHelper $paymentH)
    {
        $checkData = $paymentH->checkData($request->request->all());

        if($checkData['error'] == false){
            $paymentInfo = $paymentH->createPayment($request->request->all());

            return new JsonResponse($paymentInfo);
        }else{
            return new JsonResponse($checkData);
        }
    }
}