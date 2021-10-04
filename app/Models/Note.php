<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Note
 *
 * @property-read User $user
 * @method static Builder|Note newModelQuery()
 * @method static Builder|Note newQuery()
 * @method static \Illuminate\Database\Query\Builder|Note onlyTrashed()
 * @method static Builder|Note query()
 * @method static \Illuminate\Database\Query\Builder|Note withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Note withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $tags
 * @property int $read_minute
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static \Database\Factories\NoteFactory factory(...$parameters)
 * @method static Builder|Note whereCreatedAt($value)
 * @method static Builder|Note whereDeletedAt($value)
 * @method static Builder|Note whereDescription($value)
 * @method static Builder|Note whereId($value)
 * @method static Builder|Note whereReadMinute($value)
 * @method static Builder|Note whereSlug($value)
 * @method static Builder|Note whereTags($value)
 * @method static Builder|Note whereTitle($value)
 * @method static Builder|Note whereUpdatedAt($value)
 * @method static Builder|Note whereUserId($value)
 */
class Note extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
