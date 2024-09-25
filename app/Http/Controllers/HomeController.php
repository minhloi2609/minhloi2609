<?php

namespace App\Http\Controllers;

use App\Models\Tin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LDAP\Result;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $firstTin = Tin::laytintrongloaitin()->first();
        $nextFourTin = Tin::laytintrongloaitin()->skip(1)->take(4);
        $NewsTin = Tin::getLatestNews()->skip(5)->take(6);
        $manyViews = Tin::tin_xemnhieu()->take(10);
        $tinNgauNhien = Tin::tinNgauNhien();
        return view('client.home', compact('firstTin', 'nextFourTin', 'NewsTin', 'manyViews', 'tinNgauNhien'));
    }
    public function admin()
    {
        $totalUsers = DB::table('users')->count();
        $totalPosts = DB::table('tintuc')->count();
        $totalComments = DB::table('binhluan')->count();
        $totalCategories = DB::table('loai_tin')->count();
        $totalViews = DB::table('tintuc')->sum('luot_xem');

        return view('admin.home', compact('totalUsers', 'totalPosts', 'totalComments', 'totalCategories', 'totalViews'));
        // return view('admin.home');
    }
    public function detail($id)
    {
        $result = DB::table('tintuc')
            ->join('users', 'tintuc.id_user', '=', 'users.id')
            ->where('tintuc.id', $id)
            ->select('tintuc.*', 'users.name as user_name')
            ->first();
        // Lấy danh sách bình luận liên quan đến tin tức
        $xemnhieu = DB::table('tintuc')
            ->orderBy('luot_xem', 'desc')
            ->limit(5)
            ->get();
        $comments = DB::table('binhluan')
            ->join('users', 'binhluan.id_user', '=', 'users.id')
            ->where('binhluan.id_tintuc', $id)
            ->where('binhluan.trangthai', '1')
            ->select('binhluan.*', 'users.name as user_name', 'users.img as user_img')
            ->orderBy('binhluan.ngaybinhluan', 'desc') // Sắp xếp theo ngày bình luận mới nhất
            ->get();


        if ($result) {
            // Cập nhật số lượt xem
            DB::table('tintuc')
                ->where('id', $id)
                ->increment('luot_xem');
        }
        return view('client.detail', compact('result', 'comments', 'xemnhieu'));
    }
    public function showByCategory($id_loaitin)
    {
        $loaitin = DB::table('loai_tin')->where('id', $id_loaitin)->first();
        $tintuc = Tin::getTinTucByLoaiTinId($id_loaitin);
        $xemnhieu = DB::table('tintuc')
            ->orderBy('luot_xem', 'desc')
            ->limit(5)
            ->get();
        return view('client.category', compact('tintuc', 'loaitin', 'xemnhieu'));
    }
    public function contact()
    {
        $xemnhieu = DB::table('tintuc')
            ->orderBy('luot_xem', 'desc')
            ->limit(5)
            ->get();
        return view('client.contact', compact('xemnhieu'));
    }
    public function search(Request $request)
    {
        $keyword = $request->input('text');

        // Truy vấn cơ sở dữ liệu
        $results = DB::table('tintuc')
            ->where('tieude', 'like', '%' . $keyword . '%')
            ->orWhere('noidung', 'like', '%' . $keyword . '%')
            ->get();
        $xemnhieu = DB::table('tintuc')
            ->orderBy('luot_xem', 'desc')
            ->limit(5)
            ->get();
        // Trả về view với kết quả tìm kiếm
        return view('client.search', compact('results', 'keyword', 'xemnhieu'));
    }
}
