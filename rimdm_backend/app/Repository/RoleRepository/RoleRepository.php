<?php
namespace App\Repository\RoleRepository;

use App\Models\Role;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\RoleRepository\IRoleRepository;

class RoleRepository extends BaseRepository implements IRoleRepository
{
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

    public function getRoleByName($name)
    {
        return $this->model->where(['name' => $name])->first();
    }
}
