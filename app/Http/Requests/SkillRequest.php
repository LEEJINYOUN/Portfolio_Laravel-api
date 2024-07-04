<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
                'url' => ['required', 'max:1024'],
            ];
        } else {
            return [
                'title' => ['required', 'max:1024'],
                'url' => ['required', 'max:1024'],
            ];
        }
    }

    // 메세지 출력
    public function message()
    {
        if (request()->isMethod('post')){
            return [
                'title.required' => '제목을 입력하세요.',
                'url.required' => '이미지 경로를 입력하세요.',
            ];
        } else {
            return [
                'title.required' => '제목을 입력하세요.',
                'url.required' => '이미지 경로를 입력하세요.',
            ];
        }
    }
}