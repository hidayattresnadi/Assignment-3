<?php

if (!function_exists('academic_status_cell')) {
    function academic_status_cell(string $type): string
    {
        return view_cell('App\Cells\AcademicStatusCell', ['type' => $type]);
    }
}
