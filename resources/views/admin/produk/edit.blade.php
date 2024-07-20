@extends('admin.layouts.index')
@section('content')
    {{-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="content-header">{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Advanced Form</li>
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
                    <h3 class="card-title">Input Stok Barang</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ url('stok/' . $id_stok) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                @php
                                    $data = DB::table('tbstok')->where('id_stok', $id_stok)->first();
                                @endphp

                                <input type="text" class="form-control" name="id_stok" value="{{ $data->id_stok }}"
                                    hidden>
                                <div class="form-group">
                                    <label for="kdprodi">Kode Stok</label>
                                    <input type="text" class="form-control" name="kode_stok" placeholder="Kode Stok"
                                        value="{{ $data->kode_stok }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="kdprodi">Nama Stok</label>
                                    <input type="text" class="form-control" name="nama_stok" placeholder="Nama Stok"
                                        value="{{ $data->nama_stok }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="kdprodi">Saldo Awal</label>
                                    <input type="text" class="form-control" name="saldo_awal" placeholder="Saldo Awal"
                                        value="{{ $data->saldo_awal }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="kdprodi">Harga beli</label>
                                    <input type="text" class="form-control" name="harga_beli" placeholder="Harga Beli"
                                        value="{{ $data->harga_beli }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="kdprodi">Harga Jual</label>
                                    <input type="text" class="form-control" name="harga_jual" placeholder="Harga Jual"
                                        value="{{ $data->harga_jual }}" required>
                                </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kdprodi">Harga Modal</label>
                                <input type="text" class="form-control" name="harga_modal" placeholder="Harga Modal"
                                    value="{{ $data->harga_modal }}" required>
                            </div>
                            <div class="form-group">
                                <label for="kdprodi">Deskripsi Barang</label>
                                <input type="text-area" class="form-control" name="deskripsi" placeholder="Deskripsi"
                                    value="{{ $data->deskripsi }}" required>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Pajang</label>
                                <select class="form-control select2" style="width: 100%;" name="pajang">
                                    <option value="YA" {{ $data->pajang == 'YA' ? 'selected' : '' }}>YA</option>
                                    <option value="TIDAK" {{ $data->pajang == 'TIDAK' ? 'selected' : '' }}>TIDAK</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formFileMultiple" class="form-label">Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="formFileMultiple" name="foto[]" multiple
                                            onchange="previewImage();">
                                        <label class="custom-file-label" for="formFileMultiple">Pilih foto...</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                @foreach(explode(",", $data->foto) as $foto)
                                <img src="{{ asset('fotoProduk/' . $foto) }}" alt="Foto Produk"  style="width: 100px; height: auto; ">
                                @endforeach

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
@endsection --}}





<form action="{{ url('stok/' . $id_stok) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @php
    $data = DB::table('tbstok')->where('id_stok', $id_stok)->first();
    $kategori = DB::table('kategori')->get();
    $satuan = DB::table('satuan')->get();
    @endphp

    <section class="content-main">
        <div class="row">
            <div class="col-9">
                <div class="content-header">
                    <h2 class="content-title">Edit Info Produk</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Detail Produk</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label class="form-label" for="product_name">Kode</label>
                            <input class="form-control" name="kode_stok" type="text" placeholder="Type here" value="{{ $data->kode_stok }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="product_name">Nama Produk</label>
                            <input class="form-control" name="nama_stok" type="text" placeholder="Type here" value="{{ $data->nama_stok }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" placeholder="Type here" rows="4" required>{{ $data->deskripsi }}</textarea>
                        </div>
                        <div class="row mb-20">
                            <div class="col-lg-4">
                                <label class="form-label">Kategori</label>
                                <select class="form-select" id="id_kategori" name="kategori" required>
                                    @foreach ($kategori as $kat)
                                    <option value="{{ $kat->id }}" {{ $kat->id == $data->id_kategori ? 'selected' : '' }}>
                                        {{ $kat->nama_kategori }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Satuan</label>
                                <select class="form-select" id="id_satuan" name="satuan" required>
                                    @foreach ($satuan as $pcs)
                                    <option value="{{ $pcs->id_satuan }}" {{ $pcs->id_satuan == $data->id_satuan ? 'selected' : '' }}>
                                        {{ $pcs->satuan }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Pajang</label>
                                <select class="form-select" name="pajang">
                                    <option {{ $data->pajang == 'YA' ? 'selected' : '' }}>YA</option>
                                    <option {{ $data->pajang == 'TIDAK' ? 'selected' : '' }}>TIDAK</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">Kuantiti Awal</label>
                                    <input class="form-control" name="saldo_awal" placeholder="Qty" type="number" required value="{{ $data->saldo_awal }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">Harga Beli</label>
                                    <input class="form-control" id="harga_beli" name="harga_beli" placeholder="Rp" type="text" required value="{{ $data->harga_beli }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">Harga Jual</label>
                                    <input class="form-control" id="harga_jual" name="harga_jual" placeholder="Rp" type="text" required value="{{ $data->harga_jual }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Harga Modal</label>
                            <input class="form-control" id="harga_modal" name="harga_modal" type="text" placeholder="Rp" required value="{{ $data->harga_modal }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Gambar Produk</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-upload">
                            @foreach(explode(",", $data->foto) as $foto)
                            <img src="{{ asset('fotoProduk/' . $foto) }}" alt="Foto Produk" style="max-width: 100px; max-height: 100px; margin-bottom: 10px;">
                            @endforeach

                            <input class="form-control" type="file" name="foto[]" multiple>
                        </div>

                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-md rounded font-sm hover-up">Simpan</button>
                </div>
            </div>
        </div>
    </section>
</form>

@endsection
