<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Не смог добиться качественной совместной работы двух фабрик в тесте
 * в случае с hasOne. Переделал на belongsTo. К тому же думаю, что
 * логически такое отношение между заказом и менеджером более корректно
 */
class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function manager(): BelongsTo
    {
        return $this->belongsTo(Manager::class);
    }
}
