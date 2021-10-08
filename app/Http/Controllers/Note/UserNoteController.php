<?php

namespace App\Http\Controllers\Note;

use App\Exceptions\ApplicationException;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoteRequest;
use App\Models\Note;
use App\Repository\Notes;
use Illuminate\Http\JsonResponse;
use Lang;

class UserNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $userId = request()->user()->id;
        $notes = Notes::index($userId);
        return $this->success($notes, Lang::get('general.fetch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NoteRequest $request
     * @return JsonResponse
     */
    public function store(NoteRequest $request): JsonResponse
    {
        logger($request->toArray());
        $user = $request->user();
        $reference = $request['reference'] ?? generateReference();
        $content = $request->only(['title', 'slug', 'description', 'tags', 'read_minute']);
        $note = $user->notes()->updateOrCreate(['reference' => $reference], $content);
        Notes::clearCache($user->id);
        return $this->success($note, Lang::get('general.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param Note $note
     * @return JsonResponse
     */
    public function show(Note $note): JsonResponse
    {
        return $this->success($note, Lang::get('general.fetch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NoteRequest $request
     * @param Note $note
     * @return JsonResponse
     */
    public function update(NoteRequest $request, Note $note): JsonResponse
    {
        $content = $request->only(['title', 'slug', 'description', 'tags', 'read_minute']);
        $note->update($content);
        Notes::clearCache($request->user()->id);
        return $this->success($note, Lang::get('general.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Note $note
     * @return JsonResponse
     */
    public function destroy(Note $note): JsonResponse
    {
        $note->delete();
        Notes::clearCache(request()->user()->id);
        return $this->success($note, Lang::get('general.delete'));
    }
}
