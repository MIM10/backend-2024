<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    private $animals = [];

    public function __construct() {
        $this->animals = ['Kucing Anggora', 'Ayam', 'Ular', 'Siput'];
    }

    public function index() {
        echo "List Hewan:<br>";
        foreach ($this->animals as $index => $animal) {
            echo "- " . $animal . "<br>";
        }
    }

    public function store(Request $request) {
        $newAnimal = $request->input('animal'); 
        $this->animals[] = $newAnimal;
        echo "Hewan baru bernama '$newAnimal' telah ditambahkan.<br>";
        $this->index();
    }

    public function update(Request $request, $id) {
        $newAnimal = $request->input('animal');
        
        if (isset($this->animals[$id])) {
            $oldAnimal = $this->animals[$id];
            $this->animals[$id] = $newAnimal;
            
            echo "Hewan '$oldAnimal' berhasil diubah menjadi '$newAnimal'.<br><br>";
        } else {
            echo "Hewan pada posisi $id tidak ditemukan.<br><br>";
        }
        
        $this->index();
    }

    public function delete($id) {
        if (isset($this->animals[$id])) {
            $deletedAnimal = $this->animals[$id];
            
            unset($this->animals[$id]);
            
            echo "Hewan '$deletedAnimal' berhasil dihapus dari daftar.<br><br>";
        } else {
            echo "Hewan pada posisi $id tidak ditemukan.<br><br>";
        }
        
        $this->index();
    }
}
