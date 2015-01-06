<?php

namespace Acme\ReqBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @author Andrea Fiori
 * @since  22 October 2014
 */
class QuizControllerTest extends WebTestCase
{
    private $client;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->client = static::createClient();
    }
    
    protected function tearDown()
    {
        parent::tearDown();
        
        unset($this->client);
    }

        public function testIndex()
    {
        $crawler = $this->client->request('GET', '/');

        $this->assertTrue($crawler->filter('html:contains("Quiz")')->count() > 0);
    }

    public function testQuizRoute()
    {
        $crawler = $this->client->request('GET', '/quiz/');

        $this->assertTrue($crawler->filter('html:contains("questions available")')->count() > 0);
    }
}
