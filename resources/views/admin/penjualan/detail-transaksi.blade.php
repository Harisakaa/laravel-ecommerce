@extends('admin.layouts.index')
@section('content')
<section class="content-main">
    <div class="content-header">
      <h2 class="content-title">Detail Transaksi</h2>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <header class="card-header2">
              <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 mb-lg-0 mb-15"><span><i class="material-icons md-calendar_today"></i><b> <b>{{ \Carbon\Carbon::parse($detailTransaksi->created_at)->translatedFormat('l, d F Y') }}</b>
                </span></b></span><br>
                    <small class="text-muted">No Bukti:  #{{$detailTransaksi->no_bukti}}</small>
                  <p class="mt-15"><span>Status Pembayaran: </span>
                    @if ($detailTransaksi->status == 'pending')
                    <span class="badge rounded-pill alert-warning text-warning">Belum diverifikasi</span>
                    @else
                    <span class="badge rounded-pill alert-success text-success">Terverifikasi</span>
                    @endif
                </p>
                </div>
              </div>
            </header>
            <!-- card-header end//-->
            <hr>
            <div class="trans-details mb-30">
              <div class="box shadow-sm bg-light">
                <div class="row">
                  <div class="col-4">
                    <h6 class="mb-15">Payment info</h6>
                    <p> <img class="border" src="https://i.pinimg.com/originals/ed/a9/aa/eda9aabed661a98d62c5df2df6879258.png" height="30">
                         <img class="border" src="https://logowik.com/content/uploads/images/bni-bank-negara-indonesia8078.logowik.com.webp" height="30">
                         <img class="border" src="https://brandingkan.com/wp-content/uploads/2023/02/Logo-BRI.jpg" height="30"><br>
                         <a class="btn btn-sm font-sm rounded btn-brand mr-5" href="#" data-toggle="modal" data-target="#detailModal">
                           Lihat Bukti Pembayaran
                        </a>
                  </div>
                  <div class="col-4">
                    <h6 class="mb-1">Pembeli</h6>
                    <p class="mb-1">{{$detailTransaksi->nama}}<br>{{$detailTransaksi->email}} <br> (+62) {{ ltrim($detailTransaksi->nohp, '0') }}</p>
                  </div>
                  <div class="col-4">
                    <h6 class="mb-1">Dikirim Ke</h6>
                    <p class="mb-1">{{$detailTransaksi->alamat}} <br> {{$detailTransaksi->kode_pos}}</p>
                  </div>
                </div>
              </div>
            </div>
            <h5 class="mb-15">Item List</h5>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th width="40%">Produk</th>
                    <th width="20%">Harga Satuan</th>
                    <th width="20%">Qty</th>
                    <th class="text-end" width="20%">Total</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($dataProduk as $data )
                  <tr>
                    <td><a class="itemside" href="#">
                        <div class="left"><img class="img-md" src="{{ asset('fotoProduk/' . explode(',', $data->foto)[0]) }}"  alt="Item" width="40" height="40"></div>
                        <div class="info"> {{$data->nama_stok}}</div></a></td>
                    <td class="align-middle"> Rp{{ number_format ($data->harga_jual, 0, ',', '.')}}</td>
                    <td class="align-middle"> {{$data->qty}}</td>
                    <td class="text-end align-middle"> Rp{{ number_format($data->total, 0, ',', '.') }}</td>
                  </tr>
                @endforeach
                  <tr>
                    <td colspan="4">
                      <article class="float-end">
                        <dl class="dlist">
                          <dt>Subtotal:</dt>
                          <dd><b class="h5">Rp{{ number_format($subtotal, 0, ',', '.') }}</b></dd>
                        </dl>
                      </article>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            @if ($detailTransaksi->status == 'pending')
            <form action="{{ route('update.status', $detailTransaksi->no_bukti) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Konfirmasi Transaksi</button>
            </form>
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalTitle">Bukti Pembayaran: {{ $detailTransaksi->no_bukti }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Gambar Produk -->
                    <div class="text-center">
                        <img src="{{ asset('storage/bukti_pembayaran/' . $detailTransaksi->bukti_pembayaran) }}" style="width: 300px">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

  </section>
  @endsection
