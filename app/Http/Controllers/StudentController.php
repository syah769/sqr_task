<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportStudentRequest;
use App\Models\Student;
use App\Services\StudentService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     */
    public function index(Request $request)
    {
        $search = $request->input('q');

        $students = Student::search($search)
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('students.index', compact('students', 'search'));
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

    /**
     * Import students from excel file.
     */
    public function import(ImportStudentRequest $request, StudentService $studentService)
    {
        try {
            $result = $studentService->importFile($request->file('file'));
            $insertedCount = $result['inserted_count'];

            if ($insertedCount > 0) {
                toastr()->success(__('Successfully imported :count students.', ['count' => $insertedCount]));
            } else {
                toastr()->info(__('No new students were imported. All records already exist.'));
            }

            return back();
        } catch (Exception $e) {
            toastr()->error($e->getMessage());

            return back();
        } finally {
            Storage::delete('temp/' . $request->file('file')->getClientOriginalName());
        }
    }

    /**
     * Export students to excel file.
     */
    public function export(Request $request, StudentService $studentService)
    {
        return $studentService->exportFile(
            $request->query('extension', 'csv')
        );
    }

    /**
     * Download the template for students.
     */
    public function downloadTemplate()
    {
        $filePath = public_path('templates/student_template.xlsx');

        return response()->download($filePath, 'student_template.xlsx');
    }
}
