<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Sewa extends Model
{
    use HasFactory, HasUuids;

    // protected $keyType = 'string';
    // public $incrementing = false;

    protected $primaryKey = 'id';
    protected $fillable = [
        'users_id',
        'mobils_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'harga_sewa',
    ];

    // protected static function boot()
    // {
    //     parent::boot();
    //     static::creating(function ($model) {
    //         $model->id = Str::uuid();
    //     });
    // }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function mobil(): BelongsTo
    {
        return $this->belongsTo(Mobil::class, 'mobils_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
