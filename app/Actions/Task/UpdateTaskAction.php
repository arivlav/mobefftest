<?php

namespace App\Actions\Task;

use App\Http\Requests\Task\TaskUpdateRequest;
use App\Models\TaskModel;

class UpdateTaskAction
{
    public function execute(int $id, TaskUpdateRequest $request): ?array
    {
        $task = TaskModel::find($id);
        if (!$task) return null;
        $dto = $request->toDto();
        $task->fill($dto->toArray());
        $task->save();
        return $task->toArray();
    }
}
