<?php

namespace App\Repository;

use App\Http\Resources\NoteResource;
use App\Models\Note;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class Notes
{
    public const CACHE_KEY = 'notes';

    /**
     * @param int $userId
     * @return mixed
     */
    public static function index(int $userId)
    {
        $key = 'index';
        $userCacheKey = self::CACHE_KEY . "_" . $userId;
        $userNotes = Note::query()->whereUserId($userId)->get();
        try {
            return Cache::tags($userCacheKey)
                ->remember(
                    $key,
                    Carbon::now()->addMinutes(30),
                    static function () use ($userNotes) {
                        return NoteResource::collection($userNotes);
                    }
                )
            ;
        } catch (\Exception $e) {
            return NoteResource::collection($userNotes);
        }
    }

    public static function clearCache(int $userId): void
    {
        $userCacheKey = self::CACHE_KEY . "_" . $userId;
        Cache::tags($userCacheKey)->flush();
    }
}
