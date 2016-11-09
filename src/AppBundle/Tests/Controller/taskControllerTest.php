<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class taskControllerTest extends WebTestCase
{
    public function testTasks()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/tasks');
    }

    public function testTaskdetail()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/task/{taskId}');
    }

    public function testTaskedit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/task/edit/{taskId}');
    }

    public function testTaskdelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/task/delete/{taskId}');
    }

}
