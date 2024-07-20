
@extends('admin.layouts.index')
@section('content')
<section class="content-main">
    <div class="content-header">
      <h2 class="content-title">Laporan Barang Terjual</h2>
      <div class="col-lg-6 col-md-6 ms-auto text-md-end"><a class="btn btn-primary" href="{{ route('admin.laporan.penjualan.print') }}">Download PDF</a></div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <header class="border-bottom mb-4 pb-4">
              <form id="filterForm" method="GET" action="{{ route('admin.laporan.penjualan') }}">
              <div class="row">
                <div class="col-lg-4 col-6 me-auto">
                    <form class="form-search" method="get" action="{{ route('admin.laporan.penjualan') }}">
                        <input class="form-control font-xs" type="text" name="search" value="{{ request('search') }}" placeholder="Cari...">
                    </form>
                </div>
                <div class="col-lg-3 col-6">
                <div class="custom_select">
                  <select class="form-select select-nice" name="urutkan" onchange="document.getElementById('filterForm').submit();">
                    <option>Semua</option>
                    <option value="tinggi" {{ request()->get('urutkan') == 'tinggi' ? 'selected' : '' }}>Paling Banyak Terjual</option>
                    <option value="rendah" {{ request()->get('urutkan') == 'rendah' ? 'selected' : '' }}>Paling Sedikit Terjual</option>
                  </select>
                </div>
                </div>
              </div>
              </form>
            </header>
            <!-- card-header end//-->
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Jumlah Terjual</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Total</th>
                    {{-- <th class="text-end" scope="col"> Action</th> --}}
                  </tr>
                </thead>
                <tbody>
                @foreach ($transaksiData as $data)
                  <tr>

                    <td><b>{{$data->nama_stok}}</b></td>
                    <td><b>{{$data->total_qty}} unit </b></td>
                    <td>Rp{{ number_format($data->harga_jual, 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($data->total_harga, 0, ',', '.') }}</td>
                    {{-- <td class="text-end"><a class="btn btn-md rounded font-sm" href="#">Detail</a>
                        <div class="dropdown"><a class="btn btn-light rounded btn-sm font-sm" href="#" data-bs-toggle="dropdown"><i class="material-icons md-more_horiz"></i></a>
                          <div class="dropdown-menu"><a class="dropdown-item" href="#">View detail</a><a class="dropdown-item" href="#">Edit info</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                        </div>
                      </td> --}}
                  </tr>
                @endforeach
                </tbody>
              </table>
              <div class="card-footer text-end">
                <h4>Subtotal: {{ 'Rp ' . number_format($TotalJual, 0, ',', '.') }}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- card end//-->
    <div class="pagination-area mt-30">
      <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-end">
              {{ $transaksiData->links('components.paginator') }}
          </ul>
      </nav>
  </div>
  </section>
@endsection
