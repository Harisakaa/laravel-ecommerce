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
                        <li class="breadcrumb-item active">Form Input Kategori</li>
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
                    <h3 class="card-title">Input Kategori</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ url('kategori/') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="kdprodi">Nama Kategori</label>
                                    <input type="text" class="form-control" name="nama_kategori" placeholder="Kategori"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="formFileMultiple" class="form-label">Gambar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="gambar" multiple>
                                            <label class="custom-file-label" for="formFileMultiple">Pilih foto...</label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <div class="card-footer clearfix">
                    <button type="submit" class="btn btn-primary ">Simpan</button>
                </div>
            </form>
    </section>
@endsection
