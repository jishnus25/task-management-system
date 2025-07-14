<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TaskManagementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'progress' => 'nullable|in:0,1,2',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'priority' => 'nullable|in:1,2,3',
        ];
    }

    public function getPriority(): ?int
    {
        return $this->query('priority');
    }

    public function getProgress(): ?int
    {
        return $this->query('progress');
    }
    public function getStartDate(): ?string
    {
        return $this->query('start_date');
    }
    public function getEndDate(): ?string
    {
        return $this->query('end_date');
    }
}
