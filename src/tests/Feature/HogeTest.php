<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HogeTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        $this->login();
    }


    /**
     *
     *
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        Storage::fake('public');

        $response = $this->json('POST', '/api/v1/upload', [
            'file' => UploadedFile::fake()->image('docker.png')
        ]);

        print_r($response->json());

        $response->assertStatus(200);



        // ファイルが保存されたことをアサート
//        Storage::disk('public')->assertExists('upload.jpg');

        // ファイルが存在しないことをアサート
//        Storage::disk('public')->assertMissing('docker.png');
    }

    private $accessToken;
    public function login()
    {
        $email = 'taichi@asaichi.co.jp';
        $password = 'hogehoge';

        $user = factory(User::class)->create([
            'email' => $email,
            'password' => bcrypt($password),
            'name' => 'taichi',
        ]);

        $response = $this->json('POST', '/api/v1/auth/login', [
            'email' => $email,
            'password' => $password,
        ]);

        $this->actingAs($user);

//        $response->assertStatus(200);

//        $this->accessToken = json_decode($response->getContent(), true)['access_token'];
    }


    /**
     * @test
     */
//    public function てすと()
//    {
//        $response = $this->post('/api/v1/auth/login');
//
//        $response->assertStatus(401);
//    }


}

