<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class MainControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();

        $client->enableProfiler();

        $client->request('GET', '');

        $profile = $client->getProfile();

        $queries = $profile->getCollector('db')->getQueries();

        foreach ($queries['default'] as $index => $queryData) {
            dump('QUERY: '.$index.' => '.$queryData['sql']);
        }

        $this->assertEquals(2, $profile->getCollector('db')->getQueryCount());
        $this->assertEquals('SELECT t0.ID AS ID_1, t0.NAME AS NAME_2, t0.VALUE AS VALUE_3 FROM resource_file t0 WHERE t0.ID = ?', $queries['default'][1]['sql']);

        $this->assertResponseIsSuccessful(sprintf('The %s public URL loads correctly.', ''));
    }
}
