<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class LatestGradeCell extends Cell
{
    protected array $courses = [];
    protected bool $grade = true;

    public function mount(array $courses, bool $grade)
    {
        $this->courses = $courses;
        $this->grade = $grade;

        // cache()->save("cache_latest_grades", $this->courses, 21600);
    }

    public function getCoursesProperty()
    {
        return $this->courses;
    }

    public function getGradeProperty()
    {
        return $this->grade;
    }
}
