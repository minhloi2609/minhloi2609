@extends('layouts.admin_layout')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Trang chủ Admin</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Trang chủ</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Tổng số người dùng</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="h5 mb-0 font-weight-bold">{{ $totalUsers }}</div>
                    <a class="small text-white stretched-link" href="{{ route('admin.user.index') }}">Chi tiết</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Tổng số bài viết</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="h5 mb-0 font-weight-bold">{{ $totalPosts }}</div>
                    <a class="small text-white stretched-link" href="{{ route('admin.tintuc.index') }}">Chi tiết</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Tổng số bình luận</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="h5 mb-0 font-weight-bold">{{ $totalComments }}</div>
                    <a class="small text-white stretched-link" href="{{ route('admin.comment.index') }}">Chi tiết</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Tổng số danh mục</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="h5 mb-0 font-weight-bold">{{ $totalCategories }}</div>
                    <a class="small text-white stretched-link" href="{{ route('admin.danhmuc.index') }}">Chi tiết</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">Tổng số lượt xem</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="h5 mb-0 font-weight-bold">{{ $totalViews }}</div>
                    <a class="small text-white stretched-link" href="{{ route('admin.tintuc.index') }}">Chi tiết</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Biểu đồ vùng
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Biểu đồ cột
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
@endsection