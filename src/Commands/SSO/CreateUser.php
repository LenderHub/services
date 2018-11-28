<?php

namespace LHP\Services\Commands\SSO;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\SSO\UserCreated;

class CreateUser extends ServiceCommand
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var null|string
     */
    private $password;

    /**
     * @var array
     */
    private $data;

    /**
     * CreateAdminUser constructor.
     *
     * @param string      $email
     * @param null|string $password
     * @param array       ...$data
     */
    public function __construct(string $email, ?string $password = null, ...$data)
    {
        $this->email    = $email;
        $this->password = $password;
        $this->data     = $data;
    }

    /**
     * The event class the command expects to receive on successful execution
     *
     * @return string
     */
    public function expects(): string
    {
        return UserCreated::class;
    }

    /**
     * The payload of the command
     *
     * @return array
     */
    public function payload(): array
    {
        return [
            'email'    => $this->email,
            'password' => $this->password,
        ] + $this->data;
    }
}
