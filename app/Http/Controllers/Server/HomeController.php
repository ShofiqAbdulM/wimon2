<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wisata;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->Wisata = new Wisata();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $data = [
            'tittle' => 'Dashboard / Wisata'
        ];
        $keyword = $this->Wisata->allLokasi();

        return view('home', compact('keyword'), $data)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function viewAddWisata()
    {
        return view('wisata.w_add');
    }
    public function addWisata(Request $request)
    {
        $request->validate([
            'kode_wisata' => 'required',
            'nama_wisata' => 'required',
            'alamat_wisata' => 'required',
            'gambar_wisata' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'geoJson' => 'required',
            // 'id_user' => 'required',
        ]);

        $gambar = $request->file('gambar_wisata');
        $gambar->move('gambar', $request->nama_wisata . '-' . $gambar->getClientOriginalName());

        // $map->json = json_encode();
        // $this->Wisata->allLokasi();
        // $json = json_encode($map);

        // $map = $request->file('map_wisata');
        // $map->move('geojson', $request->nama_wisata . '-' . $map->getClientOriginalName());
        //dd("success");
        $gsensor = DB::table('wisata')->insert(['id_wisata' => $request->kode_wisata, 'nama' => $request->nama_wisata, 'alamat' => $request->alamat_wisata, 'gambar' => $request->nama_wisata . '-' . $gambar->getClientOriginalName(), 'map' => $request->geoJson,]);

        return redirect('home')
            ->with('success', 'Data Telah Di Tambahkan!');
    }

    public function editWisata(Request $request, $id)
    {
        $request->validate([
            'kode_wisata' => 'required',
            'nama_wisata' => 'required',
            'alamat_wisata' => 'required',
            'gambar_wisata' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'geoJson' => 'required',
            //'map_wisata' => 'required',
            // 'id_user' => 'required',
        ]);

        $wisata = DB::table('wisata')->where('id_wisata', $id)->first();

        if ($request->hasFile('gambar_wisata')) {
            $image = $request->file('gambar_wisata');
            $gambar = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('gambar');
            $image->move($destinationPath, $gambar);
            File::delete('gambar/' . $wisata->gambar);
            $wisata = DB::table('wisata')->where('id_wisata', $id)->update(array(
                'id_wisata' => $request->kode_wisata,
                'nama' => $request->nama_wisata,
                'alamat' => $request->alamat_wisata,
                'gambar' => $gambar,
                'map' => $request->geoJson
            ));
            return redirect()->route('home')->with('ubah', 'Data Berhasil Di Ubah.');
        } else {
            $wisata = DB::table('wisata')->where('id_wisata', $id)->update(array(
                'id_wisata' => $request->kode_wisata,
                'nama' => $request->nama_wisata,
                'alamat' => $request->alamat_wisata,
                'map' => $request->geoJson
            ));
            return redirect()->route('home')->with('ubah', 'Data Berhasil Di Ubah.');
        }
    }

    public function viewEditWisata($id)
    {
        $wisata = DB::table('wisata')->where('id_wisata', $id)->first();

        return view('wisata.w_edit', ['detail_wisata' => $wisata]);
    }
    public function cari(Request $request)
    {
        $data = [
            'tittle' => 'Dashboard / Wisata'
        ];
        // menangkap data pencarian
        $cari = $request->cari;

        $keyword = DB::table('wisata')
            ->where('nama', 'like', "%" . $cari . "%")
            ->paginate();

        return view('home', compact('keyword'), $data);
    }
    public function deleteWisata($id)
    {

        $wisata = DB::table('wisata')->where('id_wisata', $id)->first();
        File::delete('gambar/' . $wisata->gambar);
        $hapus = DB::table('wisata')->where('id_wisata', $id)->delete();

        return redirect()->back()
            ->with('warning', 'Data Telah Di Hapus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}
