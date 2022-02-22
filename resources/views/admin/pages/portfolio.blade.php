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
                            <td>{{ $por->judul }}</td>
                            <td>{{ $por->kategori }}</td>
                            <td>{{ $por->tahun }}</td>
                            <td>{{ $por->deskripsi }}</td>
                            <td><img width="100px" src="{{ url('/foto_portofolio/'. $por->image) }}"></td>
                            <td></td>
                            <td>
                                <a href="{{ route('portfolio.edit', $pot->id) }}" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
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