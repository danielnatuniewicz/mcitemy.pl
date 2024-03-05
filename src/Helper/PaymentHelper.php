<?php
namespace App\Helper;

use App\Helper\SellixHelper;

class PaymentHelper
{
    public function __construct(SellixHelper $sellixH)
    {
        $this->sellixH = $sellixH;

        $this->defaultPrice = 2.5;
    }

    public function checkData($data)
    {
        if(empty($data['nickname']) OR !isset($data['nickname'])){
            return[
                'error'     => true,
                'message'   => 'Nie wprowadzono nicku'
            ];
        }
        if(empty($data['email']) OR !isset($data['email']) OR !filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            return[
                'error'     => true,
                'message'   => 'Wprowadzono nieprawidłowy adres email'
            ];            
        }
        if(empty($data['slider']) OR !isset($data['slider']) OR !is_numeric($data['slider'])){
            return[
                'error'     => true,
                'message'   => 'Nie wybrano ilości'
            ];             
        }
        if(empty($data['productid']) OR !isset($data['productid'])){
            return[
                'error'     => true,
                'message'   => 'Coś poszło nie tak, spróbuj ponownie'
            ];  
        }

        $product = $this->sellixH->getProduct($data['productid']);
        $price   = $product['data']['product']['price_display'] * $data['slider'];

        if($product['status'] != 200 ){
            return[
                'error'     => true,
                'message'   => 'Coś poszło nie tak, spróbuj ponownie'
            ];  
        }
        if($price < $this->defaultPrice){
            return[
                'error'     => true,
                'message'   => 'Za niska kwota, musisz kupić itemy za conajmniej 2,5zł'
            ];             
        }

        return[
            'error'     => false,
            'message'   => 'wszystko ok'
        ];
    }

    public function createPayment($data)
    {
        $info = $this->sellixH->createPayment($data);

        if($info['status'] == 200){
            return[
                'invoice'   => $info['data']['invoice']['uniqid'],
                'error'     => false,
            ];
        }else{
            return[
                'invoice'   => false,
                'error'     => true,
                'message'   => 'Coś poszło nie tak, spróbuj ponownie'
            ];
        }
    }    
}