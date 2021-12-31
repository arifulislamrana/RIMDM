<?php
namespace App\Repository\RoleRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface IRoleRepository extends IBaseRepository
{
    public function getRoleByName($name);
}
