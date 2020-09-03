@extends('layouts.app')

@section('title', 'Tambah wilker')

@section('page-title', 'Tambah wilker')

@section('content')
  <div class=" bg-gradient-primary  pt-md-8"></div>
  <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-body">
              @include('includes/message')
              <form action="{{ route('wilkers.store') }}" method="POST">
                @csrf
                <h6 class="heading-small text-muted mb-4">Tambah Wilker</h6>
                <div class="pl-lg-12">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Nama Wilker</label>
                          <input name="nama_wilker" type="text" class="form-control form-control-alternative">
                        </div>
                      </div>
                  </div>
                </div>

                <div class="pl-lg-12">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Penanggung Jawab Wilker</label>
                          <select name="pj_id" class="form-control">
                            <option disabled selected>-Pilih PJ Wilker-</option>
                            @foreach($users as $user)
                                <option value="{{ $user['id'] }}">{{ $user['nama'] }} <em>({{ $user['nip'] }})</em></option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                  </div>
                </div>

                <hr class="my-4" />
                <a href="{{ route('wilkers.index') }}" class="btn btn-success">Kembali</a>
                <button type="submit" class="btn btn-primary float-right">Tambah</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection