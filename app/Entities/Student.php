<?php

namespace App\Entities;

class Student
{
    private $id;
    private $name;
    private $dob;
    private $email;
    private $phone;
    private $address;
    private $programStudy;
    private $currentSemester;
    private $gpa;
    private $academicStatus;
    private $enrollmentYear;
    private $courses = [];


    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->programStudy = $data['programStudy'];
        $this->currentSemester = $data['currentSemester'];
        $this->gpa = $data['gpa'];
        $this->dob = $data['dob'];
        $this->email = $data['email'];
        $this->phone = $data['phone'];
        $this->address = $data['address'];
        $this->enrollmentYear = $data['enrollmentYear'];
        $this->courses = $data['courses'];
        $this->academicStatus = $data['academicStatus'];
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'programStudy' => $this->programStudy,
            'currentSemester' => $this->currentSemester,
            'gpa' => $this->gpa,
            'dob' => $this->dob,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'enrollmentYear' => $this->enrollmentYear,
            'courses' => $this->courses,
            'academicStatus' => $this->academicStatus
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self($data);
    }

    public function __get($atribute)
    {
        if (property_exists($this, $atribute)) {
            return $this->$atribute;
        }
        return null;
    }

    public function __set($atribut, $value)
    {
        if (property_exists($this, $atribut)) {
            $this->$atribut = $value;
        }
    }
}
