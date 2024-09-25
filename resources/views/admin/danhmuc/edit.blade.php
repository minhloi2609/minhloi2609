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

<div class="card mb-4 card-body">
    <div class="">
        <h2 class="custom-title">Sửa loại tin</h2>
        <form action="{{ route('admin.danhmuc.update', $danhmuc->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Nếu bạn đang sử dụng phương thức PUT để cập nhật -->
            <div class="mb-3">
                <label for="tenloaitin" class="form-label">Tên Loại Tin</label>
                <input type="text" class="form-control" id="tenloaitin" name="tenloaitin" value="{{ $danhmuc->tenloaitin }}">
            </div>
            <div class="mb-3">
                <label for="hinhanh" class="form-label">Hình Ảnh</label>
                <input type="file" class="form-control" id="hinhanh" name="hinhanh" onchange="previewImage(event)">

                <img id="imgPreview" class="img-preview" src="{{ asset($danhmuc->hinhanh) }}" alt="Hình hiện tại">

            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </form>
    </div>
</div>

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