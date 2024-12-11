<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    private $animals = [];

    public function __construct() {
        $this->animals = ['Kucing Anggora', 'Elang', 'Ular', 'Siput'];
    }

    public function index() {
        echo "List Hewan:\n";
        foreach ($this->animals as $index => $animal) {
            echo "- " . $animal . "\n";
        }
    }

    public function store(Request $request) {
        $newAnimal = $request->input('animal'); 
        $this->animals[] = $newAnimal;
        echo "Hewan baru bernama '$newAnimal' telah ditambahkan.\n";
        $this->index();
    }

    public function update(Request $request, $id) {
        $newAnimal = $request->input('animal');
        
        if (isset($this->animals[$id])) {
            $oldAnimal = $this->animals[$id];
            $this->animals[$id] = $newAnimal;
            
            echo "Hewan '$oldAnimal' telah diubah menjadi '$newAnimal'.\n\n";
        } else {
            echo "Hewan pada index $id tidak ditemukan.\n\n";
        }
        
        $this->index();
    }

    public function destroy($id) {
        if (isset($this->animals[$id])) {
            $deletedAnimal = $this->animals[$id];
            
            unset($this->animals[$id]);
            
            echo "Hewan '$deletedAnimal' telah dihapus dari daftar.\n\n";
        } else {
            echo "Hewan pada posisi $id tidak ditemukan.\n\n";
        }
        
        $this->index();
    }
}
