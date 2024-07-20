@extends('admin.layouts.index')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="content-header">{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Form Input Pemasok</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Input Pemasok</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ url('pemasok/') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="kdprodi">Kode Pemasok</label>
                                    <input type="text" class="form-control" name="kode_pemasok" placeholder="Kode Pemasok"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="kdprodi">Nama Pemasok</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Pemasok"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="kdprodi">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="Alamat"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="kdprodi">No HP</label>
                                    <input type="text" class="form-control" name="nohp" placeholder="No HP"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="kdprodi">TOP</label>
                                    <input type="text" class="form-control" name="top" placeholder="TOP"
                                        required>
                                </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <div class="card-footer clearfix">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </form>
    </section>
@endsection
