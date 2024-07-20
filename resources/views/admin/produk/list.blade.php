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
                        <li class="breadcrumb-item active">Stok Produk</li>
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
                            <h2 class="card-title"> Produk </h2>
                            <a href="{{ '/stok/create' }}" class="btn btn-success ml-auto"><i
                                    class="fas fa-regular fa-plus"></i>
                                Tambah Stok</a>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th class="text-sm">No</th>
                                  <th class="text-sm">Kode Stok</th>
                                  <th class="text-sm">Nama Stok</th>
                                  <th class="text-sm">Saldo Awal</th>
                                  <th class="text-sm">Harga Beli</th>
                                  <th class="text-sm">Harga Jual</th>
                                  <th class="text-sm">Harga Modal</th>
                                  <th class="text-sm">Kategori</th>
                                  <th class="text-sm">Satuan</th>
                                  <th class="text-sm">Deskripsi Barang</th>
                                  <th class="text-sm">Pajang</th>
                                  <th class="text-sm">Foto Produk</th>
                                  <th class="text-sm text-center">Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($rec as $key => $value)
                                <tr>
                                    <td>{{ $rec->firstItem() + $key }}</td>
                                    <td>{{ $value->kode_stok}}</td>
                                    <td>{{ $value->nama_stok}}</td>
                                    <td>{{ $value->saldo_awal}}</td>
                                    <td>{{ number_format($value->harga_beli, 0, ',', '.') }}</td>
                                    <td>{{ number_format($value->harga_jual, 0, ',', '.') }}</td>
                                    <td>{{ number_format($value->harga_modal, 0, ',', '.') }}</td>
                                    <td>{{ $value->nama_kategori}}</td>
                                    <td>{{ $value->nama_satuan}}</td>
                                    <td>{{ $value->deskripsi}}</td>
                                    <td>{{ $value->pajang}}</td>
                                    <td>
                                        @foreach (explode(',', $value->foto) as $foto)
        <img src="{{ asset('fotoProduk/' . $foto) }}" alt="Foto Produk" data-bs-toggle="modal" data-bs-target="#kk" style="width: 100px; height: auto; margin-bottom: 10px;">
        @endforeach
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ url('stok/' . $value->id_stok) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                                        <form action="{{ route('stok.destroy', $value->id_stok) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                          <div class="card-footer clearfix">
                            <a href="{{ '/' }}" class="btn btn-secondary ml-auto"><i
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
@endsection --}}

@extends('admin.layouts.index')
@section('content')
<style>
    .carousel-control-prev-icon  {
        background-color: black;
    }
    .carousel-control-next-icon {
        background-color: black;
    }

    th {
        font-weight: 600;
    }
    tr {
        border-bottom: 1px solid #dee2e6;
    }
</style>
    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">{{ $title }}</h2>
            </div>
            <div><a class="btn btn-primary btn-sm rounded" href="{{ '/stok/create' }}">+ Tambah Produk</a></div>
        </div>
        <div class="card mb-4">
            <header class="card-header">
                <form id="filterForm" method="GET" action="{{ route('stok.index') }}">
                <div class="row align-items-center">

                    <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                        <div class="custom_select">
                            <select class="form-select select-nice" name="category" onchange="document.getElementById('filterForm').submit();">
                                <option value="">Semua Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->nama_kategori }}" {{ $selectedCategory == $category->nama_kategori ? 'selected' : '' }}>{{ $category->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 col-6">
                        <input class="form-control" type="date" name="date" value="{{ $selectedDate }}" onchange="document.getElementById('filterForm').submit();">
                    </div>
                </div>
            </form>
            </header>

            <!-- card-header end//-->
            <div class="card-body">
                @foreach ($data as $key => $value)
                    <form action="{{ route('stok.destroy', $value->id_stok) }}" method="POST" id="delete-form-{{ $value->id_stok }}">
                        <article class="itemlist">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name">
                                    <a class="itemside" href="#">
                                        <div class="left">
                                            <img class="img-sm img-thumbnail" src="{{ asset('fotoProduk/' . explode(',', $value->foto)[0]) }}" alt="Item">
                                        </div>
                                        <div class="info">
                                            <h6 class="mb-0">{{ $value->nama_stok }}</h6>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-1 col-sm-2 col-4 col-price"><span>{{ $value->saldo_awal }}</span></div>
                                <div class="col-lg-2 col-sm-2 col-4 col-price"><span>Rp{{ number_format($value->harga_jual, 0, ',', '.') }}</span></div>
                                <div class="col-lg-2 col-sm-2 col-4 col-price"><span>{{ $value->nama_kategori }}</span></div>
                                <div class="col-lg-3 col-sm-1 col-1 col-action text-end">
                                    <a class="btn btn-sm font-sm rounded btn-brand mr-5" href="#" data-toggle="modal" data-target="#detailModal{{ $value->id_stok }}">
                                        <i class="material-icons md-visibility"></i>
                                    </a>
                                    <a class="btn btn-sm font-sm rounded btn-brand mr-5" href="{{ url('stok/' . $value->id_stok) }}">
                                        <i class="material-icons md-edit"></i> Edit
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-sm font-sm btn-light rounded" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $value->id_stok }}').submit();">
                                        <i class="material-icons md-delete_forever"></i> Hapus
                                    </a>
                                </div>
                            </div>
                        </article>
                    </form>
                @endforeach
            </div>
        </div>

        @foreach ($data as $value)
        <div class="modal fade" id="detailModal{{ $value->id_stok }}" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle{{ $value->id_stok }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalTitle{{ $value->id_stok }}">Detail Produk: {{ $value->nama_stok }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- Gambar Produk -->
                            <div class="col-md-6">
                                <div id="carouselExampleIndicators{{ $value->id_stok }}" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach(explode(',', $value->foto) as $index => $photo)
                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                <img class="d-block w-100" src="{{ asset('fotoProduk/' . $photo) }}" alt="Slide {{ $index }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators{{ $value->id_stok }}" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators{{ $value->id_stok }}" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <!-- Detail Produk dalam Tabel -->
                            <div class="col-md-6">
                                <table class="table table-bordered">

                                    <tbody>
                                        <tr>
                                            <th>Kode</th>
                                            <td>{{ $value->kode_stok }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <td>{{ $value->nama_stok }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kategori</th>
                                            <td>{{ $value->nama_kategori }}</td>
                                        </tr>
                                        <tr>
                                            <th>Satuan</th>
                                            <td>{{ $value->nama_satuan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Qty Awal</th>
                                            <td>{{ $value->saldo_awal }}</td>
                                        </tr>
                                        <tr>
                                            <th>Harga Beli</th>
                                            <td>Rp{{ number_format($value->harga_beli, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Harga Jual</th>
                                            <td>Rp{{ number_format($value->harga_jual, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Harga Modal</th>
                                            <td>Rp{{ number_format($value->harga_modal, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Deskripsi</th>
                                            <td>{{ $value->deskripsi }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- card end//-->
        <div class="pagination-area mt-30 mb-50">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    {{ $data->links('components.paginator') }}
                </ul>
            </nav>
        </div>
    </section>

@endsection
