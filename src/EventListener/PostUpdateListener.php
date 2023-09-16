<?php

namespace App\EventListener;
  
use Pimcore\Event\Model\ElementEventInterface;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Event\Model\AssetEvent;
use Pimcore\Event\Model\DocumentEvent;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface;
class PostUpdateListener
{
private $ACCESS_TOKEN;
private $URL_API;
private HttpClientInterface $httpClient;
public function __construct(string $ACCESS_TOKEN,HttpClientInterface $httpClient,string $URL_API) {
    $this->ACCESS_TOKEN = $ACCESS_TOKEN;
    $this->httpClient = $httpClient;
    $this->URL_API = $URL_API;
}    
    public function onPostUpdate(ElementEventInterface $e): void
    {
        if ($e instanceof AssetEvent) {
            // do something with the asset
            $foo = $e->getAsset(); 
        } else if ($e instanceof DocumentEvent) {
            // do something with the document
            $foo = $e->getDocument(); 
        } else if ($e instanceof DataObjectEvent) {
            // do something with the object
            $foo = $e->getElement(); 


            try {
                $this->httpClient->request('POST',$this->URL_API,[
                    'headers'=>[
                        'Content-Type'=>'application/json',
                        'X-Shopify-Access-Token'=>$this->ACCESS_TOKEN,
                    ],
                    'json'=>[
                        'product'=>[
                            'title'=>$foo->getName(),
                            'product_type'=>$foo->getTypee(),
                            'variant'=>[
                                'price'=>$foo->getPrice(),
                            ]
                        ]
                    ]
                    ]);
            } catch (HttpExceptionInterface $exception) {
                throw $exception;
            }

        }
    }
}