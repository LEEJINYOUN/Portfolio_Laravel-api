<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    // 테이블 이름 설정
    protected $table = 'portfolio';

    // 대량할당 될 수 있는 속성 (보안을 위해)
    protected $fillable = [
        'title', 'date', 'category', 'member',
        'tool', 'skill', 'develop', 'work',
        'url', 'github', 'page',
    ];
}