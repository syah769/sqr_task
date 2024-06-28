<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     */
    public function index()
    {
        $students = Student::paginate(10);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new students.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created students in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified students.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified students.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified students in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified students from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
