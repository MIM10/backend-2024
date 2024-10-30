<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::All();

        $data = [
            'message' => 'Data berhasil diakses',
            'data' => $student
        ];

        return response()->json($data,200);
    }

    public function store(Request $request)
    {
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $student = Student::create($input);

        $data = [
            'message' => 'Data berhasil ditambah',
            'data' => $student
        ];

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
            'message' => 'Data berhasil diubah',
            'data' => $student,
        ];

        return response()->json($data, 200);
    }

    public function destroy(string $id)
    {
        $student = Student::find($id);

        $student->delete();

        $data = [
            'message' => 'Data berhasil di hapus',
            'data' => $student,
        ];

        return response()->json($data, 200);
    }
}
