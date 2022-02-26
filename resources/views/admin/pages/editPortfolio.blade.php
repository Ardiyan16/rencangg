@extends('layout.admin')
@section('adminlayout')


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Data Portfolio</h1>
    <div class="card shadow py-2">
        <div class="card-body">
            <a href="{{ url('admin/portfolio') }}" class="btn btn-info mb-3"> <span class="fa fa-arrow-alt-circle-left"></span> Kembali</a>
            <hr>

            <form action="{{ url('admin/portfolio', $edit->id) }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <label>Judul Portfolio</label>
                <input name="judul" type="text" placeholder="Judul.." class="form-control @error('judul') is-invalid @enderror" value="{{ $edit->judul }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <br>
                <label>Kategori</label>
                <select name="kategori" class="form-control">
                    @if(old('kategori', $edit->kategori) == 'web development')
                    <option value="web development" selected>Web Development</option>
                    @else 
                    <option value="web development">Web Development</option>
                    @endif
                    @if(old('kategori', $edit->kategori) == 'mobile development')
                    <option value="mobile development" selected>Mobile Development</option>
                    @else
                    <option value="mobile development">Mobile Development</option>
                    @endif
                    @if(old('kategori', $edit->kategori) == 'design')
                    <option value="design" selected>Design</option>
                    @else
                    <option value="design">Design</option>
                    @endif
                </select>
                <br>
                <label>Tahun</label>
                <select name="tahun" class="form-control">
                    @if (old('tahun', $edit->tahun) == '2022')
                    <option value="2022" selected>2022</option>
                    @else
                    <option value="2022">2022</option>
                    @endif
                    @if (old('tahun', $edit->tahun) == '2023')
                    <option value="2023" selected>2023</option>
                    @else
                    <option value="2023">2023</option>
                    @endif
                    @if (old('tahun', $edit->tahun) == '2024')
                    <option value="2024" selected>2024</option>
                    @else
                    <option value="2024">2024</option>
                    @endif
                </select>
                <br>
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" cols="10" rows="4">{{ $edit->deskripsi }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <br>
                <label>Image</label>
                <input name="image" type="file" placeholder="" class="form-control">
                <input name="old_image" type="hidden" value="{{ $edit->image }}" name="image">
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <p>maksimum 3MB</p>
                @if ($edit->image)
                <img src="{{ url('/storage/'. $edit->image) }}" class="img-preview img-fluid col-sm-3">
                @else
                <img class="img-preview img-fluid col-sm-3">
                @endif
                <hr>
                <br>
                <button type="reset" class="btn btn-danger"> <span class="fa fa-times"></span> Reset</button>
                <button type="submit" class="btn btn-primary"> <span class="fa fa-save"></span> Save Update</button>
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