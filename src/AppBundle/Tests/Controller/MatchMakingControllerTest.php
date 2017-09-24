<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MatchMakingControllerTest extends WebTestCase
{
    public function testWait()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/wait');
    }

}
