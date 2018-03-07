<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__.'/vendor/symfony/class-loader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();

$loader->registerNamespaces(array(
    'Zend\Http\Exception' =>__DIR__.'/vendor/zendframework/zend-http/src/Exception',
    'Zend\Http\Client\Adapter\Exception' => __DIR__.'/vendor/zendframework/zend-http/src/Client/Adapter/Exception',
    'Zend\Http\Client\Adapter' => __DIR__.'/vendor/zendframework/zend-http/src/Client/Adapter',
    'Zend\Http\Client\Exception' => __DIR__.'/vendor/zendframework/zend-http/src/Client/Exception',
    'Zend\Http\Header' => __DIR__.'/vendor/zendframework/zend-http/src/Header',
    'Zend\Http' => __DIR__.'/vendor/zendframework/zend-http/src',
    'Zend\I18n\Translator' => __DIR__.'/vendor/zendframework/zend-i18n/src/Translator',
    'Zend\Stdlib' => __DIR__.'/vendor/zendframework/zend-stdlib/src',
    'Zend\Uri' => __DIR__.'/vendor/zendframework/zend-uri/src',
    'Zend\Validator' => __DIR__.'/vendor/zendframework/zend-validator/src',
    'Zend\Escaper' => __DIR__.'/vendor/zendframework/zend-escaper/src',
    'Zend\Loader' => __DIR__.'/vendor/zendframework/zend-loader/src',
    'Monolog' => __DIR__.'/vendor/monolog/monolog/src',
    'Psr\Log' => __DIR__.'/vendor/psr/log',
    'Symfony\Component\Serializer\Normalizer' => __DIR__.'/vendor/symfony/serializer/normalizer',
    'Symfony\Component\Serializer\Encoder' => __DIR__.'/vendor/symfony/serializer/encoder',
    'Symfony\Component\Serializer' => __DIR__.'/vendor/symfony/serializer',
    'Symfony\Component\Yaml' => __DIR__.'/vendor/symfony/yaml',
    'Symfony\Component\HttpFoundation' => __DIR__.'/vendor/symfony/http-foundation',
    'FnacApiGui' => __DIR__.'/src/FnacApiGui/src',
    'FnacApiClient' => __DIR__.'/src',
));

$loader->register();
