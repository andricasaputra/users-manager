@extends('layouts.app')

@section('title', 'User Roles')

@section('page-title', 'User Roles')


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
                  <h3 class="mb-0">Role {{ $user->username }}</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              @include('includes/message')
              <form action="{{ route('users.attach.roles', $user->id) }}" method="POST">
                @csrf
                <h6 class="heading-small text-muted mb-4">Add User Roles</h6>
                <div class="pl-lg-12">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">Username</label>
                          <input name="username" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="{{ $user->username }}" disabled>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-12">
                        
                        @foreach($roles as $role)

                          <div class="form-check form-check-inline">
                            <input  name="roles[]" class="form-check-input" type="checkbox" id="{{ $role->id }}" value="{{ $role->name }}"  {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineCheckbox1">{{ $role->name }}</label>
                          </div>

                        @endforeach
                       
                      </div>
                    </div>
                </div>
                <hr class="my-4" />
                <a href="{{ route('users.index') }}" class="btn btn-success">Kembali</a>
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection