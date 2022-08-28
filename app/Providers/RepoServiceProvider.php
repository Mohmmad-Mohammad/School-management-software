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
        $this->app->bind('App\Repository\Interfaces\QuizzRepositoryInterface', 'App\Repository\QuizzRepository');
        $this->app->bind('App\Repository\Interfaces\QuestionRepositoryInterface', 'App\Repository\QuestionRepository');
        $this->app->bind('App\Repository\Interfaces\LibraryRepositoryInterface', 'App\Repository\LibraryRepository');
        $this->app->bind('App\Repository\Interfaces\ChildrenRepositoryInterface', 'App\Repository\ChildrenRepository');
        $this->app->bind('App\Repository\Interfaces\ClassroomRepositoryInterface', 'App\Repository\ClassroomRepository');
        $this->app->bind('App\Repository\Interfaces\OnlineClasseRepositoryInterface', 'App\Repository\OnlineClasseRepository');
        $this->app->bind('App\Repository\Interfaces\SectionRepositoryInterface', 'App\Repository\SectionRepository');
        $this->app->bind('App\Repository\Interfaces\SettingRepositoryInterface', 'App\Repository\SettingRepository');
        $this->app->bind('App\Repository\Interfaces\OnlineZoomClassesRepositoryInterface', 'App\Repository\OnlineZoomClassesRepository');
        $this->app->bind('App\Repository\Interfaces\ProfileRepositoryInterface', 'App\Repository\ProfileRepository');
        $this->app->bind('App\Repository\Interfaces\QuestionTeacherRepositoryInterface', 'App\Repository\QuestionTeacherRepository');
        $this->app->bind('App\Repository\Interfaces\QuizzTeacherRepositoryInterface', 'App\Repository\QuizzTeacherRepository');
        $this->app->bind('App\Repository\Interfaces\StudentdashboardRepositoryInterface', 'App\Repository\StudentdashboardRepository');
        $this->app->bind('App\Repository\Interfaces\ExamDashboardRepositoryInterface', 'App\Repository\ExamDashboardRepository');
        $this->app->bind('App\Repository\Interfaces\ProfileDashboardRepositoryInterface', 'App\Repository\ProfileDashboardRepository');

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