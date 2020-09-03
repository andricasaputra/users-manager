@extends('layouts.app')

@section('title', 'Setting')

@section('page-title', 'User Setting')

@section('content')
	<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          @include('includes/message')
          <div class="row">
            <div class="col-xl-6 col-lg-12">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Your API Token</h5>
                      <span class="h5 font-weight-bold mb-0">
                        <input type="password" class="form-control" value="{{ $token }}" id="token">
                      </span>
                    </div>
                  </div>
                  <p class="mt-0 mb-0 text-muted text-sm">
                    <span class="text-success font-weight-bold mr-2">
                      <i class="fa fa-eye"></i> 
                      <a href="#" onclick="toggleToken(this)">
                        Show
                      </a>
                    </span>
                    <span class="text-success font-weight-bold mt-2 float-right">
                      <a href="#" id="btn-generate-token" onclick="generateToken()" class="btn btn-primary btn-xs" style="padding: 15px">Generate token baru</a>
                    </span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-12">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                       <span class="h2 font-weight-bold mb-0">Catatan Penting!</span>
                        <h5 class="card-title text-uppercase text-muted mb-0">
                          <b class="text-danger">API Token</b> adalah pengganti username dan password anda dan bersifat rahasia. Digunakan untuk masuk ke semua aplikasi tanpa login kembali.
                        </h5>
                    </div>
                  </div>
                  <p class=" mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-clock"></i>
                       Apabila anda ingin mengganti API Token, silahkan klik tombol <b> generate</b> untuk membuat token baru
                    </span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div> 
@endsection

@section('scripts')
  <script>
    function toggleToken(atag) {
      
      let text = atag.text;

      if (text.trim() == 'Show') {
        text = 'Hide';
      } else {
         text = 'Show';
      }

      atag.innerHTML = text;

      let x = document.getElementById("token");

      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }

    }

    function generateToken()
    {
      $.ajax({
        url : '{{ route('token.generate') }}',
        method : 'POST',
        headers: {
            "Accept": "application/json",
            "Authorization": "Bearer " + getToken()
        },
      }).done(function(response){
        $('#token').val(response.token);

        $('#message-flash').html(`
            <div class="alert ${response.alert}">${response.message}</div>
        `);
      });

      function getToken(newToken = null)
      {
        return "{{ auth()->user()->api_token }}";
      }
    }

    
  </script>
@endsection