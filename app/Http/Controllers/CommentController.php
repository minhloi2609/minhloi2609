<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function loadMoreComments(Request $request)
    {
        try {
            $page = $request->input('page', 1);
            $perPage = 3; // Số bình luận mỗi lần tải thêm
            $id_tintuc = $request->input('id_tintuc');
            $skip = ($page - 1) * $perPage + 3; // Bỏ qua số lượng bình luận đã hiển thị

            $comments = DB::table('binhluan')
                ->join('users', 'binhluan.id_user', '=', 'users.id')
                ->where('binhluan.id_tintuc', $id_tintuc)
                ->where('binhluan.trangthai', '1')
                ->select('binhluan.*', 'users.name as user_name', 'users.img as user_img')
                ->orderBy('binhluan.ngaybinhluan', 'desc') // Sắp xếp theo ngày bình luận mới nhất
                ->skip($skip)
                ->take($perPage)
                ->get();



            return response()->json([
                'comments' => $comments,
                'hasMore' => $comments->count() == $perPage
            ]);
        } catch (\Exception $e) {
            // Log lỗi và trả về thông báo lỗi
            // \Log::error('Lỗi khi lấy bình luận: ' . $e->getMessage());
            return response()->json(['error' => 'Đã xảy ra lỗi'], 500);
        }
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Comments = DB::table('binhluan')
            ->orderBy('id', 'desc')
            ->get();
        return view('admin.binhluan.index', compact('Comments'));
    }
    public function changeComment(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|exists:binhluan,id',
            'trangthai' => 'required|integer|in:0,1'
        ]);

        $result = DB::table('binhluan')
            ->where('id', $request->input('id'))
            ->update(['trangthai' => $request->input('trangthai')]);

        return response()->json(['success' => $result > 0]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_tintuc' => 'required|exists:tintuc,id',
            'noidung' => 'required|string|max:500',
        ]);

        // Lưu bình luận vào cơ sở dữ liệu
        $dd =  DB::table('binhluan')->insert([
            'id_user' => $request->input('id_user'),
            'id_tintuc' => $request->input('id_tintuc'),
            'noidung' => $request->input('noidung'),
            'trangthai' => $request->input('trangthai'),
            'ngaybinhluan' => now(),
        ]);

        return redirect()->back()->with('success', 'Bình luận đã được gửi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
