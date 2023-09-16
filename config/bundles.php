<?php
use Acme\FooBundle\AcmeFooBundle;
return [
    Pimcore\Bundle\TinymceBundle\PimcoreTinymceBundle::class => ['all' => true],
    Pimcore\Bundle\SimpleBackendSearchBundle\PimcoreSimpleBackendSearchBundle::class => ['all' => true],
    Pimcore\Bundle\BundleGeneratorBundle\PimcoreBundleGeneratorBundle::class => ['all' => true],
    AcmeFooBundle::class=>['all',true],
];
