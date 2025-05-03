<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        // ==================2==================
        // - Buat object mahasiswa dengan data dummy (nama, nim, email, jurusan, fakultas, foto)
        $mahasiswa = [
            'nama' => 'Billy',
            'nim' => '102022300252',
            'email' => 'billyamanda0502@student.telkomuniversity.ac.id',
            'jurusan' => 'sistem informasi',
            'fakultas' => 'rekayasa industri',
            'foto' => asset('fotoku.jpg')
        ];
        // - Kirim object tersebut ke view 'profil'
        return view('profil', ['mahasiswa' => $mahasiswa]);
    }
}
