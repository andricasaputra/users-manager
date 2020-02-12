@extends('layouts.app')

@section('title', 'Edit user')

@section('page-title', 'Edit user')


@section('content')
  <div class=" bg-gradient-primary  pt-md-8">
      
  </div>
  <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Data User {{ $user->username }}</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              @include('includes/message')
              <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <h6 class="heading-small text-muted mb-4">Edit User</h6>
                <div class="pl-lg-12">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">Username</label>
                          <input name="username" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="{{ $user->username }}">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Password Baru</label>
                          <input name="password" type="password" class="form-control form-control-alternative">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Konfirmasi Password</label>
                          <input name="password_confirmation" type="password"  class="form-control form-control-alternative">
                        </div>
                      </div>
                  </div>
                </div>
                <hr class="my-4" />
                <a href="{{ route('users.index') }}" class="btn btn-success">Kembali</a>
                <button type="submit" class="btn btn-primary float-right">Edit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection