<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loaiTin = DanhMuc::getAllLoaiTin();

        return view('admin.danhmuc.index', compact('loaiTin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.danhmuc.themdanhmuc');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validated = $request->validate([
            'tenloaitin' => 'required|string|max:255',
            'hinhanh' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Kiểm tra xem tenloaitin đã tồn tại chưa
        $existingLoaiTin = DB::table('loai_tin')
            ->where('tenloaitin', $validated['tenloaitin'])
            ->first();

        if ($existingLoaiTin) {
            return redirect()->back()->with('error', 'Danh mục đã tồn tại.')->withInput();
        }

        // Lưu hình ảnh
        $imageName = 'danhmuc' . time() . '.' . $request->file('hinhanh')->extension();
        $imagePath = $request->file('hinhanh')->storeAs('public/upload', $imageName);

        // Lưu dữ liệu vào cơ sở dữ liệu
        DB::table('loai_tin')->insert([
            'tenloaitin' => $validated['tenloaitin'],
            'hinhanh' => 'storage/upload/' . $imageName
        ]);

        return redirect()->route('admin.danhmuc.index')->with('success', 'Danh mục đã được thêm thành công.');
    }


    public function delete($id)
    {
        // Tìm danh mục theo ID và xóa
        $danhmuc = DanhMuc::find($id);

        if ($danhmuc) {
            $imagePath = $danhmuc->hinhanh;
            if (file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }
            $danhmuc->delete();
            return redirect()->route('admin.danhmuc.index')->with('success', 'Danh mục đã được xóa thành công.');
        }
        return redirect()->route('admin.danhmuc.index')->with('error', 'Danh mục không tồn tại.');
    }


    /**
     * Display the specified resource.
     */
    public function show(DanhMuc $danhMuc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $danhmuc = DB::table('loai_tin')->where('id', $id)->first();
        if (!$danhmuc) {
            return redirect()->route('admin.danhmuc.index')->with('error', 'Danh mục không tồn tại.');
        }
        return view('admin.danhmuc.edit', compact('danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // Xác thực dữ liệu đầu vào
        $validated = $request->validate([
            'tenloaitin' => 'required|string|max:255',
            'hinhanh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Tìm danh mục theo ID
        $danhmuc = DB::table('loai_tin')->where('id', $id)->first();



        // Xử lý hình ảnh mới (nếu có)
        if ($request->hasFile('hinhanh')) {
            // Xóa hình ảnh cũ nếu có
            $oldImagePath = public_path($danhmuc->hinhanh);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Lưu hình ảnh mới
            $imageName = 'danhmuc' . time() . '.' . $request->file('hinhanh')->extension();
            $imagePath = $request->file('hinhanh')->storeAs('public/upload', $imageName);
            $img = 'storage/upload/' . $imageName;
        } else {
            $img = $danhmuc->hinhanh;
        }
        // Cập nhật dữ liệu vào cơ sở dữ liệu
        $alo = DB::table('loai_tin')->where('id', $id)->update([
            'tenloaitin' => $validated['tenloaitin'],
            'hinhanh' => $img
        ]);
        return redirect()->route('admin.danhmuc.index')->with('success', 'Danh mục đã được cập nhật thành công.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DanhMuc $danhMuc)
    {
        //
    }
}
