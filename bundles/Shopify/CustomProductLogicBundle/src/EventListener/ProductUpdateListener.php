<?php 

namespace Shopify\CustomProductLogicBundle\EventListener;

use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject\Product;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Shopify\Clients\Rest;


class ProductUpdateListener
{

    private $httpClient;

    public function __construct(HttpClientInterface $httpClient) {
        $this->httpClient = $httpClient;
    }
    public function onProductPostUpdate(DataObjectEvent $event)
    {
        dd($event);
        //$client = new Rest(,);
        //$response = $client->get(path: 'products');
        $product = $event->getElement();
        dd($product);
        $this->httpClient->request('POST','',);
        if ($product instanceof Product) {
            // Your custom logic here
            // This method will be called after a Product is updated.
        }
    }
    public function onObjectPostUpdate (DataObjectEvent $e) 
    {
        $product = $e->getObject();
    
        if ($product instanceof Product) {

            $product->getPrice();
            $product->getTypee();
            $product->getName();

        }
    }
}