<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // 현재 유저가 저장이 가능한 지 검사
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    //  유효성 검사 설정
    public function rules(): array
    {
        if (request()->isMethod('post')){
            return [
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
            ];
        } else {
            return [
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
            ];
        }
    }

    // 메세지 출력
    public function message()
    {
        if (request()->isMethod('post')){
            return [
                'title.required' => '제목을 입력하세요.',
                'date.required' => '기간을 입력하세요.',
                'category.required' => '카테고리를 입력하세요.',
                'member.required' => '멤버 수를 입력하세요.',
                'tool.required' => '툴을 입력하세요.',
                'skill.required' => '스킬을 입력하세요.',
                'develop.required' => '배포를 입력하세요.',
                'work.required' => '업무를 입력하세요.',
                'url.required' => '이미지 경로를 입력하세요.',
                'github.required' => '깃허브를 입력하세요.',
                'page.required' => '페이지를 입력하세요.',
            ];
        } else {
            return [
                'title.required' => '제목을 입력하세요.',
                'date.required' => '기간을 입력하세요.',
                'category.required' => '카테고리를 입력하세요.',
                'member.required' => '멤버 수를 입력하세요.',
                'tool.required' => '툴을 입력하세요.',
                'skill.required' => '스킬을 입력하세요.',
                'develop.required' => '배포를 입력하세요.',
                'work.required' => '업무를 입력하세요.',
                'url.required' => '이미지 경로를 입력하세요.',
                'github.required' => '깃허브를 입력하세요.',
                'page.required' => '페이지를 입력하세요.',
            ];
        }
    }
}
