<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;
    protected $table = 'loai_tin';
    protected $fillable = ['id', 'tenloaitin', 'hinhanh'];

    public static function getAllLoaiTin()
    {
        return self::all();
    }
}
