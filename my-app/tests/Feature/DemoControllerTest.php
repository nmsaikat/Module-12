<?php

use App\Http\Controllers\DemoController;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

test('demo3 function correctly processes JSON body requests', function () {
    $jsonData = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'age' => 30
    ];

    $response = $this->postJson('/demo3', $jsonData);

    $response->assertStatus(200)
        ->assertJson($jsonData);
});

test('demo3 function handles empty JSON body', function () {
    $response = $this->postJson('/demo3', []);

    $response->assertStatus(200)
        ->assertJson([]);
});

test('demo3 function handles nested JSON objects', function () {
    $jsonData = [
        'user' => [
            'name' => 'Jane Doe',
            'address' => [
                'city' => 'New York',
                'country' => 'USA'
            ]
        ]
    ];

    $response = $this->postJson('/demo3', $jsonData);

    $response->assertStatus(200)
        ->assertJson($jsonData);
});

test('demo4 function correctly retrieves request headers', function () {
    $response = $this->withHeaders([
        'X-Custom-Header' => 'test-value',
        'Accept' => 'application/json',
        'User-Agent' => 'Test Agent'
    ])->get('/demo4');

    $response->assertStatus(200);
    
    $headers = $response->json();
    
    expect($headers)->toBeArray()
        ->and($headers)->toHaveKey('x-custom-header')
        ->and($headers['x-custom-header'][0])->toBe('test-value')
        ->and($headers)->toHaveKey('accept')
        ->and($headers)->toHaveKey('user-agent');
});

test('demo4 function returns all headers', function () {
    $response = $this->get('/demo4');

    $response->assertStatus(200);
    
    $headers = $response->json();
    
    expect($headers)->toBeArray()
        ->and($headers)->not->toBeEmpty();
});

test('demo5 function correctly processes form data requests', function () {
    $formData = [
        'username' => 'testuser',
        'password' => 'secret123',
        'remember' => 'on'
    ];

    $response = $this->post('/demo5', $formData);

    $response->assertStatus(200)
        ->assertJson($formData);
});

test('demo5 function handles empty form data', function () {
    $response = $this->post('/demo5', []);

    $response->assertStatus(200)
        ->assertJson([]);
});

test('demo5 function handles form data with special characters', function () {
    $formData = [
        'name' => 'Test & User',
        'email' => 'test+user@example.com',
        'message' => 'Hello "World"!'
    ];

    $response = $this->post('/demo5', $formData);

    $response->assertStatus(200)
        ->assertJson($formData);
});

test('demo6 function correctly handles file uploads', function () {
    Storage::fake('public');

    $file = UploadedFile::fake()->image('test-image.jpg', 100, 100);

    $response = $this->post('/demo6', [
        'myindex' => $file
    ]);

    $response->assertStatus(200)
        ->assertSeeText('File Uploaded Successfully');

    // Verify file exists in the upload directory
    expect(file_exists(public_path('upload/test-image.jpg')))->toBeTrue();

    // Cleanup
    if (file_exists(public_path('upload/test-image.jpg'))) {
        unlink(public_path('upload/test-image.jpg'));
    }
});

test('demo6 function handles PDF file uploads', function () {
    Storage::fake('public');

    $file = UploadedFile::fake()->create('document.pdf', 100, 'application/pdf');

    $response = $this->post('/demo6', [
        'myindex' => $file
    ]);

    $response->assertStatus(200)
        ->assertSeeText('File Uploaded Successfully');

    // Verify file exists in the upload directory
    expect(file_exists(public_path('upload/document.pdf')))->toBeTrue();

    // Cleanup
    if (file_exists(public_path('upload/document.pdf'))) {
        unlink(public_path('upload/document.pdf'));
    }
});

test('demo6 function preserves original filename', function () {
    Storage::fake('public');

    $file = UploadedFile::fake()->image('my-custom-name.png');

    $response = $this->post('/demo6', [
        'myindex' => $file
    ]);

    $response->assertStatus(200);

    // Verify file with original name exists
    expect(file_exists(public_path('upload/my-custom-name.png')))->toBeTrue();

    // Cleanup
    if (file_exists(public_path('upload/my-custom-name.png'))) {
        unlink(public_path('upload/my-custom-name.png'));
    }
});

test('demo7 function correctly returns the client IP address', function () {
    $response = $this->post('/demo7');

    $response->assertStatus(200);
    
    $ip = $response->getContent();
    
    // The default test IP in Laravel is 127.0.0.1
    expect($ip)->toBeString()
        ->and($ip)->not->toBeEmpty();
});

test('demo7 function returns IP from X-Forwarded-For header', function () {
    $testIp = '192.168.1.100';
    
    $response = $this->withHeaders([
        'X-Forwarded-For' => $testIp
    ])->post('/demo7');

    $response->assertStatus(200);
    
    $ip = $response->getContent();
    
    expect($ip)->toBeString()
        ->and($ip)->toBe($testIp);
});

test('demo7 function handles multiple proxies in X-Forwarded-For', function () {
    $response = $this->withHeaders([
        'X-Forwarded-For' => '203.0.113.1, 198.51.100.1'
    ])->post('/demo7');

    $response->assertStatus(200);
    
    $ip = $response->getContent();
    
    // Laravel returns the first IP in the chain
    expect($ip)->toBeString()
        ->and($ip)->toBe('203.0.113.1');
});
