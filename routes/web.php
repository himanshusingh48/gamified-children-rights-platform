<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rights4Kids Web Routes
|--------------------------------------------------------------------------
*/

// Home / Landing Page
Route::get('/', function () {
    return view('home');
})->name('home');

// Auth Pages
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/signup', function () {
    return view('auth.login');
})->name('signup');

// Topics Index
Route::get('/topics', function () {
    return view('topics.index');
})->name('topics.index');

// Topic Detail Pages (each topic has its own slug)
Route::get('/topics/{slug}', function ($slug) {
    $topics = [
        'education' => ['title' => 'Right to Education', 'icon' => '✏️'],
        'safety'    => ['title' => 'Right to Safety',    'icon' => '🛡️'],
        'equality'  => ['title' => 'Right to Equality',  'icon' => '⚖️'],
        'health'    => ['title' => 'Right to Healthcare','icon' => '🏥'],
        'play'      => ['title' => 'Right to Play',      'icon' => '🎮'],
        'family'    => ['title' => 'Right to Family',    'icon' => '👨‍👩‍👧'],
    ];

    $topic = $topics[$slug] ?? ['title' => 'Topic', 'icon' => '📖'];
    return view('topics.detail', compact('topic', 'slug'));
})->name('topics.detail');

// Quiz Pages
Route::get('/quiz/{topic?}', function ($topic = 'education') {
    return view('quiz.index', compact('topic'));
})->name('quiz.index');

// Results Page
Route::get('/results', function () {
    $score = request('score', 4);
    $total = request('total', 5);
    $topic = request('topic', 'education');
    return view('results', compact('score', 'total', 'topic'));
})->name('results');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
