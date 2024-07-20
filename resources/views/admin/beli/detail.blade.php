@extends('admin.layouts.index')
@section('content')
<section class="content-main">
    <div class="content-header">
      <h2 class="content-title">Detail Beli</h2>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <header class="card-header2">
              <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 mb-lg-0 mb-15"><span><i class="material-icons md-calendar_today"></i>
                    <b>{{ \Carbon\Carbon::parse($dataBeli->first()->tanggal_beli)->translatedFormat('l, d F Y') }}</b>
                </span></span><br>
                    <small class="text-muted">No Bukti:  #{{$dataBeli->first()->no_bukti }}</small>
                </div>

              </div>
            </header>
            <!-- card-header end//-->
            <h5 class="mb-15">Item List</h5>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th width="40%">Produk</th>
                    <th width="20%">Harga Beli</th>
                    <th width="20%">Jumlah Beli</th>
                    <th class="text-end" width="20%">Total</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($dataBeli as $data )
                  <tr>
                    <td><a class="itemside" href="#">
                        <div class="left"><img class="img-md" src="{{ asset('fotoProduk/' . explode(',', $data->foto_barang)[0]) }}" style="width: 80px; height:80px;"></div>
                        <div class="info"> {{$data->nama_barang}}</div></a></td>
                    <td class="align-middle"> Rp{{ number_format ($data->harga, 0, ',', '.')}}</td>
                    <td class="align-middle"> {{$data->qty}}</td>
                    <td class="text-end align-middle"> Rp{{ number_format($data->qty * $data->harga, 0, ',', '.') }}</td>
                  </tr>
                @endforeach
                  <tr>
                    <td colspan="4">
                      <article class="float-end">
                        <dl class="dlist">
                          <dt>Subtotal:</dt>
                          <dd><b class="h5">Rp{{ number_format($totalHarga, 0, ',', '.') }}</b></dd>
                        </dl>
                      </article>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
