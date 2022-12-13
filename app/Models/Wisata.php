<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Wisata extends Model
{
    // Pemanggilan seluruh data menggunakan $keyword di dalam file blade
    public function allLokasi()
    {
        // $keyword = DB::table 2wisata')
        //     ->select('id_wisata', 'nama', 'alamat', 'gambar', 'id_user', 'map')
        //     ->join('users', 'users.id', '=', 'wisata.id_user')
        //     // ->where('id_user', '=', 'id')
        //     ->get();
        $keyword = DB::table('wisata')
            ->select('id_wisata', 'nama', 'alamat', 'gambar', 'map')->get();
        return $keyword;
    }
    public function getGeojson($id = '')
    {
        $keyword = DB::table('wisata')
            ->select('id_wisata', 'nama', 'map')->get();
        return $keyword;
    }
    //get data api Wisata
    public function getLokasi($id = '')
    {
        $glokasi = DB::table('wisata')
            ->select('nama', 'alamat', 'gambar', 'map')
            ->where('id_wisata',  $id)
            ->get();
        return $glokasi;
    }

    // Data Sensor
    public function getSensorMasuk($wisata = '')
    {
        $gsensor = DB::table('sensor_masuk')
            ->join('wisata', 'wisata.id_wisata', '=', 'sensor_masuk.id_wisata')
            ->where('wisata.id_wisata', $wisata)
            ->whereDate('sensor_masuk.tgl_masuk', Carbon::now())
            ->count();
        return $gsensor;
    }
    public function getSensorKeluar($wisata = '')
    {
        $gsensor = DB::table('sensor_keluar')
            ->join('wisata', 'wisata.id_wisata', '=', 'sensor_keluar.id_wisata')
            ->where('wisata.id_wisata', $wisata)
            ->whereDate('sensor_keluar.tgl_keluar', Carbon::now())
            ->count();
        return $gsensor;
    }
}
