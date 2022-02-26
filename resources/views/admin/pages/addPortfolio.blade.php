@extends('layout.admin')
@section('adminlayout')


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Portfolio</h1>
    <div class="card shadow py-2">
        <div class="card-body">
            <a href="{{ url('admin/portfolio') }}" class="btn btn-info mb-3"> <span class="fa fa-arrow-alt-circle-left"></span> Kembali</a>
            <hr>

            <form action="{{ url('admin/portfolio') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label>Judul Portfolio</label>
                <input name="judul" type="text" placeholder="Judul.." value="{{ old('judul') }}" class="form-control @error('judul') is-invalid @enderror" >
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <br>
                <label>Kategori</label>
                <select name="kategori" class="form-control">
                    <option value="web development">Web Development</option>
                    <option value="mobile development">Mobile Development</option>
                    <option value="design">Design</option>
                </select>
                <br>
                <label>Tahun</label>
                <select name="tahun" class="form-control">
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>
                <br>
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" cols="10" rows="4">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <br>
                <label>Image</label>
                <input name="image" type="file" placeholder="" id="image" class="form-control @error('image') is-invalid @enderror" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <p>maksimum 3MB</p>
                <img class="img-preview img-fluid col-sm-3">
                <br>
                <button type="reset" class="btn btn-danger"> <span class="fa fa-times"></span> Reset</button>
                <button type="submit" class="btn btn-primary"> <span class="fa fa-save"></span> Save</button>
            </form>
        </div>
    </div>
</div>
<script>

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>
@endsection