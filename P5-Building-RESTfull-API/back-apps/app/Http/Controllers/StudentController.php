<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        // melihat data
        // query builder student = DB::table('student')->get();
        $student = Student::All(); // menggunakan eloquent

        $data = [
            'message' => 'Berhasil akses data',
            'data' => $student
        ];

        return response()->json($data,200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // menangkap data request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        // menggunakan model student untuk insert data
        $student = Student::create($input);

        $data = [
            'message' => 'Berhasil menambah data',
            'data' => $student
        ];

        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        // mengembalikan data json dan kode 201(resource berhasil ditambahkan)
        return response()->json($data,201);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
