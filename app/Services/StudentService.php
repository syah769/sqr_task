<?php

namespace App\Services;

use App\Models\Student;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Spatie\SimpleExcel\SimpleExcelReader;
use Spatie\SimpleExcel\SimpleExcelWriter;

class StudentService
{
    /**
     * Import students from the uploaded file.
     *
     * @param  UploadedFile  $file
     * @return Collection
     */
    public function importFile(UploadedFile $file): Collection
    {
        $tempFile = $file->storeAs('temp', $file->getClientOriginalName());
        $filePath = storage_path('app/' . $tempFile);

        $excelReader = SimpleExcelReader::create($filePath)->headersToSnakeCase();

        return $this->importData($excelReader->getRows()->collect());
    }

    /**
     * Import students from the provided data.
     *
     * @param  Collection  $data
     * @return Collection
     */
    public function importData(Collection $data): Collection
    {
        $rowsCount = $data->count();

        $limit = config('custom.student.limit');

        if ($rowsCount > $limit) {
            throw new Exception(__('The count of students exceeds :limit students.', ['limit' => $limit]));
        }

        $studentsCount = Student::count();
        $balance = $limit - $studentsCount;

        if ($balance <= 0) {
            throw new Exception(__('The count of students has exceeded :limit students.', ['limit' => $limit]));
        }

        $now = now();

        $students = $data
            ->unique(fn ($row) => $row['name'] . $row['class'] . $row['level'] . $row['parent_contact'])
            ->transform(fn (array $row) => [
                'name' => $row['name'],
                'class' => $row['class'],
                'level' => $row['level'],
                'parent_contact' => $row['parent_contact'],
                'created_at' => $now,
                'updated_at' => $now,
            ])
            ->slice(0, $balance);

        $insertedCount = 0;
        $students->chunk(1000)->each(fn (Collection $chunk) => $chunk->each(
            fn ($student) => !Student::where('name', $student['name'])
                ->where('class', $student['class'])
                ->where('level', $student['level'])
                ->where('parent_contact', $student['parent_contact'])
                ->exists() ? (Student::create($student) && $insertedCount++) : null
        ));

        return collect(['inserted_count' => $insertedCount]);
    }

    /**
     * Export students into a file, in CSV or Excel format.
     *
     * @param  string  $extension
     * @param  bool  $hasHeader
     * @return never
     */
    public function exportFile(string $extension)
    {
        $students = Student::select('name', 'class', 'level', 'parent_contact')
            ->get()
            ->map(function ($student) {
                return [
                    'name' => $student->name,
                    'class' => $student->class,
                    'level' => $student->level,
                    'parent_contact' => $student->parent_contact,
                ];
            });

        $filename = sprintf(
            'students-%s.%s',
            now()->format('ymd'),
            $extension,
        );

        $excelWriter = SimpleExcelWriter::streamDownload($filename)
            ->addHeader(['Name', 'Class', 'Level', 'Parent Contact']);

        return $excelWriter->addRows($students)->toBrowser();
    }
}
