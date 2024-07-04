<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PortfolioDes extends Model
{
    use HasFactory;

    // 테이블 이름 설정
    protected $table = 'portfolio_des';

    // 대량할당 될 수 있는 속성 (보안을 위해)
    protected $fillable = [
        'portfolio_id', 'des',
    ];

    // 설명과 포트폴리오의 관계 함수 (다수 대 일)
    public function portfolio(): BelongsTo{
        return $this->belongsTo(Portfolio::class);
    }
}
