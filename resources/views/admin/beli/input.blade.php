@extends('admin.layouts.index')
@section('content')
<section class="content-main">
    <div class="content-header">
      <div>
        <h2 class="content-title card-title">Beli Barang</h2>
      </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="mb-3">Beli Barang</h5>
                <div class="container">
                    <form action="{{ route('beli.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label" for="order_id">NO Bukti</label>
                            <input class="form-control" id="order_id" type="text" name="no_bukti" value="{{ $no_bukti }}" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Tanggal Beli</label>
                            <input class="form-control" type="date" name="tanggal_beli" value="{{ Session::get('tanggal_beli') }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Pemasok</label>
                            @php
                            $pemasoks = DB::table('pemasok')->get();
                            @endphp
                            <select class="form-select" name="pemasok" required>
                                <option value="" selected disabled>Pilih Pemasok</option>
                                @foreach($pemasoks as $pemasok)
                                <option value="{{ $pemasok->id }}" {{ Session::get('pemasok') == $pemasok->id ? 'selected' : '' }}>{{ $pemasok->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Nama Barang</label>
                            @php
                            $barangs = DB::table('tbstok')->get();
                            @endphp
                            <select class="form-select" name="barang" id="barang" required>
                                <option value="" selected disabled>Pilih Barang</option>
                                @foreach($barangs as $barang)
                                <option value="{{ $barang->id_stok }}" data-harga="{{ $barang->harga_beli }}">{{ $barang->nama_stok }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="order_total">Keterangan</label>
                            <input class="form-control" id="order_total" type="text" name="keterangan">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Qty</label>
                            <input class="form-control" type="text" name="qty" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text" style="font-size: 14px;">Rp</span>
                                <input class="form-control" type="text" name="harga" id="harga" aria-label="Harga" aria-describedby="basic-addon2">
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
      <div class="col-md-9">
        <div class="card mb-4">
          {{-- <header class="card-header">
            <div class="row gx-3">
              <div class="col-lg-4 col-md-6 me-auto">
                <input class="form-control" type="text" placeholder="Search...">
              </div>
              <div class="col-lg-2 col-md-3 col-6">
                <select class="form-select">
                  <option>Status</option>
                  <option>Active</option>
                  <option>Disabled</option>
                  <option>Show all</option>
                </select>
              </div>
              <div class="col-lg-2 col-md-3 col-6">
                <select class="form-select">
                  <option>Show 20</option>
                  <option>Show 30</option>
                  <option>Show 40</option>
                </select>
              </div>
            </div>
          </header> --}}
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Sub Total</th>
                    <th>Tanggal Beli</th>
                    <th class="text-end">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($dataBeli as $item)
                    <tr>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}</td>
                        <td>{{ 'Rp ' . number_format($item->qty * $item->harga, 0, ',', '.') }}</td>
                        <td>{{ $item->tanggal_beli }}</td>
                        <td class="text-end">
                            <div class="dropdown">
                                <a class="btn btn-light rounded btn-sm font-sm" href="#" data-bs-toggle="dropdown">
                                    <i class="material-icons md-more_horiz"></i>
                                </a>
                                <div class="dropdown-menu">
                                    {{-- <a class="dropdown-item" href="#">View detail</a>
                                    <a class="dropdown-item" href="#">Edit info</a> --}}
                                    {{-- <form action="{{ route('beli.hapus', $item->id_stok) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="dropdown-item text-danger" data-confirm-delete="true">Delete</a>
                                    </form> --}}
                                    <a href="{{ route('beli.hapus', $item->id_stok) }}" class="dropdown-item text-danger" data-confirm-delete="true">Delete</a>

                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="card-footer text-end">
                <h4>Total: {{ 'Rp ' . number_format($totalHarga, 0, ',', '.') }}</h4>
              </div>
            </div>
          </div>
        </div>
        <a href="{{ route('daftar.beli') }}" class="btn btn-secondary">Back</a>
      </div>
    </div>
</div>
  </section>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#barang').change(function() {
            let harga = $(this).find(':selected').data('harga');
            $('#harga').val(harga);
        });
    });
</script>

@endsection
