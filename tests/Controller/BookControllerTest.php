<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BookControllerTest extends WebTestCase
{
    public function testPublicBookListPageIsSuccessful()
    {
        $client = static::createClient();
        $client->request('GET', '/book');
        $this->assertResponseStatusCodeSame(200);
    }
}
