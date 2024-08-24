@extends('admin.layout')
@section('title', 'Danh sách Màu Sắc')
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách Màu Sắc</h3>
                            </div>
                            <h1></h1>
                            @if (session('message'))
                                <h2 class="alert alert-success">
                                    {{ session('message') }}
                                </h2>
                            @endif
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#ID</th>
                                            <th scope="col">Tên</th>
                                         
                                          
                                            <th scope="col">
                                                <a href="{{ route('admin.color.create') }}" class="btn btn-primary">
                                                    Thêm mới
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($colors as $color)
                                            <tr>
                                                <th scope="row">{{ $color->id }}</th>
                                                <td>{{ $color->name }}</td>

                                                <td class="d-flex">
                                                    <a href="{{ route('admin.color.edit', $color->id) }}"
                                                        class="btn btn-primary mr-3">Edit</a>
                                                    <form action="{{ route('admin.color.destroy', $color) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Bạn có muốn xóa không')"
                                                            type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{ $colors->links() }}
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
