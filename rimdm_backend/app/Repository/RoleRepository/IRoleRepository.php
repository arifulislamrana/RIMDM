<?php
namespace App\Repository\RoleRepository;

use app\Repository\BaseRepository\IBaseRepository;

interface IRoleRepository extends IBaseRepository
{
    public function getAdmins();

    public function getSuperAdmins();
    
    public function getRoleByName($name);
}
