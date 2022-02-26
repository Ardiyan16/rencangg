@extends('layout.admin')
@section('adminlayout')
@include('sweetalert::alert')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List Portfolio</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ url('admin/tambah_portfolio') }}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Tambah Portfolio</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tahun</th>
                            <th>Deskripsi</th>
                            <th>Image</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($portfolio as $por)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $por->judul }}</td>
                            <td>{{ $por->kategori }}</td>
                            <td>{{ $por->tahun }}</td>
                            <td>{{ $por->deskripsi }}</td>
                            <td><img width="100px" src="{{ url('/storage/'. $por->image) }}"></td>
                            <td>
                                <a href="{{ route('portfolio.edit', $por->id) }}" class="badge bg-info border-0" style="color: white"><i class="fa fa-edit"></i> Edit</a> |
                                <form action="/admin/portfolio/{{ $por->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" style="color: white" onclick="return confirm('Apakah anda yakin hapus portfolio ini?')"><i style="color: white" class="fa fa-trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection