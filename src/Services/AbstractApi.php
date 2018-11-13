<?php

namespace LHP\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;
use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Contracts\SendsCommands;

class AbstractApi implements SendsCommands
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * SSO constructor.
     *
     * @param \GuzzleHttp\Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $endpoint
     * @param array  $params
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $endpoint, $params = [])
    {
        return $this->call('GET', $endpoint, $params);
    }

    /**
     * @param string $endpoint
     * @param array  $payload
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post(string $endpoint, $payload = [])
    {
        return $this->call('POST', $endpoint, [], $payload);
    }

    /**
     * @param string $endpoint
     * @param array  $payload
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(string $endpoint, $payload = [])
    {
        return $this->call('DELETE', $endpoint, [], $payload);
    }

    /**
     * @param string $endpoint
     * @param array  $payload
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function put(string $endpoint, $payload = [])
    {
        return $this->call('PUT', $endpoint, [], $payload);
    }

    /**
     * @param \LHP\Services\Commands\ServiceCommand $command
     *
     * @return mixed
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendCommand(ServiceCommand $command)
    {
        return $this->post('commands', $command->toArray());
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array  $params
     * @param array  $payload
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function call(string $method, string $endpoint, $params = [], $payload = [])
    {
        try {
            $response = $this->client->request(
                $method,
                $endpoint,
                [
                    'query'   => $params,
                    'json'    => $payload,
                    'headers' => [
                        'Accept'       => 'application/json',
                        'Content-Type' => 'application/json',
                    ],
                ]
            );
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            Log::error(get_class($this) . 'error: ' . $e->getMessage());
            throw $e;
        }
    }
}
