{{-- @extends('admin.layouts.index')
@section('content')

<style>
    .custom-file-input:lang(id)~.custom-file-label::after {
  content: "Browse";
}
.custom-file-label {
  overflow: hidden;
}
.custom-file-label::after {
  content: "Pilih foto...";
}
#imagePreview img {
  padding: 5px;
  max-width: 100px;
}

</style>
    <section class="content-header">
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
                            <form action="{{ url('stok/') }}" method="post" enctype="multipart/form-data" >
                                @csrf
                                <div class="form-group">
                                    <label for="kdprodi">Kode Stok</label>
                                    <input type="text" class="form-control" name="kode_stok" placeholder="Kode Stok"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="kdprodi">Nama Stok</label>
                                    <input type="text" class="form-control" name="nama_stok" placeholder="Nama Stok"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="kdprodi">Saldo Awal</label>
                                    <input type="text" class="form-control" name="saldo_awal" placeholder="Saldo Awal"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="kdprodi">Harga beli</label>
                                    <input type="text" class="form-control" name="harga_beli" placeholder="Harga Beli"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="kdprodi">Harga Jual</label>
                                    <input type="text" class="form-control" name="harga_jual" placeholder="Harga Jual"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="formFileMultiple" class="form-label">Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="images" name="foto[]" multiple>
                                            <label class="custom-file-label" for="formFileMultiple">Pilih foto...</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mt-2 text-center">
                                        <div class="previews d-flex justify-content-start"></div>
                                    </div>

                                </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kdprodi">Harga Modal</label>
                                <input type="text" class="form-control" name="harga_modal" placeholder="Harga Modal"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" id="id_kategori" name="kategori" required>
                                    @php
                                         $kategori = DB::table('kategori')->get();
                                    @endphp

                                    @foreach ($kategori as $kat)
                                    <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Satuan</label>
                                <select class="form-control" id="id_satuan" name="satuan" required>
                                    @php
                                         $satuan = DB::table('satuan')->get();
                                    @endphp

                                    @foreach ($satuan as $pcs)
                                    <option value="{{ $pcs->id_satuan }}">{{ $pcs->satuan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kdprodi">Deskripsi Barang</label>
                                <input type="text-area" class="form-control" name="deskripsi" placeholder="Deskripsi"
                                    required>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Pajang</label>
                                <select class="form-control select2" style="width: 100%;" name="pajang">
                                    <option>YA</option>
                                    <option>TIDAK</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jenis Ruangan</label>
                                <select class="form-control select2" style="width: 100%;" name="ruangan">
                                    <option>Ruang Tamu</option>
                                    <option>Ruang Tidur</option>
                                    <option>Ruang Makan</option>
                                    <option>Dekorasi</option>
                                </select>
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


    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script >
    $(function() {
    var previewImages = function(input, imgPreviewPlaceholder) {
        if (input.files) {
            var filesAmount = input.files.length;


            for (var i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                var fileName = input.files[i].name; // Ambil nama file

                reader.onload = function(event) {
                    var imageContainer = $('<div></div>').addClass('image-container mb-2');
                    var image = $($.parseHTML('<img>'));
                    image.attr('src', event.target.result)
                         .css('max-width', '200px')
                         .css('display', 'block');

                    var imageName = $('<p></p>').text(fileName); // Buat elemen <p> untuk nama file
                    imageName.css('display', 'block'); // Pastikan nama file ditampilkan

                    imageContainer.append(image).append(imageName); // Tambahkan gambar dan nama file ke container
                    $(imgPreviewPlaceholder).append(imageContainer); // Tambahkan container ke placeholder
                }

                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $('#images').on('change', function() {
        previewImages(this, 'div.previews');
    });
});

    </script>
@endsection --}}


@extends('admin.layouts.index')
@section('content')
@include('sweetalert::alert')
<form action="{{ url('stok/') }}" method="post" enctype="multipart/form-data">
    @csrf
    <section class="content-main">
        <div class="row">
            <div class="col-9">
                <div class="content-header">
                    <h2 class="content-title">Tambahkan Produk Baru</h2>
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
                            <input class="form-control" name="kode_stok" type="text" placeholder="Type here">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="product_name">Nama Produk</label>
                            <input class="form-control" name="nama_stok" type="text" placeholder="Type here">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" placeholder="Type here" rows="4"></textarea>
                        </div>
                        <div class="row mb-20">
                            <div class="col-lg-4">
                                <label class="form-label">Kategori</label>
                                @php
                                $kategori = DB::table('kategori')->get();
                                @endphp
                                <select class="form-select" id="id_kategori" name="kategori" required>
                                    @foreach ($kategori as $kat)
                                    <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Satuan</label>
                                @php
                                $satuan = DB::table('satuan')->get();
                                @endphp
                                <select class="form-select" id="id_satuan" name="satuan" required>
                                    @foreach ($satuan as $pcs)
                                    <option value="{{ $pcs->id_satuan }}">{{ $pcs->satuan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Pajang</label>
                                <select class="form-select" name="pajang">
                                    <option>YA</option>
                                    <option>TIDAK</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">Kuantiti Awal</label>
                                    <div class="row gx-2"></div>
                                    <input class="form-control" name="saldo_awal" placeholder="Qty" type="number" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">Harga Beli</label>
                                    <input class="form-control" id="harga_beli" name="harga_beli" placeholder="Rp" type="text"  required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">Harga Jual</label>
                                    <input class="form-control" id="harga_jual" name="harga_jual" placeholder="Rp" type="text"  required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Harga Modal</label>
                            <input class="form-control" id="harga_modal" name="harga_modal" type="text" placeholder="Rp"  required>
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
                        <div class="input-upload text-center">
                            <div id="image-preview-container" style="margin-top: 20px;">
                                <!-- Pratinjau gambar akan ditampilkan di sini -->
                            </div>
                            <img src="{{ asset('admin-page/assets/imgs/theme/upload.svg') }}" alt="Upload Placeholder" id="upload-placeholder" class="img-fluid" style="max-width: 150px; margin: auto; display: block;">
                            <input class="form-control mt-3" type="file" name="foto[]" multiple onchange="previewImages(event)">
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


