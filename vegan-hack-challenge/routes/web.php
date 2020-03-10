<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [
    'uses' => 'QuestionController@getIndex',
    'as' => 'question.index'
]);


Route::post('create', [
    'uses' => 'QuestionController@postQuestionCreate',
    'as' => 'question.create'
]);

Route::get('question/{id}', [
    'uses' => 'QuestionController@getQuestion',
    'as' => 'question.question'
]);

Route::post('question/{id}/answer', [
    'uses' => 'QuestionController@postAnswerCreate',
    'as' => 'question.question.answer'
]);

