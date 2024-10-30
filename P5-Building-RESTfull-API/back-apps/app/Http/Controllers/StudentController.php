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
        return response()->json($data,201);
    }

    public function show(string $id)
    {
        $student = Student::find($id);

        if ($student) {
            return response()->json($student, 200);
        }

        return response()->json(['message' => 'Data tidak ditemukan!'], 404);
    }

    public function update(Request $request, string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Data tidak ditemukan!'], 404);
        }

        $input = [
            'nama' => $request->nama ?? $student->nama,
            'nim' => $request->nim ?? $student->nim,
            'email' => $request->email ?? $student->email,
            'jurusan' => $request->jurusan ?? $student->jurusan,
        ];

        $student->update($input);

        $data = [
            'message' => 'Berhasil mengubah data',
            'data' => $student,
        ];

        return response()->json($data, 200);
    }

    public function destroy(string $id)
    {
        $student = Student::find($id);

        $student->delete();

        $data = [
            'message' => 'Berhasil menghapus data',
            'data' => $student,
        ];

        return response()->json($data, 200);
    }
}
