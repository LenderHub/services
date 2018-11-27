<?php

namespace LHP\Services;

use GuzzleHttp\Exception\RequestException;
use LHP\Services\Exceptions\SSO\MissingConsumerIdentityException;

class SSO extends AbstractApi
{
    /**
     * @param array $params
     *
     * @return mixed
     */
    public function getLoanOfficers(array $params = [])
    {
        return $this->get("loan-officers", $params);
    }

    /**
     * @param array $data
     *
     * @return mixed|null
     */
    public function getOrCreateConsumer(array $data)
    {
        try {
            return $this->getConsumer($data);
        } catch (RequestException $e) {
            // create new consumer
            if ($e->getCode() === 404) {
                return $this->addConsumer($data);
            }

            throw $e;
        }
    }

    /**
     * @param array $data
     *
     * @return mixed
     * @throws \LHP\Services\Exceptions\SSO\MissingConsumerIdentityException
     */
    public function getConsumer(array $data)
    {
        $url = 'consumer';
        $query = [];

        if (!empty($data['id'])) {
            $url .= '/' . $data['id'];
        } else if (!empty($data['email'])) {
            $query['email'] = $data['email'];
        } else {
            throw new MissingConsumerIdentityException('Consumer ID or email required');
        }

        return $this->get($url, $query);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function addConsumer(array $data)
    {
        return $this->post('consumer', $data);
    }
}
