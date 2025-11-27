<?php

namespace App\Models;

use App\DTO\GetTaskListDto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Collection;

class TaskModel extends Model
{
    /** @use HasFactory<\Database\Factories\TaskModelFactory> */
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    static public function getTaskList(GetTaskListDto $dto): Collection
    {
        return self::query()
            ->where(function ($query) use ($dto) {
                if ($dto->status) {
                    $query->where('status', $dto->status);
                }
                if ($dto->userId) {
                    $query->where('user_id', $dto->userId);
                }
                if ($dto->offset) {
                    $query->skip($dto->offset);
                }
                if ($dto->limit) {
                    $query->take($dto->limit);
                }
            })
            ->get();
    }
}
