<?php
///php artisan krlove:generate:model User --table-name=users
use App\Http\Controllers\main\homeController;
use App\Http\Controllers\main\signupController;
use App\Http\Controllers\main\articleController;
use App\Http\Controllers\main\browseController;
use App\Http\Controllers\main\categoryController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\userController;
use App\Http\Controllers\folderController;
use App\Http\Controllers\versionController;
use App\Http\Controllers\researchController;
use App\Http\Controllers\researchApplicationController;
use App\Http\Controllers\evaluatorController;
use App\Http\Controllers\publicationManagementController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::resource('/', homeController::class);

Route::resource('home', homeController::class);

Route::resource('signup', signupController::class);
Route::post('register', [signupController::class, 'registration']);
Route::get('browse_users/{id}', [browseController::class, 'browse_users'])->where('id', '[0-9]+');
Route::get('search', [categoryController::class, 'index']);
Route::get('article/{id}', [articleController::class, 'index'])->where('id', '[0-9]+');

Route::get('category/{type}/{id}', [categoryController::class, 'index'])->where(['id' => '[0-9]+', 'type' => '[0-9]+',]);
Route::get('searchCategory', [categoryController::class, 'index'])->where(['id' => '[0-9]+', 'type' => '[0-9]+',]);
Route::get('browse_version', [browseController::class, 'browse_version']);
Route::get('browse_researcher', [browseController::class, 'browse_researcher']);
Route::get('browse_category', [browseController::class, 'browse_category']);
Route::get('browse_authors_nots', [browseController::class, 'browse_authors_nots']);
Route::get('browse_ethics', [browseController::class, 'browse_ethics']);
Route::get('browse_scope', [browseController::class, 'browse_scope']);
Route::get('browse_about', [browseController::class, 'browse_about']);
Route::get('browse_condition', [browseController::class, 'browse_condition']);

Route::get('browse_index_researcher', [browseController::class, 'browse_index_researcher']);
Route::get('browse_index_researcher_by_folder/{id}', [browseController::class, 'browse_index_researcher'])->where('id', '[0-9]+');


/*********************************/


Route::group(['middleware' => ['web', 'auth']], function () {


    Route::resource('user', userController::class);

    /*********************************/

    Route::resource('folder', folderController::class);

    /*********************************/
    Route::post('is_done_notes', [researchApplicationController::class, 'is_done_notes']);
    Route::post('researchApplicationPay', [researchApplicationController::class, 'researchApplicationPay']);
    Route::post('researchApplicationStatus', [researchApplicationController::class, 'researchApplicationStatus']);
    Route::get('getPublicationManagement', [researchApplicationController::class, 'getPublicationManagement']);
    Route::get('getPublicationManagementEvaluator', [researchApplicationController::class, 'getPublicationManagementEvaluator']);
    Route::get('researchAppNoteShow', [evaluatorController::class, 'researchAppNoteShow']);
    Route::delete('researchAppNoteDelete/{id}', [evaluatorController::class, 'researchAppNoteDelete']);
    Route::post('addEvaluatorNotes', [evaluatorController::class, 'addEvaluatorNotes']);
    Route::post('addResearcherEvaluation', [evaluatorController::class, 'addResearcherEvaluation']);
    Route::get('addResearcherEvaluation/{id}/edit', [evaluatorController::class, 'showUserEvalauation']);
    Route::get('showAllApplication/{id}', [publicationManagementController::class, 'showAllApplication']);

    Route::resource('researchApplication', researchApplicationController::class);

    Route::get('getResearchApplication', [researchApplicationController::class, 'getResearchApplication']);
    Route::get('pageResearchApplication', [researchApplicationController::class, 'pageResearchApplication']);

    /*********************************/
    Route::resource('profile', profileController::class);
    Route::put('updateAvatar/{id}', [userController::class,'update']);
    Route::put('changePasswordSave/{id}', [profileController::class,'changePasswordSave']);


    /*********************************/
    Route::resource('version', versionController::class);

    /*********************************/

    Route::resource('publicationManagement', publicationManagementController::class);

    /*********************************/

    Route::resource('evaluator', evaluatorController::class);

    /*********************************/

    Route::resource('category', categoryController::class);

    /*********************************/
    Route::get('datatableJournal', 'journalController@datatableJournal');
    Route::post('update_journal', 'journalController@update_journal');
    Route::resource('journal', 'journalController');

    /*********************************/
    Route::get('datatableResearch', 'researchController@datatableResearch');
    Route::post('update_research', 'researchController@update_research');
    Route::resource('research', researchController::class);
    Route::get('logout', [loginController::class, 'logout']);


    /*********************************/


});


/*********************************/
Route::get('/migrate', function () {
    ini_set('max_execution_time', 300);
    Artisan::call('migrate:fresh --seed', []);


    return redirect('/');
});

Route::get('/seed', function () {
    ini_set('max_execution_time', 300);

    Artisan::call('db:seed', []);

    return redirect('/');
});

/*********************************/


Route::get('/reset', function () {
    ini_set('max_execution_time', 300);
    Artisan::call('migrate:reset', ['--force' => true]);
    echo "migration done.";
    return redirect('/');
});

Route::post('admin', [loginController::class, 'login']);
Route::get('login', [loginController::class, 'index'])->name('login');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
