<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimelineRequest;
use App\Models\Timeline;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    // 전체 리스트 가져오기
    public function index (){

        // 타임라인 데이터 불러오기
        $timeline = Timeline::get();

        // json 형식으로 결과 리턴
        return response()->json([
            'results' => $timeline,
            'message' => "타임라인 가져오기 성공"
        ], 200);
    }

    // 데이터 저장
    public function store (TimelineRequest $request){
        try{

            // 테이블 생성
            $timeline = Timeline::create([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
            ]);

            // 생성한 데이터 저장 실패
            if (!$timeline){
                return response()->json([
                    'message' => "생성한 데이터 저장 실패했습니다. 다시 시도하세요."
                ],400);
            }

            // 생성한 데이터 저장 성공
            return response()->json([
                'message' => "생성한 데이터 저장 성공했습니다."
            ],201);

        } catch (\Exception $e) {

            // 생성한 데이터 저장 실패
                return response()->json([
                    "result" => $e,
                    'message' => "오류가 있습니다."
                ],500);
            }
    }

    // 선택한 데이터 가져오기
    public function show (Timeline $timeline) {
        return response()->json([
            'results' => $timeline,
            'message' => "타임라인 가져오기 성공"
        ], 200);
    }

    // 데이터 업데이트
    public function update (Request $request, Timeline $timeline) {
        try{

            // 데이터 검증
            $validated = $request->validate([
                'title' => ['required', 'max:1024'],
                'description' => ['required', 'max:1024'],
                'date' => ['required', 'max:1024'],
            ]);

            // 데이터 업데이트
            $timeline->update($validated);

            // 타임라인 수정 실패
            if (!$timeline){
                return response()->json([
                    'message' => "타임라인 수정 실패했습니다. 다시 시도하세요."
                ],400);
            }

            // 타임라인 수정 성공
            return response()->json([
                'message' => "타임라인 수정 성공했습니다."
            ],201);

        } catch (\Exception $e){

            // 타임라인 수정 실패
            return response()->json([
                "result" => $e,
                'message' => "오류가 있습니다."
            ],500);
        }
    }

    // 데이터 삭제
    public function destroy (Timeline $timeline) {
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
                "result" => $e,
                'message' => "오류가 있습니다."
            ],500);
        }
    }

}