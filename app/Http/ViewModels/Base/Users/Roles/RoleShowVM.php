<?php


namespace App\Http\ViewModels\Base\Users\Roles;

use App\Domain\Base\Users\Roles\Model\Role;
use Illuminate\Contracts\Support\Arrayable;


class RoleShowVM implements Arrayable
{

    private $roleId;

    public function __construct($props)
    {
        $this->roleId = $props['id'] ;
    }

    private function get_Role(){
        return Role::find($this->roleId);
    }
    public function toArray(): array
    {
        return  $this->get_Role()->toArray();
    }
}
