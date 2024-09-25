<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tin extends Model
{
    use HasFactory;
    protected $table = 'loai_tin';
    protected $fillable = ['tenloaitin', 'id'];

    public static function getAllLoaiTin()
    {
        return self::all();
    }
    public static function getLatestNews()
    {
        return DB::table('tintuc')
            ->join('loai_tin', 'tintuc.id_loaitin', '=', 'loai_tin.id')
            ->select(
                'tintuc.id',
                'tintuc.id_loaitin',
                'tintuc.tieude',
                'tintuc.noidung',
                'tintuc.ngaydang',
                'tintuc.luot_xem',
                'tintuc.trangthai',
                'tintuc.hinhanh as tintuc_hinhanh',
                'tintuc.tomtat',
                'loai_tin.id as loai_tin_id',
                'loai_tin.tenloaitin',
                'loai_tin.hinhanh as loaitin_hinhanh'
            )
            ->orderBy('tintuc.id', 'desc') // Sắp xếp theo ID để lấy tin mới nhất
            ->get();
    }
    public static function laytintrongloaitin()
    {
        return DB::table('tintuc')
            ->join('loai_tin', 'tintuc.id_loaitin', '=', 'loai_tin.id')
            ->select(
                'tintuc.id',
                'tintuc.id_loaitin',
                'tintuc.tieude',
                'tintuc.noidung',
                'tintuc.ngaydang',
                'tintuc.trangthai',
                'tintuc.luot_xem',
                'tintuc.hinhanh as tintuc_hinhanh',
                'tintuc.tomtat',
                'loai_tin.id as loai_tin_id',
                'loai_tin.tenloaitin',
                'loai_tin.hinhanh as loaitin_hinhanh'
            )
            ->whereIn('tintuc.id', function ($query) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('tintuc')
                    ->groupBy('id_loaitin');
            })
            ->orderBy('tintuc.ngaydang', 'desc')
            ->get();
    }
    public static function tin_xemnhieu()
    {
        return DB::table('tintuc')
            ->join('loai_tin', 'tintuc.id_loaitin', '=', 'loai_tin.id')
            ->select(
                'tintuc.id',
                'tintuc.id_loaitin',
                'tintuc.tieude',
                'tintuc.noidung',
                'tintuc.ngaydang',
                'tintuc.luot_xem',
                'tintuc.trangthai',
                'tintuc.hinhanh as tintuc_hinhanh',
                'tintuc.tomtat',
                'loai_tin.id as loai_tin_id',
                'loai_tin.tenloaitin',
                'loai_tin.hinhanh as loaitin_hinhanh'
            )
            ->orderBy('tintuc.luot_xem', 'desc') // Sắp xếp theo số lượt xem giảm dần
            ->get();
    }
    public static function tinNgauNhien()
    {
        return DB::table('tintuc')
            ->join('loai_tin', 'tintuc.id_loaitin', '=', 'loai_tin.id')
            ->select(
                'tintuc.id',
                'tintuc.id_loaitin',
                'tintuc.tieude',
                'tintuc.noidung',
                'tintuc.ngaydang',
                'tintuc.luot_xem',
                'tintuc.trangthai',
                'tintuc.hinhanh as tintuc_hinhanh',
                'tintuc.tomtat',
                'loai_tin.id as loai_tin_id',
                'loai_tin.tenloaitin',
                'loai_tin.hinhanh as loaitin_hinhanh'
            )
            ->inRandomOrder() // Sắp xếp ngẫu nhiên
            ->limit(8) // Lấy 8 bản ghi
            ->get();
    }
    public static function getTinTucByLoaiTinId($id_loaitin)
    {
        return DB::table('tintuc')
            ->join('loai_tin', 'tintuc.id_loaitin', '=', 'loai_tin.id')
            ->select(
                'tintuc.*', // Chọn tất cả cột từ bảng tintuc
                'loai_tin.tenloaitin' // Chọn cột tenloaitin từ bảng loai_tin
            )
            ->where('tintuc.id_loaitin', $id_loaitin)
            ->orderBy('tintuc.ngaydang', 'desc')
            ->get();
    }
}
