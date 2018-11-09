<?php

namespace LHP\Services;

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
}
