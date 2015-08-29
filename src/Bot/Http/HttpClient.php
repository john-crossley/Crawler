<?php namespace Bot\Http;

interface HttpClient
{
    public function get(\string $url, array $options = []);
    public function getResponse();
    public function getStatusCode() : int;
    public function getBody() : string;
}