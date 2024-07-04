<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioDesRequest;
use App\Models\Portfolio;
use App\Models\PortfolioDes;
use Illuminate\Http\Request;

class PortfolioDesController extends Controller
{

    // 포트폴리오 별 전체 리스트 가져오기
    public function show(Portfolio $portfolio){

        // 포트폴리오 id 찾기
        $id = $portfolio->id;

        // 포트폴리오 id와 일치하는 설명 리스트 찾기
        $PortfolioDes = PortfolioDes::where('portfolio_id', $id)->get();

        // json 형식으로 결과 리턴
        return response()->json([
            'results' => $PortfolioDes,
            'message' => "설명 리스트 가져오기 성공"
        ], 200);
    }

    // 데이터 저장
    public function store (Portfolio $portfolio, PortfolioDesRequest $request){
        try{

            // 테이블 생성
            $portfolioDes = PortfolioDes::create([
                'portfolio_id' => $portfolio->id,
                'des' => $request->des,
            ]);

            // 생성한 데이터 저장 실패
            if (!$portfolioDes){
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
    public function edit (PortfolioDes $portfolioDes) {
        return response()->json([
            'results' => $portfolioDes,
            'message' => "특정 설명 가져오기 성공"
        ], 200);
    }

    // 데이터 업데이트
    public function update (Request $request, PortfolioDes $portfolioDes) {
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
                "result" => $e,
                'message' => "오류가 있습니다."
            ],500);
        }
    }

    // 데이터 삭제
    public function destroy (PortfolioDes $portfolioDes) {
        try{
            // 선택한 데이터 삭제
            $portfolioDes->delete();

            // 삭제 성공
            return response()->json([
                'message' => "설명 삭제 완료."
            ], 201);

        } catch (\Exception $e){

            // 설명 삭제 실패
            return response()->json([
                "result" => $e,
                'message' => "오류가 있습니다."
            ], 500);
        }
    }
}
