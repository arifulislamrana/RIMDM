<?php

namespace App\Providers;

use App\Repository\BaseRepository\BaseRepository;
use App\Repository\BaseRepository\IBaseRepository;
use App\Repository\TeacherRepository\ITeacherRepository;
use App\Repository\TeacherRepository\TeacherRepository;
use App\Repository\UserRepository\IUserRepository;
use App\Repository\UserRepository\UserRepository;
use App\Services\Teacher\ITeacherService;
use App\Services\Teacher\TeacherService;
use Illuminate\Support\ServiceProvider;

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
