{{-- @extends('admin.layouts.index')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="content-header">{{$title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Kategori</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h2 class="card-title">Kategori </h2>
                            <a href="{{ '/kategori/create' }}" class="btn btn-success ml-auto"><i
                                    class="fas fa-regular fa-plus"></i>
                                Tambah Kategori</a>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th class="text-sm">No</th>
                                  <th class="text-sm">Nama Kategori</th>
                                  <th class="text-sm text-center">Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($rec as $key => $value)
                                <tr>
                                    <td>{{ $rec->firstItem() + $key }}</td>
                                    <td>{{ $value->nama_kategori}}</td>
                                    <td class="text-center">
                                        <a href="{{ url('kategori/' . $value->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                                        <form action="{{ route('kategori.destroy', $value->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                          <div class="card-footer clearfix">
                            <a href="{{ '/produk/input' }}" class="btn btn-secondary ml-auto"><i
                                class=" nav-icon fas fa-caret-left"></i> Kembali</a>
                            <ul class="pagination pagination-sm m-0 float-right">
                              <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                          </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
 --}}

@extends('admin.layouts.index')
@section('content')
<section class="content-main">
    <div class="content-header">
      <div>
        <h2 class="content-title card-title">{{$title}}</h2>
        <p>Add, edit or delete a category</p>
      </div>
      <div>
        <input class="form-control bg-white" type="text" placeholder="Search Categories">
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-3">
            <form action="{{ url('kategori/') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
            <div class="mb-4">
              <label class="form-label" for="product_name">Nama Kategori</label>
              <input class="form-control" name="nama_kategori" type="text" placeholder="Type here" required>
            </div>
            <div class="card-body">
                <div class="input-upload text-center">
                    <div id="image-preview-container">
                        <!-- Pratinjau gambar akan ditampilkan di sini -->
                    </div>
                    <img src="{{ asset('admin-page/assets/imgs/theme/upload.svg') }}" alt="Upload Placeholder" id="upload-placeholder" class="img-fluid" style="max-width: 150px; margin: auto; display: block;">
                    <input class="form-control" type="file" name="gambar" onchange="previewImages(event)">
                </div>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Buat Kategori</button>
            </div>
        </form>
          </div>
          <div class="col-md-9">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center">
                    </th>
                    <th>Nama Kategori</th>
                    <th class="text-end">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($rec as $key => $value)
                  <tr>
                    <td class="text-center">
                    </td>
                    <td><b>{{ $value->nama_kategori}}</b></td>
                    <td class="text-end">
                      <div class="dropdown">
                        <a class="btn btn-light rounded btn-sm font-sm" href="#" data-bs-toggle="dropdown"><i class="material-icons md-more_horiz"></i></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Edit info</a>
                            <form action="{{ route('kategori.destroy', $value->id) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="dropdown-item text-danger">Hapus</button>
                            </form>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="pagination-area mt-30">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{ $rec->links('components.paginator') }}
                    </ul>
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
