<?php

namespace App\Actions\Task;

use App\Enums\TaskStatusType;
use App\Http\Requests\Task\TaskCreateRequest;
use App\Mail\Task\TaskCreated;
use App\Models\TaskModel;
use Illuminate\Support\Facades\Mail;

class CreateTaskAction
{
    public function execute(TaskCreateRequest $request): void
    {
        $dto = $request->toDto();
        $newTask = new TaskModel();
        $newTask->title = $dto->title;
        $newTask->description = $dto->description;
        $newTask->status = TaskStatusType::PLANNED->value;
        $newTask->user_id = auth()->id();
        $newTask->save();
    }
}
