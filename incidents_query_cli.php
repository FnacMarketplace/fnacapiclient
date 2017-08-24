<?php
require_once __DIR__.'/autoload.php';

use FnacApiClient\Client\SimpleClient;

use FnacApiClient\Service\Request\IncidentQuery;

use FnacApiClient\Entity\Incident;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$myClient = new SimpleClient();
$myClient->init(__DIR__.'/config/config.yml');

$logger = new Logger('api_log');
$logger->pushHandler(new StreamHandler('php://stdout', Logger::INFO));

$myClient->setLogger($logger);

$incidentsQuery = new IncidentQuery();
//We get the first page
$incidentsQuery->setPaging(1);
//With 10 results per page
$incidentsQuery->setResultsCount(10);


try {
    $incidentsQueryResponse = $myClient->callService($incidentsQuery);
} catch (Exception $ex) {
    echo $ex->getMessage();
}

var_dump($incidentsQueryResponse);
