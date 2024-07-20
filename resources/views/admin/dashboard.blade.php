@extends('admin.layouts.index')
@section('content')
<section class="content-main">
    <div class="content-header">
      <div>
        <h2 class="content-title card-title">Dashboard</h2>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-body mb-4">
              <article class="icontext"><span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning material-icons md-qr_code"></i></span>
                <div class="text">
                  <h6 class="mb-1 card-title">Total Produk</h6><span>{{ $TotalProduk }}</span><span class="text-sm">Dari {{ $TotalCategories}} Kategori</span>
                </div>
              </article>
            </div>
          </div>
      <div class="col-lg-3">
        <div class="card card-body mb-4">
          <article class="icontext"><span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-primary material-icons md-monetization_on"></i></span>
            <div class="text">
              <h6 class="mb-1 card-title">Total Penjualan</h6><span>Rp{{ number_format($TotalJual, 0, ',', '.') }}</span><span class="text-sm">Dari {{ $TotalProdukTerjual }} Produk</span>
            </div>
          </article>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card card-body mb-4">
          <article class="icontext"><span class="icon icon-sm rounded-circle bg-success-light"><i class="text-success material-icons md-local_shipping"></i></span>
            <div class="text">
              <h6 class="mb-1 card-title">Orderan Baru</h6><span>{{$orderBaru}}</span><span class="text-sm">Belum di Verifikasi</span>
            </div>
          </article>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card card-body mb-4">
          <article class="icontext"><span class="icon icon-sm rounded-circle bg-info-light"><i class="text-info material-icons md-move_to_inbox"></i></span>
            <div class="text">
              <h6 class="mb-1 card-title">Barang Masuk</h6><span>{{$barangMasuk}}</span><span class="text-sm">Barang</span>
            </div>
          </article>
        </div>
      </div>
    </div>

    <div class="card mb-4">
        <header class="card-header">
            <form id="filterForm" method="GET" action="{{ route('admin.dashboard') }}">
                <div class="row align-items-center justify-content-between">
                <div class="col-md-6">
                  <h4 class="card-title">Pesanan Terbaru</h4>
                </div>
                <div class="col-md-3 col-6 text-md-right">
                  <input class="form-control" type="date" name="date" value="{{ $selectedDate }}" onchange="document.getElementById('filterForm').submit();">
                </div>
              </div>
            </form>
        </header>
      <div class="card-body">
        <div class="table-responsive">
          <div class="table-responsive">
            <table class="table align-middle table-nowrap mb-0">
              <thead class="table-light">
                <tr>
                  <th class="align-middle" scope="col">No Pesanan</th>
                  <th class="align-middle" scope="col">Nama Pelanggan</th>
                  <th class="align-middle" scope="col">Tanggal</th>
                  <th class="align-middle" scope="col">Total</th>
                  <th class="align-middle" scope="col">Status Pembayaran</th>
                  <th class="align-middle" scope="col">Detail</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($LatestOrder as $order)
                <tr>
                  <td><a class="fw-bold">#{{$order->no_bukti}}</a></td>
                  <td>{{$order->nama}}</td>
                  <td>{{ \Carbon\Carbon::parse($order->created_at)->format('l, d-m-Y') }}</td>
                  <td>Rp{{ number_format($order->total, 0, ',', '.') }}</td>
                  <td>
                    @if ($order->status == 'pending')
                    <span class="badge badge-pill badge-soft-warning">Belum diverifikasi</span>
                    @else
                    <span class="badge badge-pill badge-soft-success">Terverifikasi</span>
                    @endif

                </td>
                  <td><a class="btn btn-xs" href="{{ route('admin.transaksi.detail', ['no_bukti' => $order->no_bukti]) }}"> Lihat Detail</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- table-responsive end//-->
      </div>
    </div>
    <div class="pagination-area mt-30 mb-50">
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-start">
            {{ $LatestOrder->links('components.paginator') }}
        </ul>
      </nav>
    </div>
  </section>
  @endsection
