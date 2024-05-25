<?php

namespace App\Repositories;



use App\Models\Student;
use App\Models\Admission;
use App\Models\University;
use Illuminate\Database\Eloquent\Collection;


class StudentRepository
{
    public  function getAllStudent(): Collection
    {
        return Student::select('id', 'name', 'gender', 'birth_date', 'club')
            ->get();
    }
    public static function getbyId(int $id): Student
    {
        $student = Student::find($id);
        return $student;
    }
    public static function createStudent(Student $model): Student
    {
        $student = Student::create([
            'name' => $model->name,
            'gender' => $model->gender,
            'birth_date' => $model->birth_date,
            'club' => $model->club,
            'cram_school' => $model->cram_school,
        ]);
        return $student;
    }
    public static function updateStudent(Student $model): Student
    {
        $model->save();
        return $model;
    }
    public static function destroyStudent(Student $model)
    {
        $model->delete();
    }
    public static function createAdmissiion(int $studentId, int $universityID): Admission
    {
        $admission = Admission::create([
            'student_id' => $studentId,
            'university_id' => $universityID,
        ]);
        return $admission;
    }

    public static function getAdmissionByStudentId(int $studentId): Collection
    {
        $admission = Admission::select('id', 'student_id', 'university_id')
            ->where('student_id', $studentId)
            ->get();
        return $admission;
    }

    public static function getAdmissionByStudentIdAndUniversiyId(int $studentId, int $universityId): Admission
    {
        echo ($studentId);
        echo ($universityId);
        $admission = Admission::select('id', 'student_id', 'university_id')
            ->where('student_id', $studentId)
            ->where('university_id', $universityId)
            ->first();
        // var_dump($admission);
        // $model = new Admission();
        // $model->id = $admission->id;
        // $model->student_id = $admission->student_id;
        // $model->university_id = $admission->university_id;
        // $model->created_at = $admission->created_at;
        // $model->updated_at = $admission->updated_at;
        // dd($model);

        return $admission;
    }

    public static function updateAdmission(Admission $admission): Admission
    {
        // dd($admission);
        $admission->update();
        return $admission;
    }

    public static function destroyAdmission(Admission $admission)
    {
        // dd($admission);ls
        $admission->delete();
    }

    public static function getUniversityByUniversityId(int $universityId): University
    {
        $university = University::find($universityId);
        return $university;
    }
};
