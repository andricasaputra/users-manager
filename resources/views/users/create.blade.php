@extends('layouts.app')

@section('title', 'Add new user')

@section('page-title', 'Add new user')


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
                  <h3 class="mb-0">Add User</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="{{ route('users.create.bulk') }}" class="btn btn-sm btn-primary">Create Bulk Users</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              @include('includes/message')
              <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-12">
                  <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">Username</label>
                          <input name="username" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Password</label>
                          <input name="password" type="password"  class="form-control form-control-alternative">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Password Confirmation</label>
                          <input name="password_confirmation" type="password"  class="form-control form-control-alternative">
                        </div>
                      </div>
                  </div>
                    
                </div>
                <hr class="my-4" />
                <button type="submit" class="btn btn-success float-right">Create</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection