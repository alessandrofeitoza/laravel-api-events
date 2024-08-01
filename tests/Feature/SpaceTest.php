<?php

namespace Tests\Feature;

use App\Models\Space;
use App\Models\User;
use App\Repository\SpaceRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class SpaceTest extends TestCase
{
    use RefreshDatabase;

    private SpaceRepository $repository;

    public function __construct(string $name)
    {
        $this->repository = new SpaceRepository();
        parent::__construct($name);
    }

    public function test_the_get_space_returns_a_successful_response(): void
    {
        $response = $this->get('/api/spaces');

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_the_post_space_returns_a_successful_response(): void
    {
        $response = $this->post('/api/spaces', [
            "name" => "Escola",
            "address" => "Rua Vicente Leite, 2020",
            "description" => "Escolas de Habilidades"
        ]);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function test_the_patch_space_returns_a_successful_response(): void
    {
        $space = new Space();
        $space->name = "Escola";
        $space->address = "teste@teste.com";
        $space->description = "Rua Vicente Leite, 2020";

        $this->repository->save($space);

        $response = $this->patch("/api/spaces/" . $space->id, [
            "name" => "Test",
            "email" => "Rua Vicente Leite, 2020",
            "password" => "Escolas de Habilidades"
        ]);

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_the_delete_space_returns_a_successful_response(): void
    {
        $space = new Space();
        $space->name = "Escola";
        $space->address = "teste@teste.com";
        $space->description = "Rua Vicente Leite, 2020";

        $this->repository->save($space);

        $response = $this->delete("/api/spaces/" . $space->id);

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }
}
