<?php

namespace App\Http\Controllers;

use App\Models\Tin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tinTuc = Tin::getLatestNews();
        return  view('admin.tintuc.index', compact('tinTuc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validated = $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_loaitin' => 'required|integer|exists:loai_tin,id',
            'tieude' => 'required|string|max:255',
            'tomtat' => 'required|string|max:1000',
            'noidung' => 'required|string',
            'hinhanh' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Lưu hình ảnh nếu có
        $imageName = null;
        if ($request->hasFile('hinhanh')) {
            $imageName = 'tintuc' . time() . '.' . $request->file('hinhanh')->extension();
            $request->file('hinhanh')->storeAs('public/upload', $imageName);
            $imagePath = 'storage/upload/' . $imageName;
        }

        // Lưu dữ liệu vào cơ sở dữ liệu
        DB::table('tintuc')->insert([
            'id_loaitin' => $validated['id_loaitin'],
            'tieude' => $validated['tieude'],
            'tomtat' => $validated['tomtat'],
            'noidung' => $validated['noidung'],
            'ngaydang' => now(), // Sử dụng ngày hiện tại
            'hinhanh' => $imagePath ?? null,
            'id_user' => $request->input('id_user'),
        ]);

        // Nếu không có lỗi thì chuyển hướng đến trang danh sách tin tức
        return redirect()->route('admin.tintuc.index')->with('success', 'Tin tức đã được thêm thành công.');
    }

    public function delete($id)
    {
        // Tìm tin tức theo ID và xóa
        $tinTuc = DB::table('tintuc')->where('id', $id)->first();

        if ($tinTuc) {
            $imagePath = $tinTuc->hinhanh;
            if (file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }
            DB::table('tintuc')->where('id', $id)->delete();
            return redirect()->route('admin.tintuc.index')->with('success', 'Tin tức đã được xóa thành công.');
        }
        return redirect()->route('admin.tintuc.index')->with('error', 'Tin tức không tồn tại.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Tin $tin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tintuc = DB::table('tintuc')->where('id', $id)->first();
        if (!$tintuc) {
            return redirect()->route('admin.tintuc.index')->with('error', 'Danh mục không tồn tại.');
        }
        return view('admin.tintuc.edit', compact('tintuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu đầu vào
        $validated = $request->validate([
            'id_loaitin' => 'required|integer|exists:loai_tin,id',
            'tieude' => 'required|string|max:255',
            'tomtat' => 'required|string',
            'noidung' => 'required|string',
            'hinhanh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Hình ảnh là tùy chọn
            'trangthai' => 'required|in:0,1', // Xác thực trạng thái
        ]);

        // Tìm tin tức theo ID
        $tinTuc = DB::table('tintuc')->where('id', $id)->first();

        // Xử lý hình ảnh mới (nếu có)
        if ($request->hasFile('hinhanh')) {
            // Xóa hình ảnh cũ nếu có
            $oldImagePath = public_path($tinTuc->hinhanh);
            if (file_exists($oldImagePath)) {
                try {
                    unlink($oldImagePath);
                } catch (\Exception $e) {
                    // Nếu không thể xóa hình ảnh cũ, ghi log hoặc xử lý lỗi tùy theo yêu cầu của bạn
                    Log::error("Không thể xóa tập tin: " . $e->getMessage());
                }
            }

            // Lưu hình ảnh mới
            $imageName = 'tintuc' . time() . '.' . $request->file('hinhanh')->extension();
            $imagePath = $request->file('hinhanh')->storeAs('public/upload', $imageName);
            $img = 'storage/upload/' . $imageName;
        } else {
            $img = $tinTuc->hinhanh;
        }


        // Cập nhật dữ liệu vào cơ sở dữ liệu
        DB::table('tintuc')->where('id', $id)->update([
            'id_loaitin' => $validated['id_loaitin'],
            'tieude' => $validated['tieude'],
            'tomtat' => $validated['tomtat'],
            'noidung' => $validated['noidung'],
            'hinhanh' => $img,
            'trangthai' => $validated['trangthai'], // Cập nhật trạng thái
        ]);

        return redirect()->route('admin.tintuc.index')->with('success', 'Tin tức đã được cập nhật thành công.');
    }
}
