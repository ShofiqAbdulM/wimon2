<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Http\Request;

class Sensor extends Model
{

    public function tambahSensorMasuk($wisata, $jumlah_masuk, $tgl_masuk)
    {
        $gsensor = DB::table('sensor_masuk')->insert(['id_wisata' => $wisata, 'jumlah_masuk' => $jumlah_masuk, 'tgl_masuk' => $tgl_masuk]);
        return $gsensor;
    }

    public function tambahSensorKeluar($wisata, $jumlah_keluar, $tgl_keluar)
    {
        $gsensor = DB::table('sensor_keluar')->insert(['id_wisata' => $wisata, 'jumlah_keluar' => $jumlah_keluar, 'tgl_keluar' => $tgl_keluar]);
        return $gsensor;
    }
}
