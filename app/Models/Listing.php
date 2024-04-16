<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'beds',
        'baths',
        'area',
        'city',
        'code',
        'street',
        'street_nr',
        'price',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query->when(
            $filters['priceFrom'] ?? false,
            fn($query, $priceFrom) => $query->where('price', '>=', $priceFrom)
        )->when(
            $filters['priceTo'] ?? false,
            fn($query, $priceTo) => $query->where('price', '<=', $priceTo)
        )->when(
            $filters['beds'] ?? false,
            fn($query, $beds) => $query->where('beds', $beds)
        )->when(
            $filters['baths'] ?? false,
            fn($query, $baths) => $query->where('baths', $baths)
        )->when(
            $filters['areaFrom'] ?? false,
            fn($query, $areaFrom) => $query->where('area', '>=', $areaFrom)
        )->when(
            $filters['areaTo'] ?? false,
            fn($query, $areaTo) => $query->where('area', '<=', $areaTo)
        );
    }
}
