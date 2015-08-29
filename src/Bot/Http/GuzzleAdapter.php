<?php namespace Bot\Http;

use \GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;


class GuzzleAdapter implements HttpClient
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var Response
     */
    private $response;

    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->client = new Client($config);
    }

    /**
     * @param string $uri
     * @param array $options
     * @return Response|ResponseInterface
     */
    public function get(string $uri, array $options = [])
    {
        $this->response = $this->client->get($uri, $options);
        return $this->response;
    }

    /**
     * @return int
     */
    public function getStatusCode() : int
    {
        return $this->getResponse()->getStatusCode();
    }

    /**
     * @return Response
     */
    public function getResponse() : Response
    {
        return $this->response;
    }

    /**
     * @return string
     */
    public function getBody() : string
    {
        return $this->getResponse()->getBody();
    }
}