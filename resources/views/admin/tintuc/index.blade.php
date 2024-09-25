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
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/super-build/ckeditor.js"></script>
<div class="card mb-4 card-body">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $errors->any() ? 'active' : '' }}" id="them-tin_tuc-tab" data-bs-toggle="tab" data-bs-target="#them-tin_tuc" type="button" role="tab" aria-controls="them-tin_tuc" aria-selected="{{ $errors->any() ? 'true' : 'false' }}">Thêm Tin Mới</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $errors->any() ? '' : 'active' }}" id="danh-sach-tin_tuc-tab" data-bs-toggle="tab" data-bs-target="#danh-sach-tin_tuc" type="button" role="tab" aria-controls="danh-sach-tin_tuc" aria-selected="{{ $errors->any() ? 'false' : 'true' }}">Danh Sách Tin Tức</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade {{ $errors->any() ? 'show active' : '' }}" id="them-tin_tuc" role="tabpanel" aria-labelledby="them-tin_tuc-tab">
            <h2 class="custom-title">Thêm Tin Mới</h2>
            <form action="{{ route('admin.tintuc.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                @if(Auth::check())
                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                @endif
                <div class="col-md-6 mb-3">
                    <label for="loaitin" class="form-label">Chọn Loại Tin</label>
                    <select id="loaitin" name="id_loaitin" class="form-select">
                        <option selected>Chọn loại tin...</option>
                        @foreach($loaiTin as $lt)
                        <option value="{{ $lt->id }}" {{ old('id_loaitin') == $lt->id ? 'selected' : '' }}>{{ $lt->tenloaitin }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('id_loaitin'))
                    <div class="text-danger">{{ $errors->first('id_loaitin') }}</div>
                    @endif
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tieude" class="form-label">Tiêu Đề</label>
                    <input type="text" class="form-control" id="tieude" name="tieude" value="{{ old('tieude') }}">
                    @if ($errors->has('tieude'))
                    <div class="text-danger">{{ $errors->first('tieude') }}</div>
                    @endif
                </div>
                <div class="col-12 mb-3">
                    <label for="tomtat" class="form-label">Tóm Tắt</label>
                    <textarea class="form-control" id="tomtat" name="tomtat" rows="3">{{ old('tomtat') }}</textarea>
                    @if ($errors->has('tomtat'))
                    <div class="text-danger">{{ $errors->first('tomtat') }}</div>
                    @endif
                </div>
                <div class="col-md-12 mb-3">
                    <label for="hinhanh" class="form-label">Hình Ảnh</label>
                    <input type="file" class="form-control" id="hinhanh" name="hinhanh" onchange="previewImage(event)">
                    <img id="imgPreview" class="img-preview mt-3" alt="Hình xem trước">
                    @if ($errors->has('hinhanh'))
                    <div class="text-danger">{{ $errors->first('hinhanh') }}</div>
                    @endif
                </div>
                <div class="col-12 mb-3">
                    <label for="noidung" class="form-label">Nội Dung</label>
                    <textarea class="form-control" id="editor" name="noidung" rows="5">{{ old('noidung') }}</textarea>
                    @if ($errors->has('noidung'))
                    <div class="text-danger">{{ $errors->first('noidung') }}</div>
                    @endif
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
        <div class="tab-pane fade {{ $errors->any() ? '' : 'show active' }}" id="danh-sach-tin_tuc" role="tabpanel" aria-labelledby="danh-sach-tin_tuc-tab">
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
                                <th>Loại Tin</th>
                                <th>Ngày Đăng</th>
                                <th>Tiêu Đề</th>
                                <th>Hình Ảnh</th>
                                <th>Trạng Thái</th>
                                <th>Lượt Xem</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Loại Tin</th>
                                <th>Ngày Đăng</th>
                                <th>Tiêu Đề</th>
                                <th>Hình Ảnh</th>
                                <th>Trạng Thái</th>
                                <th>Lượt Xem</th>
                                <th>Hành Động</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($tinTuc as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->tenloaitin }}</td>
                                <td>{{ $item->ngaydang }}</td>
                                <td>{{ $item->tieude }}</td>
                                <td>
                                    <img src="{{ asset($item->tintuc_hinhanh) }}" alt="{{ $item->tintuc_hinhanh }}" style="width: 100px;">
                                </td>
                                <td> {{ $item->trangthai == 0 ? 'Hiện' : 'Ẩn' }}</td>
                                <td>{{ $item->luot_xem }}</td>

                                <td>
                                    <a href="{{ route('admin.tintuc.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Sửa
                                    </a>
                                    <form action="{{ route('admin.tintuc.delete', $item->id) }}" method="POST" style="display:inline;">
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

<script src="{{ asset('js/ckeditor.js') }}"></script>
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