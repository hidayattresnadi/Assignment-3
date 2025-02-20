<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StudentModel;

class StudentController extends BaseController
{
    private StudentModel $studentModel;
    protected $renderer;

    public function __construct()
    {
        $this->studentModel = new StudentModel();
        $this->renderer = service('renderer');
    }

    public function index()
    {
        $parser = \Config\Services::parser();
        $data['students'] = $this->studentModel->getAllStudents();
        $data['content'] = $parser->setData($data)->render('components/students_list');
        $this->renderer->setData($data);
        $cacheKey = 'view_' . str_replace('/', '_', $this->request->getUri()->getPath());
        return cache()->remember($cacheKey, 1800, function () {
            return $this->renderer->render('students/index');
        });
    }

    public function show($id)
    {
        $parser = \Config\Services::parser();

        $studentData = $this->studentModel->getStudentDetail(+$id);
        $data = [
            'id' => $studentData->id,
            'name' => $studentData->name,
            'email' => $studentData->email,
            'phone' => $studentData->phone,
            'address' => $studentData->address,
            'programStudy' => $studentData->programStudy,
            'academicStatus' => $studentData->academicStatus,
            'gpa' => $studentData->gpa,
            'currentSemester' => $studentData->currentSemester,
            'count' => count($studentData->courses),
            'status_cell' => view_cell('AcademicStatusCell', ['type' => $studentData->academicStatus], 86400),
            'latest_grade' => view_cell('LatestGradeCell', ['courses' => $studentData->courses, 'grade' => true], 21600)
        ];
        $data['content'] = $parser->setData($data)->render('components/student_profile');
        return view('students/profile', $data);
    }


    public function new(): string
    {
        return view('students/add');
    }

    public function create()
    {
        $data = $this->request->getPost();

        $data = [
            'name' => $data['name'],
            'programStudy' => $data['programStudy'],
            'currentSemester' => $data['currentSemester'],
            'gpa' => $data['gpa'],
            'dob' => $data['dob'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'enrollmentYear' => $data['enrollmentYear'],
            'courses' => $data['courses'],
            'academicStatus' => $data['academicStatus']
        ];

        $rule = [
            'name' => 'required|max_length[255]',
            'programStudy'   =>  'required|max_length[255]',
            'currentSemester' => 'required',
            'gpa'   =>  'required'
        ];

        if (! $this->validateData($data, $rule)) {
            return view('students/add', [
                'errors' => $this->validator->getErrors(),
            ]);
        }
        $this->studentModel->addStudent($data);
        return redirect()->to('students')->with('success', 'Students added successfully');
    }

    public function edit($id): string
    {
        $data['student'] = $this->studentModel->getStudentDetail(+$id);
        return view('edit_student', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();

        $this->studentModel->updateStudent($data, +$id);
        return redirect()->to('students')->with('success', 'Students updated successfully');
    }

    public function delete($id)
    {
        $this->studentModel->deleteStudent(+$id);
        return redirect()->to('students')->with('success', 'Students deleted successfully');
    }
}
