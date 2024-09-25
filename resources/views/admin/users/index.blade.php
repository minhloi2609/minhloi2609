@extends('layouts.admin_layout')

@section('content')
<div class="card mb-4 card-body">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Danh Sách Người Dùng
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Người Dùng</th>
                    <th>Email</th>
                    <th>Vai Trò</th>
                    <th>Ngày Tạo</th>
                    <th>Avatar</th>
                    <th>Trạng Thái</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>STT</th>
                    <th>Tên Người Dùng</th>
                    <th>Email</th>
                    <th>Vai Trò</th>
                    <th>Ngày Tạo</th>
                    <th>Avatar</th>
                    <th>Trạng Thái</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($users as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->role }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <img src="{{ asset($item->img) }}" alt="{{ $item->img }}" style="width: 100px;">
                    </td>
                    <td>
                        <div class="dropdown">

                            @if($item->status == 0)
                            <button class="btn bg-danger dropdown-toggle" type="button" id="dropdownMenuButton{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Khóa </button>
                            @elseif($item->status == 1)
                            <button class="btn bg-primary dropdown-toggle" type="button" id="dropdownMenuButton{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hoạt động </button>
                            @endif

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $item->id }}">
                                <a class="dropdown-item" href="#" onclick="changeStatus(`{{ $item->id }}`, 1)">Hoạt động</a>
                                <a class="dropdown-item" href="#" onclick="changeStatus(`{{ $item->id }}`, 0)">Khóa</a>
                            </div>
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
    function changeStatus(userId, status) {
        $.ajax({
            url: '{{ route("admin.user.changeStatus") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: userId,
                status: status
            },
            success: function(response) {
                if (response.success) {
                    location.reload();
                } else {
                    alert('Có lỗi xảy ra');
                }
            }
        });
    }
</script>
@endsection