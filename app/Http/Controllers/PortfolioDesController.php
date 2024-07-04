<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioDes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortfolioDesController extends Controller
{

    public function store(Portfolio $portfolio, Request $request){
        try{

            // 테이블 생성
            $portfolioDes = PortfolioDes::create([
                'portfolio_id' => $portfolio->id,
                'des' => $request->des,
            ]);

            // 설명 작성 실패
            if (!$portfolioDes){
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

    public function show(Portfolio $portfolio){
        $id = $portfolio->id;
        $PortfolioDes = PortfolioDes::where('portfolio_id', $id)->get();

        // json 형식으로 결과 리턴
        return response()->json([
            'results' => $PortfolioDes,
            'message' => "설명 가져오기 성공"
        ], 200);
    }

    public function edit(PortfolioDes $portfolioDes) {
        return response()->json([
            'results' => $portfolioDes,
            'message' => "설명 가져오기 성공"
        ], 200);
    }

    public function update(Request $request, PortfolioDes $portfolioDes, $id) {
        try{
            // 데이터 검증
            $validated = $request->validate([
                'portfolio_id' => ['required'],
                'des' => ['required', 'max:1024'],
            ]);

            // 데이터 업데이트
            $portfolioDes->update($validated);

            // 설명 수정 실패
            if (!$portfolioDes){
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

    public function destroy(PortfolioDes $portfolioDes) {

        try{
            // 선택한 데이터 삭제
            $portfolioDes->delete();

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
}