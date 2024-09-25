@extends('layouts.admin_layout')

@section('content')

<style>
    .custom-title {
        font-size: 2.5rem;
        /* Tăng kích thước font */
        font-weight: bold;
        /* Chữ đậm */
        color: #343a40;
        /* Màu chữ */
        text-align: center;
        /* Canh giữa */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        /* Đổ bóng chữ */
        padding: 10px 0;
        /* Khoảng cách trên dưới */
        border-bottom: 2px solid #007bff;
        /* Đường kẻ dưới tiêu đề */
        margin-bottom: 20px;
        /* Khoảng cách dưới */
    }

    .img-preview {
        display: none;
        /* Ẩn trước khi chọn ảnh */
        width: 100%;
        /* Đặt chiều rộng hình ảnh */
        max-width: 200px;
        /* Giới hạn chiều rộng tối đa */
        margin-top: 10px;
        /* Khoảng cách trên */
    }
</style>

<div class="card mb-4 card-body">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="them-loai-tin-tab" data-bs-toggle="tab" data-bs-target="#them-loai-tin" type="button" role="tab" aria-controls="them-loai-tin" aria-selected="false">Thêm Loại Tin</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="danh-sach-loai-tin-tab" data-bs-toggle="tab" data-bs-target="#danh-sach-loai-tin" type="button" role="tab" aria-controls="danh-sach-loai-tin" aria-selected="true">Danh Sách Loại Tin</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="them-loai-tin" role="tabpanel" aria-labelledby="them-loai-tin-tab">
            <h2 class="custom-title">Thêm Loại Tin</h2>
            <form action="{{ route('admin.danhmuc.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="tenloaitin" class="form-label">Tên Loại Tin</label>
                    <input type="text" class="form-control" id="tenloaitin" name="tenloaitin" required>
                </div>
                <div class="mb-3">
                    <label for="hinhanh" class="form-label">Hình Ảnh</label>
                    <input type="file" class="form-control" id="hinhanh" name="hinhanh" onchange="previewImage(event)">
                    <img id="imgPreview" class="img-preview" alt="Hình xem trước">
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>

        </div>
        <div class="tab-pane fade show active" id="danh-sach-loai-tin" role="tabpanel" aria-labelledby="danh-sach-loai-tin-tab">
            <div class="card mb-4">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Danh Sách Loại Tin
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Loại Tin</th>
                                <th>Hình Ảnh</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tên Loại Tin</th>
                                <th>Hình Ảnh</th>
                                <th>Hành Động</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($loaiTin as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->tenloaitin }}</td>
                                <td>

                                    <img src="{{ asset($item->hinhanh) }}" alt="{{ $item->tenloaitin }}" style="width: 100px;">
                                </td>
                                <td>
                                    <!-- Liên kết hoặc nút chỉnh sửa và xóa -->
                                    <a href="{{ route('admin.danhmuc.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Sửa
                                    </a>
                                    <form action="{{ route('admin.danhmuc.delete', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i> Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imgPreview');
            output.src = reader.result;
            output.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection