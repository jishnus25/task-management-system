<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserManagementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => $this->isMethod('post') ? 'required|string|min:6' : 'nullable|string|min:6',
            'role' => 'required|in:admin,user',
        ];
        if ($this->isMethod('post')) {
            $rules['email'] .= '|unique:users,email|unique:admins,email';
        } else if ($this->isMethod('put')) {
            $userId = $this->route('user')?->id;
            $rules['email'] .= '|unique:users,email,' . $userId . '|unique:admins,email,' . $userId;
        }
        return $rules;
    }

    public function getName(): string
    {
        return $this->input('name');
    }

    public function getEmail(): string
    {
        return $this->input('email');
    }

    public function getPassword(): ?string
    {
        return $this->input('password');
    }

    public function getRole(): string
    {
        return $this->input('role', 'user');
    }
}
