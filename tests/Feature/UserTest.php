<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testItCreatesFormInDatabaseWithAdminAuthentication()
    {
        // Given (Arrange)
        $email = 'admin@admin.nl';
        $password = "Admin12345";
        Auth::attempt(['email' => $email, 'password' => $password]);

        $route = route('forms.store');
        $requestBody = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'purpose' => 'YOLO',
            'year_of_birth' => '01-12-1991',
            'contact_email' => 'John@Doe.com',
        ];
        // When (Act)
        $response = $this->post($route, $requestBody);
        // Then (Assert)
        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    public function testItCreatesFormInDatabaseWithoutAdminAuthentication()
    {
        // Given (Arrange)
        $route = route('forms.store');
        $requestBody = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'purpose' => 'YOLO',
            'year_of_birth' => '01-12-1991',
            'contact_email' => 'John@Doe.com',
        ];
        // When (Act)
        $response = $this->post($route, $requestBody);
        // Then (Assert)
        $response->assertStatus(403);
        $response->assertSessionHasNoErrors();
    }

    public function testItLogsInAsAnAdminAndHaveAccessToEditABlog()
    {
        // Given (Arrange)
        $email = 'admin@admin.nl';
        $password = "Admin12345";
        Auth::attempt(['email' => $email, 'password' => $password]);
        $route = route('forms.edit',1);
        // When (Act)
        $response = $this->get($route);
        // Then (Assert)
        $response->assertStatus(200);
        $response->assertSessionHasNoErrors();
    }

    public function testItLogsInAsNotAnAdminAndDoesNotHaveAccessToEditABlog()
    {
        // Given (Arrange)
        $route = route('forms.edit',1);
        // When (Act)
        $response = $this->get($route);
        // Then (Assert)
        $response->assertStatus(403);
        $response->assertSessionHasNoErrors();
    }
}
