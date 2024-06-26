<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use App\Models\Admission;
use Illuminate\Http\Request;

use App\Services\StudentService;



class StudentController extends Controller
{
    private $studentService;
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->studentService->index();
        return view('admissions.list', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {

        $this->studentService->store($request);

        return to_route('admissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $student = StudentService::getById($id);
        // $admission = StudentService::getAdmissionByStudentId($student->id);
        // $universities = StudentService::getUniversityByUniversityId($admission->university_id);
        // // dd($student);
        $details = $this->studentService->show($id);
        return view('admissions.show', ['details' => $details]);
        // return view('admissions.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editInfo = $this->studentService->edit($id);
        $student = $editInfo['student'];
        $birthDateYear = $editInfo['birthDateYear'];
        $birthDateMonth = $editInfo['birthDateMonth'];
        $birthDateDay = $editInfo['birthDateDay'];
        // dd($birthDateYear);
        return view('admissions.edit', compact('student', 'birthDateYear', 'birthDateMonth', 'birthDateDay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, $id)
    {
        $this->studentService->updateStudent($request, $id);
        return to_route('admissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->studentService->destroyStudent($id);
        return to_route('admissions.index');
    }

    public function passRegist($id)
    {
        $student = $this->studentService->getById($id);
        // dd($student);
        return view('admissions.pass_regist', compact('student'));
    }
    public function passStore(Request $request)
    {
        $this->studentService->passRegist($request);

        return to_route('admissions.index');
    }

    public function passEdit($id)
    {
        $studentInfo = $this->studentService->passEdit($id);
        // dd($studentInfo['universities']);
        $universities = $studentInfo['universities'];
        // $universities = json_decode($universities, true);
        // print_r($universities);
        // response()->json($universities)->header('Content-Type', 'application/json; charset=utf-8');
        return view('admissions.pass_edit', compact('studentInfo', 'universities'));
    }

    public function passUpdate(Request $request, $id)
    {
        $this->studentService->passUpdate($request, $id);
        // $admission = Admission::find("3");
        // $admission->university_id = 2;
        // $admission->save();
        return to_route('admissions.index');
    }

    public function passDestroy(Request $request, $id)
    {
        $this->studentService->passDestroy($request, $id);
        // $admission = Admission::find("3");
        // $admission->university_id = 2;
        // $admission->save();
        return to_route('admissions.index');
    }
}
