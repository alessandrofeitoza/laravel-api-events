<?php

namespace Tests\Feature;

use App\Models\User;
use App\Repository\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    private UserRepository $repository;

    public function __construct(string $name)
    {
        $this->repository = new UserRepository();
        parent::__construct($name);
    }

    public function test_the_get_user_returns_a_successful_response(): void
    {
        $response = $this->get('/api/users');

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_the_post_user_returns_a_successful_response(): void
    {
        $response = $this->post('/api/users', [
            "name" => "Test",
            "email" => "test@test.com",
            "password" => "123456"
        ]);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function test_the_patch_user_returns_a_successful_response(): void
    {

        $item = new User();
        $item->name = "Teste before put";
        $item->email = "teste@teste.com";
        $item->password = "123456";

        $this->repository->save($item);

        $response = $this->patch("/api/users/" . $item->id, [
            "name" => "Test",
            "email" => "test@test.com",
            "password" => "123456"
        ]);

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_the_delete_user_returns_a_successful_response(): void
    {

        $item = new User();
        $item->name = "Teste before put";
        $item->email = "teste@teste.com";
        $item->password = "123456";

        $this->repository->save($item);

        $response = $this->delete("/api/users/" . $item->id);

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }
}
