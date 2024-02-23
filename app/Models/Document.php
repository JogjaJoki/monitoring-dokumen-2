<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'documents';

    protected $fillable = [
        'id',
        'user_id',
        'categori_id',
        'nama',
        'keterangan',
        'status'
    ];

    public static function generateDocId(){
        $latestModel = static::latest()->first();

        $lastNumber = $latestModel ? intval(substr($latestModel->id, 4)) : 0;
        $nextNumber = $lastNumber + 1;

        return 'DOC0' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

    public function category(){
        return $this->belongsTo(Category::class, 'categori_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
