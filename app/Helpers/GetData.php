<?php

namespace App\Helpers;

use App\Models\MenuLabel;
use App\Models\MenuTitle;
use Illuminate\Support\Str;
use App\Models\ProgramKuliahPilihan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GetData
{
    public static function MenuGroup()
    {
        $menus = MenuLabel::query()
            ->with('items', function ($query) {
                return $query->where('status', true)->orderBy('posision');
            })
            ->where('status', true)
            ->orderBy('posision')
            ->get();

        return json_encode($menus);
    }
    public static function getData($table, $where, $select)
    {
        $query = DB::table($table)->select([$select])->where([$where])->get();
        return $query;
    }
    public static function getData2($table, $where, $select)
    {
        $query = DB::connection('h2h')->table($table)->select($select)->where($where)->get();
        if (count($query) > 0) {
            foreach ($query as $value) {
                return $value->$select;
            }
        }
    }
    public static function getProgramKuliahPilihan()
    {
        $query = ProgramKuliahPilihan::where('id_user', Auth::user()->id);
        return  $query;
    }

    public static function getAlamat()
    {
        if (self::getProgramKuliahPilihan() == 1) {
            $alamat = self::getData('tbl_mahasiswa_s1s', ['id_user' => Auth::user()->id], ['alamat']);
        } elseif (self::getProgramKuliahPilihan() == 2) {
            $alamat = self::getData('tbl_mahasiswa_s2s', ['id_user' => Auth::user()->id], ['alamat']);
        }
        if (!empty($alamat)) {
            $data = DB::table('kelurahans as a')
                ->select(
                    'a.full_code as id_kelurahan',
                    'a.name as nama_kelurahan',
                    'b.id as id_kecamatan',
                    'b.name as nama_kecamatan',
                    'c.id as id_kabupaten',
                    'c.name as nama_kabupaten',
                    'c.type as type_kabupaten',
                    'd.id as id_provinsi',
                    'd.name as nama_provinsi'
                )
                ->join('kecamatans as b', 'a.kecamatan_id', '=', 'b.id')
                ->join('kabupatens as c', 'b.kabupaten_id', '=', 'c.id')
                ->join('provinsis as d', 'c.provinsi_id', '=', 'd.id')
                ->where('a.full_code', '=', $alamat)
                ->first();
            $hasil = $data->nama_kelurahan . ', Kec. ' . $data->nama_kecamatan . ', ' . $data->type_kabupaten . ' ' . $data->nama_kabupaten . ', ' . $data->nama_provinsi;
            return $hasil;
        }
    }
    public static function formatRupiah($nominal)
    {
        $currency = "Rp. " . number_format($nominal, 2, ",", ".");
        return $currency;
    }
}
