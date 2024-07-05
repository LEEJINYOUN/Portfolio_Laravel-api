<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    // 전체 리스트 가져오기
    public function index (){

        // 스킬 데이터 불러오기
        $skill = Skill::get();

        // json 형식으로 결과 리턴
        return response()->json([
            'results' => $skill,
            'message' => "스킬 가져오기 성공"
        ], 200);
    }

    // 데이터 저장
    public function store (SkillRequest $request){
        try{

            // 테이블 생성
            $skill = Skill::create([
                'title' => $request->title,
                'category' => $request->category,
                'url' => $request->url,
            ]);

            // 생성한 데이터 저장 실패
            if (!$skill){
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
    public function show (Skill $skill) {
        return response()->json([
            'results' => $skill,
            'message' => "스킬 가져오기 성공"
        ], 200);
    }

    // 데이터 업데이트
    public function update (Request $request, Skill $skill) {
        try{

            // 데이터 검증
            $validated = $request->validate([
                'title' => ['required', 'max:1024'],
                'category' => ['required', 'max:1024'],
                'url' => ['required', 'max:1024'],
            ]);

            // 데이터 업데이트
            $skill->update($validated);

            // 스킬 수정 실패
            if (!$skill){
                return response()->json([
                    'message' => "스킬 수정 실패했습니다. 다시 시도하세요."
                ],400);
            }

            // 스킬 수정 성공
            return response()->json([
                'message' => "스킬 수정 성공했습니다."
            ],201);

        } catch (\Exception $e){

            // 스킬 작성 실패
            return response()->json([
                "result" => $e,
                'message' => "오류가 있습니다."
            ],500);
        }
    }

    // 데이터 삭제
    public function destroy (Skill $skill) {
        try{
            // 선택한 데이터 삭제
            $skill->delete();

            // 삭제 성공
            return response()->json([
                'message' => "스킬 삭제 완료."
            ],201);

        } catch (\Exception $e){

            // 스킬 삭제 실패
            return response()->json([
                "result" => $e,
                'message' => "오류가 있습니다."
            ],500);
        }
    }

}