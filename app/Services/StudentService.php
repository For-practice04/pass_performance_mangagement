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


    protected $repository;
    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public  function index(): Collection
    {
        // $studentService = new StudentService(new StudentRepository());
        $students = $this->studentRepository->getAllStudent();
        // foreach ($students as $student) {
        //     if ($student->id == 1) {
        //         $student->id = 2;
        //     }
        // }
        print_r('確認2' . $students);
        return $students;
    }
    public static function getById($id): Student
    {
        $student = StudentRepository::getById($id);
        return $student;
    }
    public static function store($request): Student
    {
        // dd($request);

        $student = new Student();
        $student->name = $request->name;
        $student->gender = $request->gender;
        $birth_date = sprintf('%04d-%02d-%02d', $request->birth_year, $request->birth_month, $request->birth_day);
        $student->birth_date = $birth_date;
        $student->club = $request->club;
        $student->cram_school = $request->cram_school;
        // dd($birth_date);
        $student = StudentRepository::createStudent($student);
        return $student;
    }
    public static function show($id): array
    {
        $student = self::getById($id);
        $admissions = StudentRepository::getAdmissionByStudentId($student->id);

        // dd($admissions);
        $universities = [];
        foreach ($admissions as $admission) {
            $universities[] = StudentRepository::getUniversityByUniversityId($admission->university_id);
        }
        // dd($universities);
        return compact('student', 'universities');
    }
    public static function edit($id): array
    {
        $student = self::getById($id);
        list($birthDateYear, $birthDateMonth, $birthDateDay) = explode('-', $student->birth_date);
        $birthDateMonth = ltrim($birthDateMonth, '0');
        $birthDateDay = ltrim($birthDateDay, '0');
        return compact('student', 'birthDateYear', 'birthDateMonth', 'birthDateDay');
    }

    public static function updateStudent(Request $request, int $id)
    {
        $student = StudentRepository::getbyId($id);
        $student->name = $request->name;
        $student->gender = $request->gender;
        $birth_date = sprintf('%04d-%02d-%02d', $request->birth_year, $request->birth_month, $request->birth_day);
        $student->birth_date = $birth_date;
        $student->club = $request->club;
        $student->cram_school = $request->cram_school;
        StudentRepository::updateStudent($student);
    }
    public static function destroyStudent(int $id)
    {
        $student = StudentRepository::getbyId($id);
        // $admissions = [];
        $admissions = StudentRepository::getAdmissionByStudentId($id);
        // $admissionsArray = $admissions->toArray();
        foreach ($admissions as $admission) {
            StudentRepository::destroyAdmission($admission);
        }
        StudentRepository::destroyStudent($student);
    }


    public static function passRegist($request)
    {
        $studentId = $request->id;
        if ($request->university1 != "") {
            $universityId1 = $request->university1;
            StudentRepository::createAdmissiion($studentId, $universityId1);
        }
        if ($request->university2 != "") {
            $universityId2 = $request->university2;
            StudentRepository::createAdmissiion($studentId, $universityId2);
        }
        if ($request->university3 != "") {
            $universityId3 = $request->university3;
            StudentRepository::createAdmissiion($studentId, $universityId3);
        }
        if ($request->university4 != "") {
            $universityId4 = $request->university4;
            StudentRepository::createAdmissiion($studentId, $universityId4);
        }
        if ($request->university5 != "") {
            $universityId5 = $request->university5;
            StudentRepository::createAdmissiion($studentId, $universityId5);
        }
    }

    public static function passEdit($id)
    {
        $student = self::getById($id);
        $admissions = StudentRepository::getAdmissionByStudentId($student->id);
        $universities = [];
        foreach ($admissions as $admission) {
            $universities[] = StudentRepository::getUniversityByUniversityId($admission->university_id);
        }
        // $universities = [];
        // foreach ($admissions as $admission) {
        //     $universities[] = StudentRepository::getUniversityByUniversityId($admission->university_id);
        // }
        // print_r($universities);
        // dd($universities);
        return compact('student', 'universities');
    }

    public static function passUpdate($request, $id)
    {
        $beforeUniversityId = $request->beforeEditUniversity;
        $afterUniversityId = $request->afterEditUniversity;
        // dd($request->afterEditUniversity);
        $admission = StudentRepository::getAdmissionByStudentIdAndUniversiyId($id, $beforeUniversityId);
        $admission->university_id = $afterUniversityId;
        StudentRepository::updateAdmission($admission);
    }

    public static function passDestroy($request, $id)
    {
        // dd($request);
        $beforeUniversityId = $request->beforeEditUniversity;
        $admission = StudentRepository::getAdmissionByStudentIdAndUniversiyId($id, $beforeUniversityId);
        // dd($admission);
        StudentRepository::destroyAdmission($admission);
    }
}
