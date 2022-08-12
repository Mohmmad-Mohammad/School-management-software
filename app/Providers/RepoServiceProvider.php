<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repository\Interfaces\TeacherRepositoryInterface', 'App\Repository\TeacherRepository');
        $this->app->bind('App\Repository\Interfaces\StudentRepositoryInterface', 'App\Repository\StudentRepository');
        $this->app->bind('App\Repository\Interfaces\StudentPromotionRepositoryInterface', 'App\Repository\StudentPromotionRepository');
        $this->app->bind('App\Repository\Interfaces\StudentGraduatedRepositoryInterface', 'App\Repository\StudentGraduatedRepository');
        $this->app->bind('App\Repository\Interfaces\FeesRepositoryInterface', 'App\Repository\FeesRepository');
        $this->app->bind('App\Repository\Interfaces\FeeInvoicesRepositoryInterface', 'App\Repository\FeeInvoicesRepository');
        $this->app->bind('App\Repository\Interfaces\ReceiptStudentsRepositoryInterface', 'App\Repository\ReceiptStudentsRepository');
        $this->app->bind('App\Repository\Interfaces\ProcessingFeeRepositoryInterface', 'App\Repository\ProcessingFeeRepository');
        $this->app->bind('App\Repository\Interfaces\PaymentRepositoryInterface', 'App\Repository\PaymentRepository');
        $this->app->bind('App\Repository\Interfaces\AttendanceRepositoryInterface', 'App\Repository\AttendanceRepository');
        $this->app->bind('App\Repository\Interfaces\SubjectRepositoryInterface', 'App\Repository\SubjectRepository');
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