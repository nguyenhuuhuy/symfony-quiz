<?php

namespace Acme\ReqBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InterviewControllerTest extends WebTestCase
{
    private $client;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->client = $client = static::createClient();
    }
    
    public function testIndex()
    {
        $crawler = $this->client->request('GET', '/interview/');

        $this->assertTrue($crawler->filter('html:contains("interview")')->count() > 0);
    }
    
    public function testInterviewTopic()
    {
        $crawler = $this->client->request('GET', '/interview/topic/php');

        $this->assertTrue($crawler->filter('html:contains("interview")')->count() > 0);
    }
    
    public function testInterviewTopicTags()
    {
        $crawler = $this->client->request('GET', '/interview/topics/php/array');
        
        $this->assertTrue($crawler->filter('html:contains("interview")')->count() > 0);
    }
}