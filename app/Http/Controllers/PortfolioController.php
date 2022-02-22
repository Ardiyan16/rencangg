<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
class PortfolioController extends Controller
{

    public function index()
    {
        $param['title'] = 'admin | Portfolio';
        $param['portfolio'] = Portfolio::all();
        return view('admin.pages.portfolio', $param);
    }

    public function create()
    {
        $param['title'] = 'admin | Tambah Portfolio';
        return view('admin.pages.addPortfolio', $param);
    }

    public function store(Request $request)
    {
        $image = $request->file('image');

        // nama file
        $nama_image = time() . "_" . $image->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'foto_portofolio';
        $image->move($tujuan_upload, $nama_image);

        DB::table('portfolio')->insert([
            'judul' => $request->judul,
            'tahun' => $request->tahun,
            'kategori' => $request->kategori,
            'image' => $nama_image,
            'deskripsi' => $request->deskripsi
        ]);
        Alert::success('Berhasil', 'Data Portfolio Berhasil di Simpan');
        return redirect('/portfolio');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
