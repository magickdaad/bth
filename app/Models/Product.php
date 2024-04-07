<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


#[ObservedBy(ProductObserver::class)]
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'deleted_at' => 'datetime',
        'data' => 'array'
    ];

    protected $fillable = ['article', 'name', 'status', 'data'];


    public function scopeAvailable(Builder $query): void
    {
        $query->where('status', '=', 'available');
    }


}
