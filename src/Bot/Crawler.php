<?php namespace Bot;

use Bot\Adapters\Adaptable;
use Bot\Exceptions\InvalidHttpClientException;
use Bot\Http\HttpClient;

class Crawler
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var Adaptable
     */
    private $adapter;

    /**
     * @var HttpClient
     */
    private $httpClient;

    private $response;

    private $data;

    public function setUrl(\string $url)
    {
        $this->url = $url;
    }

    public function setAdapter(Adaptable $adapter)
    {
        $this->adapter = $adapter;
    }

    public function setHttpClient(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getHttpClient() : HttpClient
    {
        if ($this->httpClient) {
            return $this->httpClient;
        }
        throw new InvalidHttpClientException("In order to use an HTTP client, you must set one!");
    }

    public function crawl()
    {
        $this->getHttpClient()->get($this->url);

        if ($this->adapter) {
            $this->data = $this->adapter->parse($this->getBody());
        }
    }

    public function getData()
    {
        return $this->data;
    }

    public function getResponse()
    {
        return $this->getHttpClient()->getResponse();
    }

    public function getBody()
    {
        return $this->getHttpClient()->getBody();
    }

    public function getStatusCode()
    {
        return $this->getHttpClient()->getStatusCode();
    }
}
