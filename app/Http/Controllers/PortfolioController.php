<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
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
        $validate = $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'tahun' => 'required',
            'deskripsi' => 'required',
            'image' => 'image|file|max:3024'
        ]);

        if($request->file('image')) {
            $validate['image'] = $request->file('image')->store('portfolio');
        }

        Portfolio::create($validate);
        Alert::success('Berhasil', 'Data Portfolio Berhasil di Simpan');
        return redirect('/admin/portfolio');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $param['title'] = 'admin | Edit Portfolio';
        $param['edit'] = Portfolio::findOrFail($id);
        return view('admin.pages.editPortfolio', $param);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'tahun' => 'required',
            'deskripsi' => 'required',
            'image' => 'image|file|max:3024'
        ]);

        if($request->file('image')) {

            if ($request->old_image) {
                Storage::delete($request->old_image);
            }

            $validate['image'] = $request->file('image')->store('portfolio');
        }

        Portfolio::find($id)->update($validate);
        Alert::success('Berhasil', 'Data Portfolio Berhasil di Update');
        return redirect('/admin/portfolio');
    }


    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image) {
            Storage::delete($portfolio->image);
        }
        Portfolio::destroy($portfolio->id);
        Alert::success('Berhasil', 'Data Portfolio Berhasil di Hapus');
        return redirect('/admin/portfolio');
    }
}
