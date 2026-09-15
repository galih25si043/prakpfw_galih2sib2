<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
          return 'Menampilkan data matakuliah';
    }
    public function create()
    {
                return 'Menampilkan form tambah matakuliah';
    }
    public function store(Request $request)
    {
        return 'Menyimpan matakuliah baru';
    }

    public function show(string $kde = null)
    {
     if ($kde) {
            return "Anda mengakses matakuliah " . $kde;
        } else {
            return "Masukkan kode matakuliah!";
        }
    }

    public function edit(string $id)
    {
                return 'Menampilkan form edit matakuliah ' . $id;
    }

    public function update(Request $request, string $id)
    {
                return 'Memperbarui data matakuliah ' . $id;
    }
    public function destroy(string $id)
    {
                return 'Menghapus data matakuliah ' . $id;
    }

}
