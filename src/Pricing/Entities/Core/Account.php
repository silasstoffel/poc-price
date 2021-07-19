<?php

namespace Pricing\Entities\Core;

class Account
{
    private string $googleId;
    private string $login;
    private string $name;

    /**
     * @param string $googleId Google ID
     * @param string $login Login
     * @param string $name name
     */
    public function __construct(string $googleId, string $login, string $name)
    {
        $this->googleId = $googleId;
        $this->login = $login;
        $this->name = $name;
    }


}
