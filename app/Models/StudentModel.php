<?php

namespace App\Models;

use App\Entities\Student;

class StudentModel
{
    private array $studentsData = [];
    private string $filePath;

    public function __construct()
    {
        $this->filePath = WRITEPATH . 'students.json';

        // Jika file tidak ada, buat file baru
        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, json_encode([], JSON_PRETTY_PRINT));
        }

        // Load data dari JSON dan konversi kembali ke objek Mahasiswa
        $this->studentsData = array_map(
            fn($data) => Student::fromArray($data),
            json_decode(file_get_contents($this->filePath), true) ?? []
        );
    }

    private function saveData()
    {
        file_put_contents($this->filePath, json_encode(array_map(fn($s) => $s->toArray(), $this->studentsData), JSON_PRETTY_PRINT));
    }

    public function addStudent($data): string
    {
        $randomNumber = random_int(1, 10000);
        $data['id'] = $randomNumber;
        $newStudent = new Student($data);
        $this->studentsData[] = $newStudent;
        $this->saveData();
        return "Add Student Success";
    }

    public function updateStudent($data, $id): string
    {
        foreach ($this->studentsData as $student) {
            if ($student->id === $id) {
                $student->name = $data['name'];
                $student->programStudy = $data['programStudy'];
                $student->currentSemester = $data['currentSemester'];
                $student->gpa = $data['gpa'];
                $this->saveData();
                return "Update Student Success";
            }
        }
        return null;
    }

    public function deleteStudent($id): bool
    {
        foreach ($this->studentsData as $index => $student) {
            if ($student->id === $id) {
                unset($this->studentsData[$index]);
                $this->studentsData = array_values($this->studentsData);
                $this->saveData();
                return true;
            }
        }
        return false;
    }

    public function getAllStudents(): array
    {
        return $this->studentsData;
    }

    public function getStudentDetail($id): Student
    {
        foreach ($this->studentsData as $student) {
            if ($student->id === $id) {
                return $student;
            }
        }
        return null;
    }
}
