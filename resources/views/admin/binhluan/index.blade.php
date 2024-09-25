@extends('layouts.admin_layout')

@section('content')
<div class="card mb-4 card-body">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Danh Sách Bình Luận
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Mã Bình Luận</th>
                    <th>Mã Tin Tức</th>
                    <th>Nội Dung</th>
                    <th>Ngày Bình Luận</th>
                    <th>Mã Khách Hàng</th>
                    <th>Trạng Thái</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Mã Bình Luận</th>
                    <th>Mã Tin Tức</th>
                    <th>Nội Dung</th>
                    <th>Ngày Bình Luận</th>
                    <th>Mã Khách Hàng</th>
                    <th>Trạng Thái</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($Comments as $item)
                <tr>
                    <td>BL-{{ $item->id }}</td>
                    <td>TT-{{ $item->id_tintuc }}</td>
                    <td>{{ $item->noidung }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->ngaybinhluan)->format('d-m-Y H:i:s') }}</td>
                    <td>KH-{{ $item->id_user }}</td>
                    <td>
                        @if($item->trangthai == 0)
                        <button class="btn bg-danger dropdown-toggle" type="button" id="dropdownMenuButton{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ẩn</button>
                        @elseif($item->trangthai == 1)
                        <button class="btn bg-primary dropdown-toggle" type="button" id="dropdownMenuButton{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hiện</button>
                        @endif

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $item->id }}">
                            <a class="dropdown-item" href="#" onclick="changeComment(`{{ $item->id }}`, 1)">Hiện</a>
                            <a class="dropdown-item" href="#" onclick="changeComment(`{{ $item->id }}`, 0)">Ẩn</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    function changeComment(binhluanId, trangthai) {
        $.ajax({
            url: '{{ route("admin.comment.changeComment") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: binhluanId,
                trangthai: trangthai
            },
            success: function(response) {
                if (response.success) {
                    location.reload();
                } else {
                    alert('Có lỗi xảy ra');
                }
            },
            error: function(xhr) {
                alert('Có lỗi xảy ra: ' + xhr.responseText);
            }
        });
    }
</script>
@endsection