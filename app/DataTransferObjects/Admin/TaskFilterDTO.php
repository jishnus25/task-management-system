<?php

namespace App\DataTransferObjects\Admin;

use App\Http\Requests\Admin\TaskManagementRequest;

final class TaskFilterDTO
{
    public function __construct(
        public readonly ?int $progress,
        public readonly ?string $start_date,
        public readonly ?string $end_date,
        public readonly ?int $priority,
    ) {}

    public static function fromRequest(TaskManagementRequest $request): self
    {
        return new self(
            progress: $request->getProgress(),
            start_date: $request->getStartDate(),
            end_date: $request->getEndDate(),
            priority: $request->getPriority(),
        );
    }

    public function propertyExistsAndNotNull($property): bool
    {
        return property_exists($this, $property) && !is_null($this->{$property});
    }
}
