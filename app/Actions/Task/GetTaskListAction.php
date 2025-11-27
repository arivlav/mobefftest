<?php

namespace App\Actions\Task;

use App\DTO\GetTaskListDto;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\TaskModel;
use Illuminate\Support\Collection;

class GetTaskListAction
{
    public function execute(GetTaskListDto $dto): Collection
    {
        return TaskModel::getTaskList($dto);
    }
}
