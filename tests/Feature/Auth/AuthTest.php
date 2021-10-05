<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Http\Response;
use Tests\TestCase;
use Lang;

class AuthTest extends TestCase
{
    protected $baseUrl;
    private $user;
    public const TEST_PASSWORD = 'tesEt04112#';

    public function setUp(): void
    {
        parent::setUp();
        $this->baseUrl = '/api';
        $this->createUser();
    }

    private function createUser(): void
    {
        $this->user = User::factory()->create([
            'password' => bcrypt(self::TEST_PASSWORD),
        ]);
    }

    public function testUserCanRegister(): void
    {
        $url = $this->baseUrl . "/register";
        $response = $this->post($url, ['first_name' => 'tester', 'last_name' => 'tester', 'email' => 'test3@test.com', 'password' => 'Test04##$']);
        $response->assertStatus(Response::HTTP_CREATED)->assertJson([
            'success' => true,
            'message' => Lang::get('auth.success'),
            'data' => [
                'type' => 'bearer',
            ]
        ]);
    }

    public function testUserCanLogin(): void
    {
        $url = $this->baseUrl . "/login";
        $response = $this->post($url, [
            'email' => $this->user->email,
            'password' => self::TEST_PASSWORD
        ]);
        $response->assertStatus(Response::HTTP_ACCEPTED)->assertJson([
            'success' => true,
            'message' => Lang::get('auth.success'),
            'data' => [
                'type' => 'bearer',
            ]
        ]);
    }

      /**
     * Test to validate registration form errors.
     *
     * @return void
     */
    public function testToValidateRegistrationInputErrors(): void
    {
        $url = $this->baseUrl . "/register";
        $response = $this->post($url, [], ['Accept' => 'Application/json']);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)->assertJson([
            'message' => 'invalid credentials',
            'errors' => [
                'first_name' => [
                    'The first name field is required.'
                ],
                'last_name' => [
                    'The last name field is required.'
                ],
                'email' => [
                    'The email field is required.'
                ],
                'password' => [
                    'The password field is required.'
                ]
            ]
        ]);
    }

    /**
     * Test to validate password field.
     *
     * @return void
     */
    public function testToValidatePasswordField(): void
    {
        $url = $this->baseUrl . "/register";
        $response = $this->post(
            $url,
            ['first_name' => 'testing', 'last_name' => 'testing', 'email' => 'test22@test.com', 'password' => 'PsZ1#'],
            ['Accept' => 'Application/json']
        );
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)->assertJson([
            'message' => 'invalid credentials',
            'errors' => [
                'password' => [
                    'The password must be at least 6 characters.'
                ]
            ]
        ]);
    }

    /**
     * Test to validate password field.
     *
     * @return void
     */
    public function testToValidatePasswordMustHaveSymbolField(): void
    {
        $url = $this->baseUrl . "/register";
        $response = $this->post(
            $url,
            ['first_name' => 'testing', 'last_name' => 'testing', 'email' => 'test22@test.com', 'password' => 'PsZ1ss'],
            ['Accept' => 'Application/json']
        );
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)->assertJson([
            'message' => 'invalid credentials',
            'errors' => [
                'password' => [
                    'The password must contain at least one symbol.'
                ]
            ]
        ]);
    }

     /**
     * Test to login validation.
     *
     * @return void
     */
    public function testLoginValidationErrors(): void
    {
        $url = $this->baseUrl . "/login";
        $response = $this->post($url, ['email' => '', 'password' => ''], ['Accept' => 'Application/json']);
        $response->assertStatus(422)->assertJson([
            'success' => false,
            'message' => 'invalid credentials',
            'errors' => [
                'email' => [
                    'The email field is required.'
                ],
                'password' => [
                    'The password field is required.'
                ]
            ]
        ]);
    }
}
