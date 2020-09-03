@extends('layouts.app')

@section('title', 'Edit wilker')

@section('page-title', 'Edit wilker')

@section('content')
  <div class=" bg-gradient-primary  pt-md-8"></div>
  <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">{{ $wilker->nama_wilker }}</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              @include('includes/message')
              <form action="{{ route('wilkers.update', $wilker->id) }}" method="POST">
                @csrf
                @method('PUT')
                <h6 class="heading-small text-muted mb-4">Edit Wilker</h6>
                <div class="pl-lg-12">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Nama Wilker</label>
                          <input name="nama_wilker" type="text" class="form-control form-control-alternative" value="{{ $wilker->nama_wilker }}">
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
                            @foreach($users as $user)
                                <option {{ ($user['id'] === $wilker->pj_id) ? 'selected' : '' }} value="{{ $user['id'] }}">{{ $user['nama'] }} <em>({{ $user['nip'] }})</em></option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                  </div>
                </div>

                <hr class="my-4" />
                <a href="{{ route('wilkers.index') }}" class="btn btn-success">Kembali</a>
                <button type="submit" class="btn btn-primary float-right">Edit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection