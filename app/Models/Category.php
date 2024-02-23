<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'categories';

    protected $fillable = [
        'id',
        'nama'
    ];

    public static function generateCadId(){
        $latestModel = static::latest()->first();

        $lastNumber = $latestModel ? intval(substr($latestModel->id, 4)) : 0;
        $nextNumber = $lastNumber + 1;

        return 'CAD0' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }
}
