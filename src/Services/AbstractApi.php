<?php

namespace LHP\Services;

use GuzzleHttp\Client;

class AbstractApi
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
     * @param array $params
     *
     * @return mixed
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
     */
    public function put(string $endpoint, $payload = [])
    {
        return $this->call('PUT', $endpoint, [], $payload);
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array $params
     *
     * @return mixed
     */
    private function call(string $method = 'GET', string $endpoint, $params = [], $payload = [])
    {
        $includePayload = ! empty($payload) ? ['form_params' => $payload] : [];

        return json_decode(
            $this->client->request(
                $method,
                $endpoint,
                [
                    'query'         => $params,
                    'form_params'   => $payload,
                    'headers' => [
                        'Accept'              => 'application/json',
                        'Content-Type'        => 'application/json',
                    ],
                ] + $includePayload
            )
                ->getBody()
        );
    }
}
