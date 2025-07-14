<?php
namespace App\DataTransferObjects\Admin;

use App\Http\Requests\Admin\UserManagementRequest;

class UserManagementDTO
{
    public string $name;
    public string $email;
    public ?string $password;
    public string $role;

    public static function fromRequest(UserManagementRequest $request): self
    {
        $dto = new self();
        $dto->name = $request->getName();
        $dto->email = $request->getEmail();
        $dto->password = $request->getPassword();
        $dto->role = $request->getRole();
        return $dto;
    }
}
