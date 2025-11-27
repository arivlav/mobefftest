<?php

namespace App\Services;

use App\Enums\TaskStatusType;

class TaskStatusService
{
    public static function getStatusList(): array
    {
        return array_column(TaskStatusType::cases(), 'value');
    }
}
