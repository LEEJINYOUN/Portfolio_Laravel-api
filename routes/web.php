<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PortfolioDesController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 1. 주소 대소문자 주의, 컨트롤러에 설정한 함수명 주의
// 2. resource 이용하면 주소와 함수명 자동 설정 ('php artisan route:list' 으로 확인)

// 타임라인 액션
Route::resource('timeline', TimelineController::class);

// 스킬 액션
Route::resource('skill', SkillController::class);

// 포트폴리오 액션
Route::resource('portfolio', PortfolioController::class);


// 설명 - 포트폴리오 별 전체 리스트 가져오기
Route::get('/portfolio/{portfolio}/des', [PortfolioDesController::class, 'show']);

// 설명 - 데이터 저장
Route::post('/portfolio/{portfolio}/des', [PortfolioDesController::class, 'store']);

// 설명 - 선택한 데이터 가져오기
Route::get('/portfolioDes/{portfolioDes}', [PortfolioDesController::class, 'edit']);

// 설명 - 데이터 업데이트
Route::patch('/portfolioDes/{portfolioDes}', [PortfolioDesController::class, 'update']);

// 설명 - 데이터 삭제
Route::delete('/portfolioDes/{portfolioDes}', [PortfolioDesController::class, 'destroy']);