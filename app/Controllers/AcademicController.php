<?php

namespace App\Controllers;

class AcademicController extends BaseController
{
    protected $renderer;

    public function __construct()
    {
        $this->renderer = service('renderer');
    }
    public function index(): string
    {
        $data['academicStatistics'] = [
            "university" => "Rain University",
            "academicYear" => "2024/2025",
            "totalStudents" => 12000,
            "totalFaculties" => 10,
            "totalDepartments" => 50,
            "studentStatistics" => [
                "Active" => 8000,
                "On Leave" => 3000,
                "Graduate" => 1000
            ],
        ];
        $this->renderer->setData($data);
        $cacheKey = 'view_' . str_replace('/', '_', $this->request->getUri()->getPath());
        return cache()->remember($cacheKey, 3600, function () {
            return $this->renderer->render('academic/index');
        });
        // return view('academic/index', $data);
    }

    public function showCourses()
    {
        $data['courses'] = [
            [
                "courseName" => "Database Systems",
                "courseCode" => "CS203",
                "instructorName" => "Dr. Smith",
                "schedule" => "Mon & Wed, 10:00-11:30",
            ],
            [
                "courseName" => "Web Development",
                "courseCode" => "CS305",
                "instructorName" => "Prof. Johnson",
                "schedule" => "Tue & Thu, 13:00-14:30",
            ],
            [
                "courseName" => "Operating Systems",
                "courseCode" => "CS305",
                "instructorName" => "Prof. Davis",
                "schedule" => "Mon & Wed, 13:00-14:30",
            ],
            [
                "courseName" => "Software Engineering",
                "courseCode" => "CS310",
                "instructorName" => "Dr. Lee",
                "schedule" => "Fri, 10:00-12:00",
            ],
            [
                "courseName" => "Computer Networks",
                "courseCode" => "CS320",
                "instructorName" => "Dr. Brown",
                "schedule" => "Tue & Thu, 14:00-15:30",
            ]
        ];
        $data['content'] = view_cell('LatestGradeCell', ['courses' => $data['courses'], 'grade' => false]);
        $this->renderer->setData($data);
        $cacheKey = 'view_' . str_replace('/', '_', $this->request->getUri()->getPath());
        return cache()->remember($cacheKey, 86400, function () {
            return $this->renderer->render('academic/course_list');
        });
    }
}
