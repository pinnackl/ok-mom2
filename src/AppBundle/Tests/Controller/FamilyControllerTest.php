<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FamilyControllerTest extends WebTestCase
{
    public function testFamily()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/family');
    }

    public function testCreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/family/create');
    }

    public function testInvite()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/family/invite');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/family/edit');
    }

}
