<?php

namespace App\Services;

use App\Models\Student;
use App\Models\Admission;
use App\Models\University;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;

class StudentService
{
    private $studentRepository;
    private $studentService;



    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public  function index(): Collection
    {
        $students = $this->studentRepository->getAllStudent();
        return $students;
    }
    public function getById($id): Student
    {
        $student = $this->studentRepository->getById($id);
        return $student;
    }
    public function store($request): Student
    {

        $student = new Student();
        $student->name = $request->name;
        $student->gender = $request->gender;
        $birth_date = sprintf('%04d-%02d-%02d', $request->birth_year, $request->birth_month, $request->birth_day);
        $student->birth_date = $birth_date;
        $student->club = $request->club;
        $student->cram_school = $request->cram_school;
        $student = $this->studentRepository->createStudent($student);
        return $student;
    }
    public function show($id): array
    {
        $student = $this->studentRepository->getById($id);
        $admissions = $this->studentRepository->getAdmissionByStudentId($student->id);

        // dd($admissions);
        $universities = [];
        foreach ($admissions as $admission) {
            $universities[] = $this->studentRepository->getUniversityByUniversityId($admission->university_id);
        }
        // dd($universities);
        return compact('student', 'universities');
    }
    public  function edit($id): array
    {
        $student = $this->studentRepository->getById($id);
        list($birthDateYear, $birthDateMonth, $birthDateDay) = explode('-', $student->birth_date);
        $birthDateMonth = ltrim($birthDateMonth, '0');
        $birthDateDay = ltrim($birthDateDay, '0');
        return compact('student', 'birthDateYear', 'birthDateMonth', 'birthDateDay');
    }

    public function updateStudent(Request $request, int $id)
    {
        $student = $this->studentRepository->getbyId($id);
        $student->name = $request->name;
        $student->gender = $request->gender;
        $birth_date = sprintf('%04d-%02d-%02d', $request->birth_year, $request->birth_month, $request->birth_day);
        $student->birth_date = $birth_date;
        $student->club = $request->club;
        $student->cram_school = $request->cram_school;
        $this->studentRepository->updateStudent($student);
    }
    public function destroyStudent(int $id)
    {
        $student = $this->studentRepository->getbyId($id);
        // $admissions = [];
        $admissions = $this->studentRepository->getAdmissionByStudentId($id);
        // $admissionsArray = $admissions->toArray();
        foreach ($admissions as $admission) {
            $this->studentRepository->destroyAdmission($admission);
        }
        $this->studentRepository->destroyStudent($student);
    }


    public function passRegist($request)
    {
        $studentId = $request->id;
        if ($request->university1 != "") {
            $universityId1 = $request->university1;
            $this->studentRepository->createAdmission($studentId, $universityId1);
        }
        if ($request->university2 != "") {
            $universityId2 = $request->university2;
            $this->studentRepository->createAdmission($studentId, $universityId2);
        }
        if ($request->university3 != "") {
            $universityId3 = $request->university3;
            $this->studentRepository->createAdmission($studentId, $universityId3);
        }
        if ($request->university4 != "") {
            $universityId4 = $request->university4;
            $this->studentRepository->createAdmission($studentId, $universityId4);
        }
        if ($request->university5 != "") {
            $universityId5 = $request->university5;
            $this->studentRepository->createAdmission($studentId, $universityId5);
        }
    }

    public function passEdit($id)
    {
        $student = self::getById($id);
        $admissions = $this->studentRepository->getAdmissionByStudentId($student->id);
        $universities = [];
        foreach ($admissions as $admission) {
            $universities[] = $this->studentRepository->getUniversityByUniversityId($admission->university_id);
        }
        return compact('student', 'universities');
    }

    public function passUpdate($request, $id)
    {
        $beforeUniversityId = $request->beforeEditUniversity;
        $afterUniversityId = $request->afterEditUniversity;
        // dd($request->afterEditUniversity);
        $admission = $this->studentRepository->getAdmissionByStudentIdAndUniversiyId($id, $beforeUniversityId);
        $admission->university_id = $afterUniversityId;
        $this->studentRepository->updateAdmission($admission);
    }

    public function passDestroy($request, $id)
    {
        // dd($request);
        $beforeUniversityId = $request->beforeEditUniversity;
        $admission = $this->studentRepository->getAdmissionByStudentIdAndUniversiyId($id, $beforeUniversityId);
        // dd($admission);
        $this->studentRepository->destroyAdmission($admission);
    }
}
