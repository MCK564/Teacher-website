<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VaccancyController;
use App\Models\AttachFiles;
use App\Models\Document;
use App\Models\Download;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/home',[HomeController::class,'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // news
    Route::get('/news',[NewsController::class,'index'])->name('news');
    Route::get('/news/search',[NewsController::class,'search'])->name('news.search');
    Route::get('/news/{id}',[NewsController::class,'get_by_id'])->name('news.detail');
    

    // vaccancy
    Route::get('/vacancies',[VaccancyController::class,'index'])->name('vacancies');
    Route::get('/vacancies/search',[VaccancyController::class,'search'])->name('vacancies.search');
    Route::get('/vacancies/{id}',[VaccancyController::class,'get_by_id'])->name('vacancies.detail');

    // documents
    Route::get('/documents',[DocumentController::class,'index'])->name('documents');
    Route::get('/documents/search',[DocumentController::class,'search'])->name('documents.search');
    Route::get('/documents/{id}',[DocumentController::class,'get_by_id'])->name('documents.details');
    // introduction
    Route::get('/introduction',function (){
        return view('introduction.index');
    })->name('introduction');
    Route::get("/download",[DownloadController::class,'download'])->name('download');
});

Route::middleware('auth','admin')->group(function (){
    // news 
    Route::get('admin/news',[NewsController::class,'index'])->name('admin.news.index');
    Route::get('admin/news/search',[NewsController::class,'search'])->name('admin.news.search');
    Route::get('admin/news-edit',[NewsController::class,'show_create_or_update'])->name('admin.news.show_form_create');
    Route::get('admin/news-edit-{id}',[NewsController::class,'show_create_or_update'])->name('admin.news.show_form_update');
    Route::post('admin/news',[NewsController::class,'create_or_update'])->name('admin.news.create');
    Route::post('admin/news/{id}',[NewsController::class,'create_or_update'])->name('admin.news.update');
    Route::delete('admin/news/{id}',[NewsController::class,'delete'])->name('admin.news.delete');
 
     // subjects
     Route::get('admin/subjects',[SubjectController::class,'index'])->name('admin.subjects.index');
     Route::get('admin/subjects-edit',[SubjectController::class,'show_create_or_update'])->name('admin.subjects.show_form_create');
     Route::get('admin/subjects-edit/{id}',[SubjectController::class,'show_create_or_update'])->name('admin.subjects.show_form_update');
     Route::get('admin/subjects/search',[SubjectController::class,'search'])->name('admin.subjects.search');
     Route::post('admin/subjects-edit',[SubjectController::class,'create_or_update'])->name('admin.subjects.create');
     Route::post('admin/subjects-edit/{id}',[SubjectController::class,'create_or_update'])->name('admin.subjects.update');
     Route::delete('admin/subjects/{id}',[SubjectController::class,'delete'])->name('admin.subjects.delete');

    // vaccancy
    Route::get('admin/vacancies',[VaccancyController::class,'index'])->name('admin.vacancies.index');
    Route::get('admin/vacancies/search',[VaccancyController::class,'search'])->name('admin.vacancies.search');
    Route::get('admin/vacancies-edit',[VaccancyController::class,'show_create_or_update'])->name('admin.vacancies.show_form_create');
    Route::get('admin/vacancies-edit-{id}',[VaccancyController::class,'show_create_or_update'])->name('admin.vacancies.show_form_update');
    Route::post('admin/vacancies',[VaccancyController::class,'create_or_update'])->name('admin.vacancies.create');
    Route::post('admin/vacancies/{id}',[VaccancyController::class,'create_or_update'])->name('admin.vacancies.update');
    Route::delete('admin/vacancies/{id}',[VaccancyController::class,'delete'])->name('admin.vacancies.delete');

    // documents
    Route::get('admin/documents',[DocumentController::class,'index'])->name('admin.documents.index');
    Route::get('admin/documents/search',[DocumentController::class,'search'])->name('admin.documents.search');
    Route::get('admin/documents-edit',[DocumentController::class,'show_create_or_update'])->name('admin.documents.show_form_create');
    Route::get('admin/documents-edit-{id}',[DocumentController::class,'show_create_or_update'])->name('admin.documents.show_form_update');
    Route::post('admin/documents',[DocumentController::class,'create_or_update'])->name('admin.documents.create');
    Route::post('admin/documents/{id}',[DocumentController::class,'create_or_update'])->name('admin.documents.update');
    Route::post('admin/documents/attach_files/{id}',[DocumentController::class,'updateAttachFile'])->name('admin.documents.update_attach_files');
    Route::delete('admin/documents/{id}',[DocumentController::class,'delete'])->name('admin.documents.delete');
    Route::delete('admin/documents/attach_file/{id}',[DocumentController::class,'delete_attach_file'])->name('admin.documents.attach_files.delete');


    // users
    Route::get('admin/users',[UserController::class,'index'])->name('admin.users.index');
    Route::get('admin/users/search',[UserController::class,'search'])->name('admin.users.search');
    Route::get('admin/news-edit',[UserController::class,'show_create_or_update'])->name('admin.news.show_form_create');
    Route::get('admin/news-edit-{id}',[UserController::class,'show_create_or_update'])->name('admin.news.show_form_update');
    Route::post('admin/users',[UserController::class,'create_or_update'])->name('admin.users.create');
    Route::post('admin/users/{id}',[UserController::class,'create_or_update'])->name('admin.users.update');
    Route::delete('admin/users/{id}',[UserController::class,'delete'])->name('admin.users.delete');

    // downloads
    Route::get('admin/downloads',[DownloadController::class,'index'])->name('admin.downloads.index');
    Route::get('admin/downloads/search',[DownloadController::class,'search'])->name('admin.downloads.search');
    Route::get('admin/news-edit',[NewsController::class,'show_create_or_update'])->name('admin.news.show_form_create');
    Route::get('admin/news-edit-{id}',[NewsController::class,'show_create_or_update'])->name('admin.news.show_form_update');
    Route::post('admin/downloads/{id}',[DownloadController::class,'create_or_update'])->name('admin.downloads.update');
    Route::delete('admin/downloads/{id}',[DownloadController::class,'delete'])->name('admin.downloads.delete');
});





require __DIR__.'/auth.php';
