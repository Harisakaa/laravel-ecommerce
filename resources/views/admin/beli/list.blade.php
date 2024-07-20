{{-- @extends('admin.layouts.index')
@section('content')
<section class="content-main">
    <div class="content-header">
      <h2 class="content-title">Daftar Beli</h2>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <header class="border-bottom mb-4 pb-4">
              <form id="filterForm" method="GET" action="{{ route('admin.transaksi') }}">
              <div class="row">
                <div class="col-lg-4 col-6 me-auto">
                    <form class="form-search" method="get" action="{{ route('admin.transaksi') }}">
                        <input class="form-control font-xs" type="text" name="search" value="{{ request('search') }}" placeholder="Cari...">
                    </form>
                </div>
                <div class="col-lg-3 col-6">
                <div class="custom_select">
                  <select class="form-select select-nice" name="urutkan" onchange="document.getElementById('filterForm').submit();">
                    <option>Semua</option>
                    <option value="pending" {{ request()->get('urutkan') == 'pending' ? 'selected' : '' }}>Belum diverifikasi</option>
                    <option value="success" {{ request()->get('urutkan') == 'success' ? 'selected' : '' }}>Sukses</option>
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
                    <th>No Bukti</th>
                    <th>Tanggal Beli</th>
                    <th>Jumlah Pembayaran</th>
                    <th>Tanggal</th>
                    <th>Status Pembayaran</th>
                    <th class="text-center"> Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($transaksiData as $data )
                  <tr>
                    <td><b>#{{$data->no_bukti}}</b></td>
                    <td><b>{{$data->nama}}</b></td>
                    <td>Rp{{ number_format($data->total, 0, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d.m.Y') }}</td>
                    <td>
                      @if ($data->status == 'pending')
                      <span class="badge badge-pill badge-soft-warning">Belum diverifikasi</span>
                      @else
                      <span class="badge badge-pill badge-soft-success">Terverifikasi</span>
                      @endif
                      </td>


                      <td class="text-end">
                        @if ($data->status == 'pending')
                        <form action="{{ route('update.status', $data->no_bukti) }}" method="POST" id="accept-form-{{ $data->no_bukti }}" style="display:inline;">
                            @csrf
                            <a class="btn btn-sm font-sm rounded btn-success mr-5" onclick="event.preventDefault(); document.getElementById('accept-form-{{ $data->no_bukti }}').submit();">
                                <i class="material-icons md-done"></i>
                            </a>
                        </form>
                        @endif

                        <div class="dropdown"><a class="btn btn-light rounded btn-sm font-sm" href="#" data-bs-toggle="dropdown"><i class="material-icons md-more_horiz"></i></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('admin.transaksi.detail', ['no_bukti' => $data->no_bukti]) }}">Lihat detail</a>

                            </div>
                          </div>
                        </td>
                     </tr>
                @endforeach
                </tbody>
              </table>
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
@endsection --}}


@extends('admin.layouts.index')
@section('content')
<section class="content-main">
    <div class="content-header">
      <h2 class="content-title">Daftar Beli</h2>
      <div><a class="btn btn-primary btn-sm rounded" href="{{ route('beli.create') }}">+ Tambah Data</a></div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <header class="border-bottom mb-4 pb-4">
              <form id="filterForm" method="GET" action="{{ route('admin.transaksi') }}">
              <div class="row">
                <div class="col-lg-4 col-6 me-auto">
                    <form class="form-search" method="get" action="{{ route('admin.transaksi') }}">
                        <input class="form-control font-xs" type="text" name="search" value="{{ request('search') }}" placeholder="Cari...">
                    </form>
                </div>
                <div class="col-lg-3 col-6">
                <div class="custom_select">
                  <select class="form-select select-nice" name="urutkan" onchange="document.getElementById('filterForm').submit();">
                    <option>Semua</option>
                    <option value="pending" {{ request()->get('urutkan') == 'pending' ? 'selected' : '' }}>Belum diverifikasi</option>
                    <option value="success" {{ request()->get('urutkan') == 'success' ? 'selected' : '' }}>Sukses</option>
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
                    <th>No Bukti</th>
                    <th>Nama Pemasok</th>
                    <th>Tanggal Beli</th>
                    <th>Jumlah Bayar</th>
                    <th class="text-center"> Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($daftarBeli as $data )
                  <tr>
                    <td><b>#{{$data->no_bukti}}</b></td>
                    <td><b>{{$data->nama_pemasok}}</b></td>
                    <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d.m.Y') }}</td>
                    <td>Rp{{ number_format($data->total_harga, 0, ',', '.') }}</td>
                      <td class="text-end">
                        <div class="dropdown"><a class="btn btn-light rounded btn-sm font-sm" href="#" data-bs-toggle="dropdown"><i class="material-icons md-more_horiz"></i></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('detail.beli', ['no_bukti' => $data->no_bukti]) }}">Lihat detail</a>
                            </div>
                          </div>
                        </td>
                     </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- card end//-->
    <div class="pagination-area mt-30">
      <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-end">
              {{-- {{ $transaksiData->links('components.paginator') }} --}}
          </ul>
      </nav>
  </div>
  </section>
  @endsection
