<?php
namespace App\Http\Constants;

final class TaskConstants
{
    const PENDING = 0;
    const IN_PROGRESS = 1;
    const COMPLETED = 2;

    const STATUS = [
        self::PENDING => 'Pending',
        self::IN_PROGRESS => 'In Progress',
        self::COMPLETED => 'Completed',
    ];


    const PRIORITY_LOW = 1;
    const PRIORITY_MEDIUM = 2;
    const PRIORITY_HIGH = 3;

    const PRIORITY = [
        self::PRIORITY_LOW => 'Low',
        self::PRIORITY_MEDIUM => 'Medium',
        self::PRIORITY_HIGH => 'High',
    ];
}