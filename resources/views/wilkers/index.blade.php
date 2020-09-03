@extends('layouts.app')

@section('title', 'Wilkers')

@section('page-title', 'Wilkers Management')

@section('content')
    <div class=" bg-gradient-primary  pt-md-6"></div>
    <div class="col">
      @include('includes/message')
      <div class="card shadow mt-4">
        <div class="card-header border-0 ">
            <a href="{{ route('wilkers.create') }}" class="btn btn-danger float-right mr-3"> <i class="fa fa-plus"></i> Tambah Wilker</a>
        </div>
        <table class="table align-items-center table-flush text-center" id="wilkers">
            <thead class="thead-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Wilker</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($wilkers as $key => $wilker)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $wilker->nama_wilker }}</td>
                  <td>
                    <a href="{{ route('wilkers.edit', $wilker->id) }}" class="btn btn-success">Edit</a>
                    <button type="button" data-id="{{ $wilker->id }}" class="btn btn-danger delete-btn">Hapus</button>
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>
      </div>
    </div>
@endsection

@section('scripts')
  <script>
    const handleDelete = async (e) => {

      if (! confirm(`Yakin Ingin Menghapus data ini?`)) return;
      
      e.preventDefault();

      const id = e.target.dataset.id;
      const url = '{{ route('wilker.destroy') }}/' + id

      const response = await fetch(url, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN' : '{{ csrf_token() }}',
        }
      });

      const data = await response.json();

      if (response.ok) {
        const container = document.querySelector('#message-flash');
        container.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
        setTimeout(() => window.location = data.redirect, 1000);
      }
    }

    const deleteBtn = document.querySelectorAll('.delete-btn');
    deleteBtn.forEach(btn => btn.addEventListener('click', handleDelete))

  </script>
@endsection
