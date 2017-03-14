<?php

namespace Client\Security\Authentication;

/**
 * Interface AuthenticationInterface
 * @package Client\Security\Authentication
 */
interface AuthenticationInterface
{
    /**
     * @return array
     */
    public function getHeaders();
}