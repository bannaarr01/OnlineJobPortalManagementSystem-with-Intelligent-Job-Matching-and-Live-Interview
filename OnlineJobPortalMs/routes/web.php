<?php

use Illuminate\Support\Facades\Route;

/*
|-----------------------------------------------------------------------------
| Web Routes
|-----------------------------------------------------------------------------
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|-----------------------------------------------------------------------------
*/

Auth::routes(['verify' => true]);

//--------------HOME ROUTE-----------------------------------------------------
Route::get('/', 'App\Http\Controllers\JobController@index');
//--------------USER HOMEPAGE ROUTE--------------------------------------------
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//--------------VIEW BLOG POST ROUTE-------------------------------------------
Route::get('/posts/{id}/{slug}', 'App\Http\Controllers\AdminDashboardController@show')->name('post.show');
//--------------UPDATE USER BEHAVIOUR ROUTE------------------------------------
Route::post('/jobs/{id}/{job}', 'App\Http\Controllers\JobController@actionUser')->name('jobs.event');
//-----------------SET RATING ROUTE--------------------------------------------
Route::post('/ratings/{id}', 'App\Http\Controllers\CompanyController@setRating');
//-----------------CATEGORY ROUTE----------------------------------------------
Route::get('/category/{id}', 'App\Http\Controllers\CategoryController@index')->name('category.index');
//-----------------SHARE JOB ROUTE---------------------------------------------
Route::post('/job/share', 'App\Http\Controllers\EmailController@send')->name('share.job');
//-------------NNEWSLETTER ROUTE-----------------------------------------------
Route::post('/subscribe', 'App\Http\Controllers\EmailController@subscribe');
//-----------------------------------------------------------------------------

//-----------------USER ROUTES-------------------------------------------------
Route::get('user/profile', 'App\Http\Controllers\UserController@index')->name('profile.view');
Route::post('user/profile/create', 'App\Http\Controllers\UserController@store')->name('profile.create');
Route::post('user/coverletter', 'App\Http\Controllers\UserController@coverletter')->name('cover.letter');
Route::post('user/resume', 'App\Http\Controllers\UserController@resume')->name('resume');
Route::post('user/avatar', 'App\Http\Controllers\UserController@avatar')->name('avatar');
Route::get('/jobsapplied/applications', 'App\Http\Controllers\UserController@applications')->name('application.status');
//------------------------------------------------------------------------------

//-------------USER SAVE AND UNSAVE JOB ROUTE-----------------------------------
Route::post('/save/{id}', 'App\Http\Controllers\FavouriteController@saveJob');
Route::post('/unsave/{id}', 'App\Http\Controllers\FavouriteController@unSaveJob');
//------------------------------------------------------------------------------

//----------------EMPLOYER ROUTES-----------------------------------------------
Route::view('employer/register', 'auth.employer-register')->name('employer.register');
Route::post('employer/register', 'App\Http\Controllers\EmployerRegisterController@employerRegister')->name('emp.register');
Route::get('company/create', 'App\Http\Controllers\CompanyController@create')->name('company.view');
Route::post('company/create', 'App\Http\Controllers\CompanyController@store')->name('company.store');
Route::post('company/logo', 'App\Http\Controllers\CompanyController@companyLogo')->name('company.logo');
Route::post('company/coverphoto', 'App\Http\Controllers\CompanyController@coverPhoto')->name('cover.photo');
Route::get('/company/{id}/{company}', 'App\Http\Controllers\CompanyController@index')->name('company.index');
Route::get('/companies', 'App\Http\Controllers\CompanyController@company')->name('company');
Route::get('/companies/search', 'App\Http\Controllers\CompanyController@searchCompanies');
//------------------------------------------------------------------------------

//-----------JOBS AND EMPLOYER MANAGE JOB ROUTES--------------------------------
Route::get('/jobs/create', 'App\Http\Controllers\JobController@create')->name('job.create');
Route::post('/jobs/create', 'App\Http\Controllers\JobController@store')->name('jobs.store');
Route::get('/jobs/myjob', 'App\Http\Controllers\JobController@myJob')->name('myjob');
Route::get('/jobs/{id}', 'App\Http\Controllers\JobController@edit')->name('job.edit');
Route::get('/job/{id}', 'App\Http\Controllers\JobController@deleteMyJob')->name('myjob.delete');
Route::post('/jobs/{id}', 'App\Http\Controllers\JobController@update')->name('job.update');
Route::get('/all', 'App\Http\Controllers\JobController@allJobs')->name('alljobs');
Route::get('/jobs/search', 'App\Http\Controllers\JobController@searchJobs');
Route::get('/jobs/{id}/{job}', 'App\Http\Controllers\JobController@show')->name('jobs.show');
Route::post('/report/job/{jobid}/{companyid}', 'App\Http\Controllers\JobController@reportJob')->name('report.job');
//------------------------------------------------------------------------------


//--------------APPLICANT AND EMPLOYER MANAGE APPLICANT-------------------------
Route::post('/applications/{id}', 'App\Http\Controllers\JobController@apply')->name('apply');
Route::get('/jobsposted/applications', 'App\Http\Controllers\JobController@applicant')->name('applicants');
Route::post('/jobstatus/{id}/{uid}/aprroved', 'App\Http\Controllers\JobController@approveAppliedJob')->name('post.approveJob');
Route::post('/jobstatus/{id}/{uid}/declined', 'App\Http\Controllers\JobController@declineAppliedJob')->name('post.declineJob');
Route::post('/jobstatus/{id}/{uid}/delete', 'App\Http\Controllers\JobController@deleteAppliedJob')->name('post.deleteAppliedJob');
Route::get('/jobstatus/{id}/{uid}/schedule-job-interview', 'App\Http\Controllers\LiveInterviewController@scheduleIndex')->name('schedule.index');
Route::get('/interviews-scheduled/records', 'App\Http\Controllers\LiveInterviewController@records')->name('interview.records');
Route::post('/interview-scheduled/delete/record/{meetingid}', 'App\Http\Controllers\LiveInterviewController@deleteScheduledInterview')->name('post.deleteScheduledInterview');
//-----------------------------------------------------------------------------


//--------------ALL ADMIN TASK--------------------------------------------------
Route::get('/admindashboard', 'App\Http\Controllers\AdminDashboardController@index')->name('admin.dashboard');
Route::get('/admindashboard/posts', 'App\Http\Controllers\AdminDashboardController@getPosts')->name('admin.getPosts');
Route::get('/admindashboard/create', 'App\Http\Controllers\AdminDashboardController@create')->name('admin.createBlog');
Route::post('/admindashboard/create', 'App\Http\Controllers\AdminDashboardController@store')->name('post.store');
Route::get('/admindashboard/{id}/edit', 'App\Http\Controllers\AdminDashboardController@edit')->name('post.edit');
Route::get('/admindashboard/{id}/toggle', 'App\Http\Controllers\AdminDashboardController@toggle')->name('post.toggle');
Route::get('/admindashboard/{id}/toggle-jobs', 'App\Http\Controllers\AdminDashboardController@toggleReportedJob')->name('job.toggle');
Route::post('/admindashboard/{id}/update', 'App\Http\Controllers\AdminDashboardController@update')->name('post.update');
Route::post('/admindashboard/destroy', 'App\Http\Controllers\AdminDashboardController@destroy')->name('post.delete');
Route::post('/admindashboard/delete/job', 'App\Http\Controllers\AdminDashboardController@deleteJob')->name('job.delete');
Route::get('/admindashboard/trash', 'App\Http\Controllers\AdminDashboardController@trash')->middleware('admin');
Route::get('/admindashboard/{id}/trash', 'App\Http\Controllers\AdminDashboardController@restore')->name('post.restore');
Route::get('/admindashboard/{id}/remove/rash', 'App\Http\Controllers\AdminDashboardController@removeTrash')->name('post.removeTrash');
Route::get('/admindashboard/jobs', 'App\Http\Controllers\AdminDashboardController@getAllJobs');
Route::get('/admindashboard/reported/jobs', 'App\Http\Controllers\AdminDashboardController@getReportedJobs');
Route::get('/admindashboard/all/users', 'App\Http\Controllers\AdminDashboardController@getAllUsers')->name('all.getUsers');
Route::post('/admindashboard/user/destroy', 'App\Http\Controllers\AdminDashboardController@destroyUser')->name('user.destroy');
Route::get('/admindashboard/deactivated/users', 'App\Http\Controllers\AdminDashboardController@deactivatedUsers');
Route::get('/admindashboard/user/{id}/restore', 'App\Http\Controllers\AdminDashboardController@restoreUser')->name('user.restore');
Route::get('/users/search', 'App\Http\Controllers\AdminDashboardController@searchUsers');
Route::get('/user/{id}', 'App\Http\Controllers\AdminDashboardController@getUser');
Route::get('/testimonial/create', 'App\Http\Controllers\TestimonialController@create')->name('testimonial.create');
Route::post('/testimonial/create', 'App\Http\Controllers\TestimonialController@store')->name('testimonial.store');
Route::get('/testimonial', 'App\Http\Controllers\TestimonialController@index');
//------------------------------------------------------------------------------

//---------------------LOGIN WITH FACEBOOK ROUTES-------------------------------
Route::get('auth/facebook', 'App\Http\Controllers\SocialLoginController@facebookRedirect')->name('fb.login');
Route::get('auth/facebook/callback', 'App\Http\Controllers\SocialLoginController@loginWithFacebook');
//------------------------------------------------------------------------------

//---------------------LOGIN WITH GOOGLE ROUTES---------------------------------
Route::get('auth/google', 'App\Http\Controllers\SocialLoginController@googleRedirect')->name('google.login');
Route::get('auth/google/callback', 'App\Http\Controllers\SocialLoginController@loginWithGoogle');
//------------------------------------------------------------------------------

//---------------------FAQ------------------------------------------------------
Route::view('/faq', 'faq.index')->name('faq');
//---------------------ABOUT----------------------------------------------------
Route::view('/about', 'about')->name('about');
