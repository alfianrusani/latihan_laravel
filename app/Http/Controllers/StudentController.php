<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('student.index', [
            'title' => 'Student',
            'students' => Student::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create', ['title' => 'Create Student']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'nim' => 'required|digits:11|numeric',
    ], [
        'name.required' => 'Nama tidak boleh kosong',
        'name.max' => 'Nama tidak boleh lebih dari 255 karakter',
        'nim.required' => 'Nim tidak boleh kosong',
        'nim.digits' => 'Nim wajib :digits digit',
        'nim.numeric' => 'Nim wajib angka',
    ]);

    Student::create($validated);
    return to_route('student.index')->withSuccess('Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('student.edit', [
            'title' => 'Edit Student',
            'students' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'nim' => 'required|digits:11|numeric',
    ], [
        'name.required' => 'Nama tidak boleh kosong',
        'name.max' => 'Nama tidak boleh lebih dari 255 karakter',
        'nim.required' => 'Nim tidak boleh kosong',
        'nim.digits' => 'Nim wajib :digits digit',
        'nim.numeric' => 'Nim wajib angka',
    ]);

    $student->update($validated);
    return to_route('student.index')->withSuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete($student);
        return to_route('student.index')->withSuccess('Data Berhasil Dihapus');  
    }
    //soft deletes
    public function trash()
    {
        return view('student.trash', [
            'title' => 'Trash Student',
            'students' => Student::onlyTrashed()->latest()->get(),
            ]);
    }
    public function restore(Student $student)
    {
        $student->restore();
        return to_route('student.trash')->withSuccess('Data Berhasil Dikembalikan');  
    }
    public function forceDelete(Student $student)
    {
        $student->forceDelete();
        return to_route('student.trash')->withSuccess('Data Berhasil Di Hapus Secara Permanen');  
    }

}