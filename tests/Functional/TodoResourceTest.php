<?php

namespace App\Tests\Functional;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use Hautelook\AliceBundle\PhpUnit\ReloadDatabaseTrait;

class TodoResourceTest extends ApiTestCase
{
    use ReloadDatabaseTrait;

    public function testEmptyTodoItemThrowsError()
    {
        $client = self::createClient();

        $client->request('POST', '/api/todos', [
            'json' => [],
        ]);

        $this->assertResponseStatusCodeSame(500);
    }

    public function testCreateTodoItem()
    {
        $client = self::createClient();

        $response = $client->request('POST', '/api/todos', [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => [
                'name' => 'Test Resource',
                'description' => 'This is the test description'
            ],
        ]);
        
        $this->assertResponseStatusCodeSame(201);

        $todoId = json_decode($response->getContent());
    }

    public function testPatchResource()
    {
        $client = self::createClient();

        $response = $client->request('POST', '/api/todos', [
            'json' => [
                'name' => 'Test Resource',
                'description' => 'This is the test description'
            ],
        ]);

        $this->assertResponseStatusCodeSame(201);
        $todoId = json_decode($response->getContent())->id;
        
        $response = $client->request('PATCH', '/api/todos/'.$todoId, [
            'headers' => ['Content-Type' => 'application/merge-patch+json'],
            'json' => [
                'name' => 'Test Resource Updated',
                'description' => 'This is the test description'
            ],
        ]);

        
        $this->assertResponseStatusCodeSame(200);
    }

    public function testUpdateResource()
    {
        $client = self::createClient();

        $response = $client->request('POST', '/api/todos', [
            'json' => [
                'name' => 'Test Resource',
                'description' => 'This is the test description'
            ],
        ]);

        $this->assertResponseStatusCodeSame(201);
        $todoId = json_decode($response->getContent())->id;
        
        $response = $client->request('PUT', '/api/todos/'.$todoId, [
            'json' => [
                'name' => 'Test Resource PUT',
                'description' => 'This is the test description'
            ],
        ]);

        
        $this->assertResponseStatusCodeSame(200);
    }
}
