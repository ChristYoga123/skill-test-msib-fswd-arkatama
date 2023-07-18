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

        $array_data = explode(' ', $request->data);
        $nama = "";
        $umur = "";
        $kota = "";
        foreach ($array_data as $idx => $value) {
            if (is_numeric($value)) {
                $umur = $value;
                unset($array_data[$idx]);
            } else {
                $nama .= $value . " ";
                unset($array_data[$idx]);
                $kota .= $value . " ";
            }
        }
        User::create([
            "name" => $nama,
            "age" => $umur,
            "city" => $kota
        ]);

        return response()->json("OK");
    }
}
