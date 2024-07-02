<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimelineRequest;
use App\Models\Timeline;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    // 타임라인 리스트 가져오기
    public function getTimeline(){

        // 타임라인 데이터 불러오기
        $timeline = Timeline::get();

        // json 형식으로 결과 리턴
        return response()->json([
            'results' => $timeline,
            'message' => "타임라인 가져오기 성공"
        ], 200);
    }

    // 타임라인 데이터 생성
    public function createTimeline(TimelineRequest $request){

        try{

            // 테이블 생성
            $timeline = Timeline::create([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
            ]);

            // 타임라인 작성 실패
            if (!$timeline){
                return response()->json([
                    'message' => "타임라인 작성 실패했습니다. 다시 시도하세요."
                ],400);
            }

            // 타임라인 작성 성공
            return response()->json([
                'message' => "타임라인 작성 성공했습니다."
            ],201);

        } catch (\Exception $e) {

            // 타임라인 작성 실패
                return response()->json([
                    'message' => "오류가 있습니다."
                ],500);
            }
    }

    // 타임라인 데이터 삭제
    public function destroyTimeline (Timeline $timeline) {

        try{
            // 선택한 데이터 삭제
            $timeline->delete();

            // 삭제 성공
            return response()->json([
                'message' => "타임라인 삭제 완료."
            ],201);

        } catch (\Exception $e){

            // 타임라인 삭제 실패
            return response()->json([
                'message' => "오류가 있습니다."
            ],500);
        }
    }
}