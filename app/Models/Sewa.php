<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sewa extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'tanggal_mulai',
        'tanggal_selesai',
        'id_mobil',
        'harga_sewa',
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

    public function mobil()
    {
        return $this->hasOne(Mobil::class);
    }
}
