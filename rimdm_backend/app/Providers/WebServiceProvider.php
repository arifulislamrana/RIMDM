<?php

namespace App\Providers;

use App\Utility\Logger;
use App\Utility\ILogger;
use Illuminate\Support\ServiceProvider;
use App\Services\Student\StudentService;
use App\Services\Teacher\TeacherService;
use App\Services\ClassLevel\ClassService;
use App\Services\Student\IStudentService;
use App\Services\Teacher\ITeacherService;
use App\Services\ClassLevel\IClassService;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\UserRepository\UserRepository;
use App\Repository\BaseRepository\IBaseRepository;
use App\Repository\UserRepository\IUserRepository;
use App\Repository\ClassRepository\ClassRepository;
use App\Repository\ClassRepository\IClassRepository;
use App\Repository\ResultRepository\IResultRepository;
use App\Repository\ResultRepository\ResultRepository;
use App\Repository\RoleRepository\IRoleRepository;
use App\Repository\RoleRepository\RoleRepository;
use App\Repository\SubjectRepository\ISubjectRepository;
use App\Repository\SubjectRepository\SubjectRepository;
use App\Repository\TeacherRepository\TeacherRepository;
use App\Repository\TeacherRepository\ITeacherRepository;
use App\Services\Result\IResultService;
use App\Services\Result\ResultService;
use App\Services\Role\IRoleService;
use App\Services\Role\RoleService;

class WebServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IBaseRepository::class, BaseRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(ITeacherRepository::class, TeacherRepository::class);
        $this->app->bind(ITeacherService::class, TeacherService::class);
        $this->app->bind(ILogger::class, Logger::class);
        $this->app->bind(IClassRepository::class, ClassRepository::class);
        $this->app->bind(IClassService::class, ClassService::class);
        $this->app->bind(IStudentService::class, StudentService::class);
        $this->app->bind(IResultRepository::class, ResultRepository::class);
        $this->app->bind(ISubjectRepository::class, SubjectRepository::class);
        $this->app->bind(IResultService::class, ResultService::class);
        $this->app->bind(IRoleRepository::class, RoleRepository::class);
        $this->app->bind(IRoleService::class, RoleService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
