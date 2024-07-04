<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PortfolioDesController;
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

// 선택한 타임라인 데이터 가져오기
Route::get('/timeline/{timeline}', [TimelineController::class, 'readTimeline']);

// 선택한 타임라인 데이터 업데이트
Route::patch('/timeline/{timeline}', [TimelineController::class,'updateTimeline']);



// 스킬 생성
Route::post('/createSkill', [SkillController::class, 'createSkill']);

// 스킬 데이터 가져오기
Route::get('/getSkill', [SkillController::class, 'getSkill']);

// 스킬 삭제
Route::delete('/skill/{skill}', [SkillController::class, 'destroySkill']);

// 선택한 스킬 데이터 가져오기
Route::get('/skill/{skill}', [SkillController::class, 'readSkill']);

// 선택한 스킬 데이터 업데이트
Route::patch('/skill/{skill}', [SkillController::class,'updateSkill']);



// 포트폴리오 생성
Route::post('/createPortfolio', [PortfolioController::class, 'createPortfolio']);

// 포트폴리오 데이터 가져오기
Route::get('/getPortfolio', [PortfolioController::class, 'getPortfolio']);

// 포트폴리오 삭제
Route::delete('/portfolio/{portfolio}', [PortfolioController::class, 'destroyPortfolio']);

// 선택한 포트폴리오 데이터 가져오기
Route::get('/portfolio/{portfolio}', [PortfolioController::class, 'readPortfolio']);

// 선택한 포트폴리오 데이터 업데이트
Route::patch('/portfolio/{portfolio}', [PortfolioController::class,'updatePortfolio']);


// 설명 생성
Route::post('/portfolio/{portfolio}/des', [PortfolioDesController::class, 'store']);

// 설명 데이터 가져오기
Route::get('/portfolio/{portfolio}/des', [PortfolioDesController::class, 'show']);

// 설명 삭제


// 선택한 설명 데이터 가져오기
Route::get('/des/{des}/edit', [PortfolioDesController::class, 'edit']);


// 선택한 설명 데이터 업데이트
Route::put('/des/{des}', [PortfolioDesController::class, 'update']);
