<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testAllProducts()
    {
        $response = $this->getJson('http://products.api/api/products/all?page=2');
        $response->assertStatus(200);
    }

    public function testShowProduct()
    {
        $response = $this->getJson('http://products.api/api/products/show/2');
        $response->assertStatus(200);

    }

    public function testCreate()
    {
        Storage::fake('local');
        $file = UploadedFile::fake()->create('product.jpg');
        $response = $this->postJson('http://products.api/api/products/create', ['name' => 'name', 'price' => '1000', 'image' => $file]);
        $response->assertStatus(201);
    }

    public function testRemove()
    {
        $response = $this->getJson('http://products.api/api/products/remove/5');
        $response->assertStatus(204);
    }

    public function testUploadImage()
    {
        Storage::fake('local');
        $file = UploadedFile::fake()->create('product.jpg');
        $response = $this->json('POST', 'http://products.api/api/products/upload-image/5', [
            'image' => $file,
        ]);
        $response->assertStatus(201);
    }

    public function testGetMassive()
    {
        $response = $this->getJson('http://products.api/api/products/get-array/25');
        $response->assertStatus(200);
    }
}
