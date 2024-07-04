<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    // 전체 리스트 가져오기
    public function index (){

        // 포트폴리오 데이터 불러오기
        $portfolio = Portfolio::get();

        // json 형식으로 결과 리턴
        return response()->json([
            'results' => $portfolio,
            'message' => "포트폴리오 가져오기 성공"
        ], 200);
    }

    // 데이터 저장
    public function store (PortfolioRequest $request){
        try{

            // 테이블 생성
            $portfolio = Portfolio::create([
                'title' => $request->title,
                'date' => $request->date,
                'category' => $request->category,
                'member' => $request->member,
                'tool' => $request->tool,
                'skill' => $request->skill,
                'develop' => $request->develop,
                'work' => $request->work,
                'url' => $request->url,
                'github' => $request->github,
                'page' => $request->page,
            ]);

            // 생성한 데이터 저장 실패
            if (!$portfolio){
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
    public function show (Portfolio $portfolio) {
        return response()->json([
            'results' => $portfolio,
            'message' => "포트폴리오 가져오기 성공"
        ], 200);
    }

    // 데이터 업데이트
    public function update (Request $request, Portfolio $portfolio) {
        try{

            // 데이터 검증
            $validated = $request->validate([
                'title' => ['required', 'max:1024'],
                'date' => ['required', 'max:1024'],
                'category' => ['required', 'max:1024'],
                'member' => ['required', 'max:256'],
                'tool' => ['required', 'max:256'],
                'skill' => ['required', 'max:1024'],
                'develop' => ['required', 'max:1024'],
                'work' => ['required', 'max:1024'],
                'url' => ['required', 'max:1024'],
                'github' => ['required', 'max:1024'],
                'page' => ['required', 'max:1024'],
            ]);

            // 데이터 업데이트
            $portfolio->update($validated);

            // 포트폴리오 수정 실패
            if (!$portfolio){
                return response()->json([
                    'message' => "포트폴리오 수정 실패했습니다. 다시 시도하세요."
                ],400);
            }

            // 포트폴리오 수정 성공
            return response()->json([
                'message' => "포트폴리오 수정 성공했습니다."
            ],201);

        } catch (\Exception $e){

            // 포트폴리오 작성 실패
            return response()->json([
                "result" => $e,
                'message' => "오류가 있습니다."
            ],500);
        }
    }

    // 데이터 삭제
    public function destroy(Portfolio $portfolio) {
        try{
            // 선택한 데이터 삭제
            $portfolio->delete();

            // 삭제 성공
            return response()->json([
                'message' => "포트폴리오 삭제 완료."
            ],201);

        } catch (\Exception $e){

            // 포트폴리오 삭제 실패
            return response()->json([
                "result" => $e,
                'message' => "오류가 있습니다."
            ],500);
        }
    }


}
