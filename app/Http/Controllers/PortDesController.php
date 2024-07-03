<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortDesRequest;
use App\Models\PortDes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortDesController extends Controller
{
    // 설명 리스트 가져오기
    public function getDes(){
        // 포트폴리오 데이터 불러오기
        $portDes = PortDes::get();

        // json 형식으로 결과 리턴
        return response()->json([
            'results' => $portDes,
            'message' => "설명 가져오기 성공"
        ], 200);
    }

    // 설명 데이터 생성
    public function createDes(PortDesRequest $request){

        try{

            // 테이블 생성
            $portDes = PortDes::create([
                'portfolio_id' => $request->portfolio_id,
                'des' => $request->des,
            ]);

            // 설명 작성 실패
            if (!$portDes){
                return response()->json([
                    'message' => "설명 작성 실패했습니다. 다시 시도하세요."
                ],400);
            }

            // 설명 작성 성공
            return response()->json([
                'message' => "설명 작성 성공했습니다."
            ],201);

        } catch (\Exception $e) {

            // 설명 작성 실패
                return response()->json([
                    'message' => "오류가 있습니다."
                ],500);
            }
    }

    // 설명 데이터 삭제
    public function destroyDes(PortDes $portDes) {

        try{
            // 선택한 데이터 삭제
            $portDes->delete();

            // 삭제 성공
            return response()->json([
                'message' => "설명 삭제 완료."
            ],201);

        } catch (\Exception $e){

            // 설명 삭제 실패
            return response()->json([
                'message' => "오류가 있습니다."
            ],500);
        }
    }

    // 설명 데이터 업데이트
    public function updateDes (Request $request, PortDes $portDes) {
        try{

            // 데이터 검증
            $validated = $request->validate([
                'portfolio_id' => ['required', 'max:1024'],
                'des' => ['required', 'max:1024'],
            ]);

            // 데이터 업데이트
            $portDes->update($validated);

            // 설명 수정 실패
            if (!$portDes){
                return response()->json([
                    'message' => "설명 수정 실패했습니다. 다시 시도하세요."
                ],400);
            }

            // 설명 수정 성공
            return response()->json([
                'message' => "설명 수정 성공했습니다."
            ],201);

        } catch (\Exception $e){

            // 설명 작성 실패
            return response()->json([
                'message' => "오류가 있습니다."
            ],500);
        }
    }

    // 선택한 설명 데이터 가져오기
    public function readDes(PortDes $portDes) {
        return response()->json([
            'results' => $portDes,
            'message' => "설명 가져오기 성공"
        ], 200);
    }
}