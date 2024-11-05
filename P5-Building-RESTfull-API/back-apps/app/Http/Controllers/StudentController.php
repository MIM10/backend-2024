<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        // melihat data
        // query builder student = DB::table('student')->get();
        $student = Student::All(); // menggunakan eloquent

        if ($student) {
            $data = [
                'message' => 'Berhasil akses data',
                'data' => $student
            ];

            return response()->json($data,200);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan!'], 404);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Membuat validator
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'email' => 'required|email',
            'jurusan' => 'required|string|max:100'
        ], [
            'nama.required' => 'Field nama harus diisi.',
            'nim.required' => 'Field NIM harus diisi.',
            'email.required' => 'Field email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'jurusan.required' => 'Field jurusan harus diisi.',
        ]);
    
        // Memeriksa apakah validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }
    
        // Menangkap data request
        $input = $validator->validated();
    
        // Menggunakan model student untuk insert data
        $student = Student::create($input);
    
        $data = [
            'message' => 'Berhasil menambah data',
            'data' => $student
        ];
    
        // Mengembalikan data JSON dan kode 201 (resource berhasil ditambahkan)
        return response()->json($data, 201);
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

        if (!$student) {
            return response()->json(['message' => 'Data tidak ditemukan!'], 404);
        }

        $student->delete();

        $data = [
            'message' => 'Berhasil menghapus data',
            'data' => $student,
        ];

        return response()->json($data, 200);
    }
}
