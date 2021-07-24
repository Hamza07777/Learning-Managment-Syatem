<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Assignment_MarksController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Course_AssignmentController;
use App\Http\Controllers\Course_CategoryController;
use App\Http\Controllers\Course_EvaluationController;
use App\Http\Controllers\Course_InstructorController;
use App\Http\Controllers\Course_LocationController;
use App\Http\Controllers\Course_QuiztController;
use App\Http\Controllers\Course_TagController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\Instructor_AssignmentController;
use App\Http\Controllers\Instructor_CourseController;
use App\Http\Controllers\Instructor_QuizController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear-cache', function() {
    $run = Artisan::call('config:clear');
    $run = Artisan::call('cache:clear');
    $run = Artisan::call('config:cache');
    return 'FINISHED';  
});
Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','verified']], function () {

    Route::get('/quiz_download/{file}',[App\Http\Controllers\QuizController::class,'download'])->name('quiz_download');
    Route::get('/download/{file}',[App\Http\Controllers\AssignmentController::class,'download'])->name('download');


  });



Route::group(['middleware' => ['auth','verified','checkUserType:admin']], function () {

    Route::resource('user', AdminController::class);
    Route::resource('course', CoursesController::class);
    Route::resource('location', LocationController::class);
    Route::resource('tag', TagController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('course_location', Course_LocationController::class);
    Route::resource('course_tag', Course_TagController::class);
    Route::resource('course_category', Course_CategoryController::class);
    Route::resource('assignment', AssignmentController::class);
    Route::resource('quiz', QuizController::class);
    Route::resource('course_assignment', Course_AssignmentController::class);
    Route::resource('course_quiz', Course_QuiztController::class);
    Route::resource('course_instructor', Course_InstructorController::class);
    Route::resource('course_evaluation', Course_EvaluationController::class);



    Route::get('user-destroy/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('userDestroy');
    Route::post('multipleuser-destroydelete', [App\Http\Controllers\AdminController::class,'multiplecourse_quizdelete'])->name('multipleuser-destroydelete');

    Route::get('location-destroy/{id}', [App\Http\Controllers\LocationController::class, 'destroy'])->name('locationDestroy');
    Route::post('multiplelocation-destroydelete', [App\Http\Controllers\LocationController::class,'multiplecourse_quizdelete'])->name('multiplelocation-destroydelete');

    Route::get('course-destroy/{id}', [App\Http\Controllers\CoursesController::class, 'destroy'])->name('courseDestroy');
    Route::post('multiplecourse-destroydelete', [App\Http\Controllers\CoursesController::class,'multiplecourse_quizdelete'])->name('multiplecourse-destroydelete');

    Route::get('tag-destroy/{id}', [App\Http\Controllers\TagController::class, 'destroy'])->name('tagDestroy');
    Route::post('multipletag-destroydelete', [App\Http\Controllers\TagController::class,'multiplecourse_quizdelete'])->name('multipletag-destroydelete');

    Route::get('category-destroy/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('categoryDestroy');
    Route::post('multiplecategory-destroydelete', [App\Http\Controllers\CategoryController::class,'multiplecourse_quizdelete'])->name('multiplecategory-destroydelete');

    Route::get('unit-destroy/{id}', [App\Http\Controllers\UnitController::class, 'destroy'])->name('unitDestroy');
    Route::post('multipleunit-destroydelete', [App\Http\Controllers\UnitController::class,'multiplecourse_quizdelete'])->name('multipleunit-destroydelete');

    Route::get('course_location-destroy/{id}', [App\Http\Controllers\Course_LocationController::class, 'destroy'])->name('course_locationDestroy');
    Route::post('multiplecourse_locationdelete', [App\Http\Controllers\Course_LocationController::class,'multiplecourse_quizdelete'])->name('multiplecourse_locationdelete');

    Route::get('course_tag-destroy/{id}', [App\Http\Controllers\Course_TagController::class, 'destroy'])->name('course_tagDestroy');
    Route::post('multiplecourse_tagdelete', [App\Http\Controllers\Course_TagController::class,'multiplecourse_quizdelete'])->name('multiplecourse_tagdelete');

    Route::get('course_category-destroy/{id}', [App\Http\Controllers\Course_CategoryController::class, 'destroy'])->name('course_categoryDestroy');
    Route::post('multiplecourse_category-destroydelete', [App\Http\Controllers\Course_CategoryController::class,'multiplecourse_quizdelete'])->name('multiplecourse_category-destroydelete');

    Route::get('assignment-destroy/{id}', [App\Http\Controllers\AssignmentController::class, 'destroy'])->name('assignmentDestroy');
    Route::post('multipleassignment-destroydelete', [App\Http\Controllers\AssignmentController::class,'multiplecourse_quizdelete'])->name('multipleassignment-destroydelete');

    Route::get('quiz-destroy/{id}', [App\Http\Controllers\QuizController::class, 'destroy'])->name('quizDestroy');
    Route::post('multiplquiz-destroydelete', [App\Http\Controllers\QuizController::class,'multiplecourse_quizdelete'])->name('multiplquiz-destroydelete');

    Route::post('multiplecourse_assignmentdelete', [App\Http\Controllers\Course_AssignmentController::class,'multiplecourse_quizdelete'])->name('multiplecourse_assignmentdelete');
    Route::get('course_assignment-destroy/{id}', [App\Http\Controllers\Course_AssignmentController::class, 'destroy'])->name('course_assignmentDestroy');

    Route::get('course_quiz-destroy/{id}', [App\Http\Controllers\Course_QuiztController::class, 'destroy'])->name('course_quizDestroy');
    Route::post('multiplecourse_quizdelete', [App\Http\Controllers\Course_QuiztController::class,'multiplecourse_quizdelete'])->name('multiplecourse_quizdelete');

    Route::get('course_instructor-destroy/{id}', [App\Http\Controllers\Course_InstructorController::class, 'destroy'])->name('course_instructorDestroy');
    Route::post('multiplecourse_instructordelete', [App\Http\Controllers\Course_InstructorController::class,'multiplecourse_quizdelete'])->name('multiplecourse_instructordelete');

    Route::get('/admin_home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin_home');


    Route::get('/admin_profile', [App\Http\Controllers\AdminController::class, 'user_profile'])->name('admin_profile');

    Route::post('/admin_update_detail', [App\Http\Controllers\AdminController::class, 'admin_update_detail'])->name('admin_update_detail');

    Route::post('/admin_update_password', [App\Http\Controllers\AdminController::class, 'update_password'])->name('admin_update_password');




    Route::get('/all_user_course_assignment', [App\Http\Controllers\AssignmentController::class, 'all_user_course_assignment'])->name('all_user_course_assignment');

    Route::post('/all_user_course_assignment_filter', [App\Http\Controllers\AssignmentController::class, 'all_user_course_assignment_filter'])->name('all_user_course_assignment_filter');

    Route::get('/add_assignment_mark_view/{id}', [App\Http\Controllers\AssignmentController::class, 'add_assignment_mark_view'])->name('add_assignment_mark_view');

    Route::post('/add_assignment_mark_submit/{id}', [App\Http\Controllers\AssignmentController::class, 'add_assignment_mark_submit'])->name('add_assignment_mark_submit');




    Route::get('/all_user_course_quiz', [App\Http\Controllers\QuizController::class, 'all_user_course_quiz'])->name('all_user_course_quiz');

    Route::post('/all_user_course_quiz_filter', [App\Http\Controllers\QuizController::class, 'all_user_course_quiz_filter'])->name('all_user_course_quiz_filter');

    Route::get('/add_quiz_mark_view/{id}', [App\Http\Controllers\QuizController::class, 'add_quiz_mark_view'])->name('add_quiz_mark_view');

    Route::post('/add_quiz_mark_submit/{id}', [App\Http\Controllers\QuizController::class, 'add_quiz_mark_submit'])->name('add_quiz_mark_submit');


  });










Route::group(['middleware' => ['auth','verified','checkUserType:user']], function () {

    Route::resource('user-coureses', frontendController::class);
  
    Route::get('/user_profile', [App\Http\Controllers\UserController::class, 'user_profile'])->name('user_profile');


    Route::get('/completed_courses', [App\Http\Controllers\frontendController::class, 'completed_courses'])->name('completed_courses');

    Route::post('/update_password', [App\Http\Controllers\frontendController::class, 'update_password'])->name('update_password');
  
    Route::get('/start_course/{id}', [App\Http\Controllers\frontendController::class, 'start_course'])->name('start_course');
  
    Route::post('/complete_course/{id}', [App\Http\Controllers\frontendController::class, 'complete_course'])->name('complete_course');

    Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home');



  });







  Route::group(['middleware' => ['auth','verified','checkUserType:instructor']], function () {

    Route::resource('instructor-coureses', Instructor_CourseController::class);
    Route::resource('instructor-assignment', Instructor_AssignmentController::class);
    Route::resource('instructor-quiz', Instructor_QuizController::class);

    Route::get('/instructor_profile', [App\Http\Controllers\Instructor_CourseController::class, 'user_profile'])->name('instructor_profile');


    Route::post('/instructor_update_password', [App\Http\Controllers\Instructor_CourseController::class, 'update_password'])->name('instructor_update_password');

    Route::get('/instructor_home', [App\Http\Controllers\InstructorController::class, 'index'])->name('instructor_home');

    Route::get('/instrucotr_course_evaluation', [App\Http\Controllers\Instructor_CourseController::class, 'course_evaluation'])->name('instrucotr_course_evaluation');

    Route::post('/course_add_marks/{id}', [App\Http\Controllers\Instructor_CourseController::class, 'course_add_marks'])->name('course_add_marks');

    Route::get('/all_course_instructor_assignment', [App\Http\Controllers\AssignmentController::class, 'all_course_instructor_assignment'])->name('all_course_instructor_assignment');

    Route::get('/all_course_instructor_quizzes', [App\Http\Controllers\QuizController::class, 'all_course_instructor_quizzes'])->name('all_course_instructor_quizzes');

    

    Route::get('/all_user_course_instructor_assignment', [App\Http\Controllers\AssignmentController::class, 'all_user_course_instructor_assignment'])->name('all_user_course_instructor_assignment');

    Route::post('/all_user_course_instructor_assignment_filter', [App\Http\Controllers\AssignmentController::class, 'all_user_course_instructor_assignment_filter'])->name('all_user_course_instructor_assignment_filter');

    Route::get('/add_assignment_mark_view_instructor/{id}', [App\Http\Controllers\AssignmentController::class, 'add_assignment_mark_view_instructor'])->name('add_assignment_mark_view_instructor');

    Route::post('/add_assignment_mark_submit_instructor/{id}', [App\Http\Controllers\AssignmentController::class, 'add_assignment_mark_submit_instructor'])->name('add_assignment_mark_submit_instructor');



    Route::get('/all_user_course_instructor_quizzes', [App\Http\Controllers\QuizController::class, 'all_user_course_instructor_quizzes'])->name('all_user_course_instructor_quizzes');

    Route::post('/all_user_course_instructor_quizzes_filter', [App\Http\Controllers\QuizController::class, 'all_user_course_instructor_quizzes_filter'])->name('all_user_course_instructor_quizzes_filter');

    Route::get('/add_quiz_mark_view_instructor/{id}', [App\Http\Controllers\QuizController::class, 'add_quiz_mark_view_instructor'])->name('add_quiz_mark_view_instructor');

    Route::post('/add_quiz_mark_submit_instructor/{id}', [App\Http\Controllers\QuizController::class, 'add_quiz_mark_submit_instructor'])->name('add_quiz_mark_submit_instructor');


    
  });




