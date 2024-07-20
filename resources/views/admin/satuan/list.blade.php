@extends('admin.layouts.index')
@section('content')
<section class="content-main">
    <div class="content-header">
      <div>
        <h2 class="content-title card-title">{{$title}}</h2>
        <p>Add, edit or delete a Satuan</p>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-3">
            <form action="{{ url('satuan/') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
            <div class="mb-4">
              <label class="form-label" for="product_name">Satuan</label>
              <input class="form-control" name="satuan" type="text" placeholder="Type here" required>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">+ Tambah</button>
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
                    <th>Nama Satuan</th>
                    <th class="text-end">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($rec as $key => $value)
                  <tr>
                    <td class="text-center">
                    </td>
                    <td><b>{{ $value->satuan}}</b></td>
                    <td class="text-end">
                      <div class="dropdown">
                        <a class="btn btn-light rounded btn-sm font-sm" href="#" data-bs-toggle="dropdown"><i class="material-icons md-more_horiz"></i></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Edit info</a>
                            <form action="{{ route('satuan.destroy', $value->id_satuan) }}" method="POST" >
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
