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
                  <h3 class="mb-0">Update Master Pegawai</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              @include('includes/message')
              <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                @csrf
                <h6 class="heading-small text-muted mb-4">Informasi Pegawai</h6>
                <div class="pl-lg-12">
                    <div class="row">
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-username">Nama</label>
	                        <input name="nama" type="text"  class="form-control form-control-alternative" placeholder="Nama">
	                      </div>
	                    </div>
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-email">NIP</label>
	                        <input name="nip" type="number"  class="form-control form-control-alternative">
	                      </div>
	                    </div>
                  	</div>

                  	<div class="row">
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-username">Tempat/tanggal lahir</label>
	                        <input name="ttl" type="text"  class="form-control form-control-alternative">
	                      </div>
	                    </div>
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-email">Jabatan</label>
	                        <input name="jabatan" type="text"  class="form-control form-control-alternative">
	                      </div>
	                    </div>
                  	</div>

                  	<div class="row">
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-username">TMT Jabatan</label>
	                        <input name="tmt_jabatan" type="text"  class="form-control form-control-alternative">
	                      </div>
	                    </div>
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-email">Unit Kerja</label>
	                        <input name="unit_kerja" type="text"  class="form-control form-control-alternative">
	                      </div>
	                    </div>
                  	</div>
					
					<div class="row">
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-username">Golongan Capeg</label>
	                        <input name="gol_capeg" type="text"  class="form-control form-control-alternative">
	                      </div>
	                    </div>
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-email">TMT Capeg</label>
	                        <input name="tmt_capeg" type="text"  class="form-control form-control-alternative">
	                      </div>
	                    </div>
                  	</div>

                  	<div class="row">
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-username">Golongan Akhir</label>
	                        <input name="gol_akhir" type="text"  class="form-control form-control-alternative">
	                      </div>
	                    </div>
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-email">TMT Akhir</label>
	                        <input name="tmt_akhir" type="text"  class="form-control form-control-alternative">
	                      </div>
	                    </div>
                  	</div>

                  	<div class="row">
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-username">Fungsional</label>
	                        <input name="nama_fungsional" type="text"  class="form-control form-control-alternative">
	                      </div>
	                    </div>
                  	</div>

                </div>
                <hr class="my-4" />
                <button type="submit" class="btn btn-success float-right">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection