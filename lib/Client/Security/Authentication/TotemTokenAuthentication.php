<?php
namespace Client\Security\Authentication;

/**
 * Class TotemTokenAuthentication
 * @package Client\Security\Authentication
 */
class TotemTokenAuthentication implements AuthenticationInterface
{

    /**
     * @var array
     */
    private $headers;

    /**
     * TotemTokenAuthentication constructor.
     *
     * @param $authorizationHeader
     */
    public function __construct($authorizationHeader)
    {
        if (empty($authorizationHeader)) {
            throw new \InvalidArgumentException("The authorization header cannot be empty");
        }

        $this->headers = [
          'Authorization' => $authorizationHeader
        ];
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }
}