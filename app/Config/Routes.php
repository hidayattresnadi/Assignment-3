<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->resource('students', ['controller' => 'StudentController']);
$routes->get('/academics', 'AcademicController::index', ['as' => 'academics']);
$routes->get('/academics/courses', 'AcademicController::showCourses', ['as' => 'academics_courses']);
