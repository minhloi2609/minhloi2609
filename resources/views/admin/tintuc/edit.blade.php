@extends('layouts.admin_layout')

@section('content')
<style>
    .custom-title {
        font-size: 2.5rem;
        font-weight: bold;
        color: #343a40;
        text-align: center;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        padding: 10px 0;
        border-bottom: 2px solid #007bff;
        margin-bottom: 20px;
    }

    .img-preview {
        display: block;
        /* Hiển thị hình ảnh hiện tại ngay lập tức */
        width: 100%;
        max-width: 200px;
        margin-top: 10px;
    }
</style>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/super-build/ckeditor.js"></script>

<div class="card mb-4 card-body">
    <h2 class="custom-title">Sửa Tin Tức</h2>
    <form action="{{ route('admin.tintuc.update', $tintuc->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT')
        <div class="col-md-6 mb-3">
            <label for="loaitin" class="form-label">Chọn Loại Tin</label>
            <select id="loaitin" name="id_loaitin" class="form-select">
                <option disabled>Chọn loại tin...</option>
                @foreach($loaiTin as $lt)
                <option value="{{ $lt->id }}" {{ $tintuc->id_loaitin == $lt->id ? 'selected' : '' }}>{{ $lt->tenloaitin }}</option>
                @endforeach
            </select>
            @if ($errors->has('id_loaitin'))
            <div class="text-danger">{{ $errors->first('id_loaitin') }}</div>
            @endif
        </div>
        <div class="col-md-6 mb-3">
            <label for="tieude" class="form-label">Tiêu Đề</label>
            <input type="text" class="form-control" id="tieude" name="tieude" value="{{ old('tieude', $tintuc->tieude) }}">
            @if ($errors->has('tieude'))
            <div class="text-danger">{{ $errors->first('tieude') }}</div>
            @endif
        </div>
        <div class="col-12 mb-3">
            <label for="tomtat" class="form-label">Tóm Tắt</label>
            <textarea class="form-control" id="tomtat" name="tomtat" rows="3">{{ old('tomtat', $tintuc->tomtat) }}</textarea>
            @if ($errors->has('tomtat'))
            <div class="text-danger">{{ $errors->first('tomtat') }}</div>
            @endif
        </div>
        <div class="col-md-6 mb-3">
            <label for="hinhanh" class="form-label">Hình Ảnh</label>
            <input type="file" class="form-control" id="hinhanh" name="hinhanh" onchange="previewImage(event)">
            <img id="imgPreview" class="img-preview" src="{{ asset($tintuc->hinhanh) }}" alt="Hình hiện tại">
            @if ($errors->has('hinhanh'))
            <div class="text-danger">{{ $errors->first('hinhanh') }}</div>
            @endif
        </div>
        <div class="col-md-6 mb-3">
            <label for="trangthai" class="form-label">Trạng Thái</label>
            <select class="form-select" id="trangthai" name="trangthai">
                <option value="0" {{ old('trangthai', $tintuc->trangthai) == 0 ? 'selected' : '' }}>Hiện</option>
                <option value="1" {{ old('trangthai', $tintuc->trangthai) == 1 ? 'selected' : '' }}>Ẩn</option>
            </select>
            @if ($errors->has('trangthai'))
            <div class="text-danger">{{ $errors->first('trangthai') }}</div>
            @endif
        </div>

        <div class="col-12 mb-3">
            <label for="noidung" class="form-label">Nội Dung</label>
            <textarea class="form-control" id="editor" name="noidung" rows="5">{{ old('noidung', $tintuc->noidung) }}</textarea>
            @if ($errors->has('noidung'))
            <div class="text-danger">{{ $errors->first('noidung') }}</div>
            @endif
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </div>
    </form>
</div>
<script src="{{ asset('js/ckeditor.js') }}"></script>
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imgPreview');
            output.src = reader.result;
            output.style.display = 'block'; // Đảm bảo hình ảnh được hiển thị
        }
        if (event.target.files && event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }
</script>

@endsection