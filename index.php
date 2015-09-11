<?php
require __DIR__ . '/vendor/autoload.php';

$bot = new Bot\Crawler();
$bot->setHttpClient(new \Bot\Http\GuzzleAdapter());
$bot->setAdapter(new \Bot\Adapters\Json());
$bot->setUrl("http://example.com/:beer.json");
$bot->crawl();

//echo $bot->getHttpClient()->getStatusCode();


print_r($bot->getParsedData());
