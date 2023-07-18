<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view("welcome");
    }

    public function store(Request $request)
    {
        $request->validate([
            "data" => "required",
        ]);

        $array_data = explode(' ', strtoupper($request->data));
        $array_data = array_map(function ($value) {
            if (is_string($value)) {
                $value = str_replace(array("TAHUN", "THN", "TH"), "", $value);
            }
            return $value;
        }, $array_data);

        $nama = "";
        $umur = "";
        $kota = "";
        foreach ($array_data as $idx => $data) {
            if (is_numeric($data)) {
                break;
            }
            $nama .= $data . " ";
            unset($array_data[$idx]);
        }
        foreach ($array_data as $idx => $value) {
            if (is_numeric($value)) {
                $umur = $value;
                unset($array_data[$idx]);
            }
        }

        foreach ($array_data as $idx => $value) {
            $kota .= $value . " ";
            unset($array_data[$idx]);
        }
        User::create([
            "name" => trim($nama),
            "age" => $umur,
            "city" => trim($kota)
        ]);

        return response()->json("OK");
    }
}
