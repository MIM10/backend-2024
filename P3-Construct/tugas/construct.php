<?php
    class Animal {
        private $animals = [];

        public function __construct($data) {
            $this->animals = $data;
        }

        // fungsi index - menampil kan seluruh data animals
        public function index() {
            foreach ($this->animals as $animal) {
                echo "- $animal <br>";
            }
        }

        // fungsi store - menambahkan hewan baru
        public function store($data) {
            array_push($this->animals, $data);
            echo "Hewan '$data' telah ditambahkan.<br>";
        }

        // fungsi update - memperbarui data hewan berdasarkan index
        public function update($index, $data) {
            if (isset($this->animals[$index])) {
                $this->animals[$index] = $data;
                echo "Hewan di index $index telah diperbarui menjadi '$data'.<br>";
            } else {
                echo "Hewan di index $index tidak ditemukan.<br>";
            }
        }

        // fungsi destroy - menghapus hewan berdasarkan index
        public function destroy($index) {
            if (isset($this->animals[$index])) {
                array_splice($this->animals, $index, 1);
                echo "Hewan di index $index telah dihapus.<br>";
            } else {
                echo "Hewan di index $index tidak ditemukan.<br>";
            }
        }
    }
?>