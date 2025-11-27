<?php

namespace App\Actions\Task;

use App\Models\TaskModel;

class ShowTaskAction
{
    public function execute(int $id): array
    {
        return TaskModel::with('user')->find($id)->toArray();
    }
}
