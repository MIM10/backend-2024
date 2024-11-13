<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employees::All(); // menggunakan eloquent

        if ($employees) {
            $data = [
                'message' => 'Berhasil akses data',
                'data' => $employees,
                'kode_status' => '200'
            ];

            return response()->json($data,200);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan!'], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'gender' => 'required|in:M,F', // M = Male, F = Female
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:500',
            'email' => 'required|email',
            'status' => 'required|string|max:50',
            'hired_on' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
                'kode_status' => '204'
            ], 204);
        }

        $input = $validator->validated();
        $employees = Employees::create($input);

        $data = [
            'message' => 'Berhasil menambah data pegawai',
            'data' => $employees,
            'kode_status' => '201'
        ];

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employees = Employees::find($id); // menggunakan eloquent

        if ($employees) {
            $data = [
                'message' => 'Berhasil akses data',
                'data' => $employees,
                'kode_status' => '200'
            ];

            return response()->json($data,200);
        } else {
            return response()->json(
                [
                    'message' => 'Data tidak ditemukan!',
                    'kode_status' => '404'
                ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $employees = Employees::find($id);

        if (!$employees) {
            return response()->json(['message' => 'Data tidak ditemukan!'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'gender' => 'required|in:M,F', // M = Male, F = Female
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:500',
            'email' => 'required|email',
            'status' => 'required|string|max:50',
            'hired_on' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
                'kode_status' => '204'
            ], 204);
        }

        $input = $validator->validated();

        $employees->update($input);

        $data = [
            'message' => 'Berhasil mengubah data pegawai',
            'data' => $employees,
            'kode_status' => '201'
        ];

        return response()->json($data, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employees = Employees::find($id);
        
        if (!$employees) {
            return response()->json(
                [
                    'message' => 'Data tidak ditemukan!',
                    'kode_status' => '404'
                ], 404);
        }

        $employees->delete();

        $data = [
            'message' => 'Berhasil menghapus data',
            'data' => $employees,
            'kode status' => '200'
        ];

        return response()->json($data, 200);
    }

    // Fungsi untuk mencari pegawai berdasarkan name
    public function search($name)
    {
        $employees = Employees::where('name', 'like', '%' . $name . '%')->get();

        if ($employees->isEmpty()) {
            return response()->json(
                [
                    'message' => 'Pegawai tidak ditemukan',
                    'kode status' => '404'
                ], 404);
        }

        $data = [
            'message' => 'Hasil pencarian pegawai',
            'data' => $employees,
            'kode status' => '200'
        ];

        return response()->json($data, 200);
    }

    // Fungsi untuk mendapatkan pegawai yang aktif
    public function active()
    {
        $employees = Employees::where('status', 'active')->get();

        if ($employees->isEmpty()) {
            return response()->json(['message' => 'Tidak ada pegawai aktif'], 404);
        }

        $data = [
            'message' => 'Pegawai aktif',
            'total' => $employees->count(),
            'data' => $employees,
        ];

        return response()->json($data, 200);
    }

    // Fungsi untuk mendapatkan pegawai yang tidak aktif
    public function inactive()
    {
        $employees = Employees::where('status', 'inactive')->get();

        if ($employees->isEmpty()) {
            return response()->json(['message' => 'Tidak ada pegawai tidak aktif'], 404);
        }

        $data = [
            'message' => 'Pegawai tidak aktif',
            'total' => $employees->count(),
            'data' => $employees,
        ];

        return response()->json($data, 200);
    }

    // Fungsi untuk mendapatkan pegawai yang dihentikan
    public function terminate()
    {
        $employees = Employees::where('status', 'terminated')->get();

        if ($employees->isEmpty()) {
            return response()->json(['message' => 'Tidak ada pegawai yang dihentikan'], 404);
        }

        $data = [
            'message' => 'Pegawai yang dihentikan',
            'total' => $employees->count(),
            'data' => $employees,
        ];

        return response()->json($data, 200);
    }
}
