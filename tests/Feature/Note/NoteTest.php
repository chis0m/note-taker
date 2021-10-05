<?php

namespace Tests\Feature\Note;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Response;
use Lang;
use Tests\TestCase;

class NoteTest extends TestCase
{
    protected $baseUrl;
    private $user;
    private $notes;
    public const TEST_PASSWORD = 'tesEt04112#';

    public function setUp(): void
    {
        parent::setUp();
        $this->baseUrl = '/api';
        $this->createUser();
        $this->createNotes();
    }

    private function createUser(): void
    {
        $this->user = User::factory()->create([
            'password' => bcrypt(self::TEST_PASSWORD),
        ]);
    }

    private function createNotes(): void
    {
        $this->notes = Note::factory()->count(2)->create(['user_id' => $this->user->id]);
    }

    public function testFetchANote(): void
    {
        $noteId = $this->notes[0]->id;
        $this->actingAs($this->user);
        $url = $this->baseUrl . "/notes/{$noteId}";
        $response = $this->get($url, ['Accept' => 'Application/json']);
        $response->assertStatus(Response::HTTP_OK)->assertJson([
            'success' => true,
            'message' => Lang::get('general.fetch'),
        ]);
    }

    public function testNoteStorage(): void
    {
        $note = Note::factory()->make()->toArray();
        $this->actingAs($this->user);
        $url = $this->baseUrl . "/notes";
        $response = $this->post($url, $note, ['Accept' => 'Application/json']);
        $response->assertStatus(Response::HTTP_OK)->assertJson([
            'success' => true,
            'message' => Lang::get('general.store'),
        ]);
    }

    public function testNoteUpdate(): void
    {
        $noteId = $this->notes[0]->id;
        $updatedNote = $this->notes->toArray()[0];
        $updatedNote['title'] = 'Updated Note';
        $updatedNote['slug'] = 'updated-note';
        $this->actingAs($this->user);
        $url = $this->baseUrl . "/notes/{$noteId}?_method=PUT";
        $response = $this->post($url, $updatedNote, ['Accept' => 'Application/json']);
        $response->assertStatus(Response::HTTP_OK)->assertJson([
            'success' => true,
            'message' => Lang::get('general.update'),
        ]);
    }


    public function testDeleteANote(): void
    {
        $noteId = $this->notes[0]->id;
        $this->actingAs($this->user);
        $url = $this->baseUrl . "/notes/{$noteId}";
        $response = $this->delete($url);
        $response->assertStatus(Response::HTTP_OK)->assertJson([
            'success' => true,
            'message' => Lang::get('general.delete'),
        ]);
    }

}
