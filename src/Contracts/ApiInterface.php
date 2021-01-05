<?php

namespace LHP\Services\Contracts;

interface ApiInterface
{
    /**
     * @param string $endpoint
     * @param array  $params
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $endpoint, $params = []);

    /**
     * @param string $endpoint
     * @param array  $payload
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post(string $endpoint, $payload = []);

    /**
     * @param string $endpoint
     * @param array  $payload
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(string $endpoint, $payload = []);

    /**
     * @param string $endpoint
     * @param array  $payload
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function put(string $endpoint, $payload = []);
}
