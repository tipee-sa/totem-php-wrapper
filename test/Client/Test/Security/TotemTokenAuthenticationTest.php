<?php
namespace Client\Test\Security;

use Client\Security\Authentication\TotemTokenAuthentication;
use Client\Test\TestCase;

/**
 * Class TotemTokenAuthenticationTest
 */
class TotemTokenAuthenticationTest extends TestCase
{
    /**
     * @test
     */
    public function getHeaders_Success()
    {
        $totemTokenAuthentication = new TotemTokenAuthentication("Authorization XXXX");

        $this->assertEquals($totemTokenAuthentication->getHeaders(), ['Authorization' => 'Authorization XXXX']);
    }
}