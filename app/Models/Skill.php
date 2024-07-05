<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    // 테이블 이름 설정
    protected $table = 'skill';

    // 대량할당 될 수 있는 속성 (보안을 위해)
    protected $fillable = [
        'title', 'category', 'url'
    ];
}
