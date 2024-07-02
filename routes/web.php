<?php

use App\Http\Controllers\SkillController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 타임라인 생성
Route::post('/createTimeline', [TimelineController::class, 'createTimeline']);

// 타임라인 데이터 가져오기
Route::get('/getTimeline', [TimelineController::class, 'getTimeline']);

// 타임라인 삭제
Route::delete('/timeline/{timeline}', [TimelineController::class, 'destroyTimeline']);

// 스킬 생성
Route::post('/createSkill', [SkillController::class, 'createSkill']);

// 스킬 데이터 가져오기
Route::get('/getSkill', [SkillController::class, 'getSkill']);

// 스킬 삭제
Route::delete('/skill/{skill}', [SkillController::class, 'destroySkill']);