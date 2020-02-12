@extends('layouts.app')

@section('title', 'Add new users')

@section('page-title', 'Add new users')

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
                  <h3 class="mb-0">Add Bulk Users</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Note : File type must be excel !</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              @include('includes/message')
               <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="file" name="file" class="form-control">
                  <br>
                  <button class="btn btn-success">Import User Data</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection