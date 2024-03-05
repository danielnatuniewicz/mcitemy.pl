<?php
namespace App\Helper;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SellixHelper{

    private $url;
    private $apiKey;

    public function __construct(HttpClientInterface $client, ContainerInterface $container)
    {
        $this->client = $client;
        $this->container = $container;

        $this->apiKey = $this->container->getParameter('sellix_api_key');
        $this->url = $this->container->getParameter('sellix_api_url');
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function getCategoryList()
    {
        $url  = $this->url . "/categories";


        $response = $this->client->request('GET',$url, ['headers' => ['Authorization' => 'Bearer ' . $this->apiKey],]);

        $responseJson = $response->getContent();
        $responseData = json_decode($responseJson, true);

        return $responseData;
    }

    public function getProductList($category)
    {
        $url = $this->url . "/categories/" . $category;

        $response = $this->client->request('GET',$url, ['headers' => ['Authorization' => 'Bearer ' . $this->apiKey],]);

        $responseJson = $response->getContent();
        $responseData = json_decode($responseJson, true);

        return $responseData;        
    }

    public function getProduct($product)
    {
        $url = $this->url . "/products/" . $product;

        $response = $this->client->request('GET',$url, ['headers' => ['Authorization' => 'Bearer ' . $this->apiKey],]);

        $responseJson = $response->getContent();
        $responseData = json_decode($responseJson, true);

        return $responseData;        
    }

    public function createPayment($data)
    {
        $url = $this->url . "/payments";

        $postData = json_encode(
            [
                "product_id"=> $data['productid'], 
                "white_label"=> "Integrated", 
                "email"=>$data['email'], 
                "quantity"=>$data['slider'],
                "custom_fields"=> 
                    [
                        "username"=> $data['nickname'], 
                        "additional"=> $data['additional'], 
                    ]
            ]);        

        $response = $this->client->request('POST', $url, ['headers' => ['Authorization' => 'Bearer ' . $this->apiKey],'body' => $postData]);
        $responseJson = $response->getContent();
        $responseData = json_decode($responseJson, true);

        return $responseData;   
    }
}