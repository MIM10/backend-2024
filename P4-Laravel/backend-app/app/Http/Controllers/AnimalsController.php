<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    public function index() {
        $hewan = ['alisu','aliasu','alipasu'];
        echo "Menampilkan data animals";
    }
    public function store() {
        echo "Menambahkan hewan baru";
    }
    public function update($id) {
        echo "Mengupdate data hewan id $id";
    }
    public function delete($id) {
        echo "Menghapus data hewan id $id";
    }
}
