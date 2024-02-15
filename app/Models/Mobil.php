<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Mobil extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        'merek',
        'model',
        'plat',
        'tarif_sewa',
    ];

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

    public function sewa()
    {
        return $this->belongsTo(Sewa::class);
    }
}
