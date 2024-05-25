<?php

// use PHPUnit\Framework\TestCase;

use App\Models\Admission;
use Tests\TestCase;
use App\Services\StudentService;

use App\Repositories\StudentRepository;
use Mockery as m;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Student;
use App\Models\University;

require_once 'app/Services/StudentService.php';

class StudentServiceTest extends TestCase
{
    private $studentService; // StudentServiceのインスタンスも保持するために追加
    private $expectedTestIndex; // ユニットテストの期待値 
    private $expectedTestIndex2; // ユニットテストの期待値 
    private $expectedTestGetById; // ユニットテストの期待値 
    private $expectedTestStore; // ユニットテストの期待値 
    private $expectedTestShow; // ユニットテストの期待値 
    public function setUp(): void
    {
        parent::setUp();
        $mockRepository = $this->createMock(StudentRepository::class);
        //--index()の戻り値と期待値を設定
        //テストケース:正常系 レコードが1つのみ場合
        //戻り値
        $student = new Collection([
            new Student(['id' => 1, 'name' => 'test1'])
        ]);
        //期待値
        $this->expectedTestIndex = clone $student;

        //テストケース:正常系 レコードが2つ以上の場合
        //戻り値
        $student2 = new Collection([
            new Student(['id' => 1, 'name' => 'test1']),
            new Student(['id' => 2, 'name' => 'test2'])
        ]);
        //期待値
        $this->expectedTestIndex2 = clone $student2;
        //mockメソッドを作成
        $mockRepository->method('getAllStudent')
            ->willReturnOnConsecutiveCalls($student, $student2);

        //--getById()の戻り値と期待値を設定
        //テストケース:正常系
        //戻り値
        $student3 = new Student(['id' => 3, 'name' => 'test3', 'gender' => '男', 'birth_date' => '1990-01-01', 'club' => 'バスケ', 'cram_school' => '通塾あり']);
        //期待値
        $this->expectedTestGetById = clone $student3;
        //mockメソッドを作成
        $mockRepository->method('getById')
            ->willReturn($student3);

        //--store()の戻り値と期待値を設定
        //テストケース:正常系 
        //戻り値
        $student4 = new Student(['id' => 1, 'name' => 'test4', 'gender' => '男', 'birth_date' => '1990-01-01', 'club' => 'バスケ', 'cram_school' => '通塾あり']);
        //期待値
        $this->expectedTestStore = clone $student4;
        //mockメソッドを作成
        $mockRepository->method('createStudent')
            ->willReturn($student4);

        //--show()の戻り値と期待値を設定
        //テストケース:正常系
        //戻り値
        $admission1 = new Collection([
            new Admission(['id' => 1, 'student_id' => 1, 'university_id' => 1]),
        ]);
        $university1 = new University(['id' => 1, 'name' => '大学1']);
        $cloneUniversity1 = clone $university1;
        //期待値
        $this->expectedTestShow = [$cloneUniversity1];
        //mockメソッドを作成
        $mockRepository->method('getAdmissionByStudentId')
            ->willReturn($admission1);
        $mockRepository->method('getUniversityByUniversityId')
            ->willReturn($university1);

        //--updateStudentの戻り値と期待値を設定
        //テストケース:正常系
        //mockメソッドを作成
        $mockRepository->method('updateStudent')
            ->willReturn($student3);

        //--destroyStudentの戻り値と期待値を設定
        //テストケース:正常系
        //mockメソッドを作成
        $mockRepository->method('destroyAdmission')
            ->willReturn($admission1);

        $mockRepository->method('destroyStudent')
            ->willReturn($student3);

        //--passRegistの戻り値と期待値を設定
        //テストケース:正常系
        //mockメソッドを作成
        $mockRepository->method('createAdmission');

        //--passUpdateの戻り値と期待値を設定
        //テストケース:正常系
        //戻り値
        $admission2 = new Admission(['id' => 2, 'student_id' => 2, 'university_id' => 2]);

        //mockメソッドを作成
        $mockRepository->method('getAdmissionByStudentIdAndUniversiyId')
            ->willReturn($admission2);
        $mockRepository->method('updateAdmission');

        //サービスにモックを設定
        $this->studentService = new StudentService($mockRepository);
    }

    public function testIndex()
    {
        $result = $this->studentService->index();
        $this->assertEquals($this->expectedTestIndex, $result);
        $result = $this->studentService->index();
        $this->assertEquals($this->expectedTestIndex2, $result);
    }
    public function testGetById()
    {
        $result = $this->studentService->getById(3);
        // print_r($result->toArray());
        $this->assertEquals($this->expectedTestGetById, $result);
    }
    public function testStore()
    {
        $student = new Student(['id' => 1, 'name' => 'test4', 'gender' => '男', 'birth_date' => '1990-01-01', 'club' => 'バスケ', 'cram_school' => '通塾あり']);
        $result = $this->studentService->store($student);
        // print_r($result->toArray());
        $this->assertEquals($this->expectedTestStore, $result);
    }
    public function testShow()
    {
        $result = $this->studentService->show(5);
        // print_r($result['universities']);
        $this->assertEquals($this->expectedTestGetById, $result['student']);
        $this->assertEquals($this->expectedTestShow, $result['universities']);
    }
    public function testEdit()
    { //1990-01-01
        $expectedBirthDateYear = '1990';
        $expectedBirthDateMonth = '1';
        $expectedBirthDateDay = '1';
        $result = $this->studentService->edit(6);
        // print_r($result);
        $this->assertEquals($this->expectedTestGetById, $result['student']);
        $this->assertEquals($expectedBirthDateYear, $result['birthDateYear']);
        $this->assertEquals($expectedBirthDateMonth, $result['birthDateMonth']);
        $this->assertEquals($expectedBirthDateDay, $result['birthDateDay']);
    }
    public function testUpdateStudent()
    {
        $student = new Student(['id' => 3, 'name' => 'test3', 'gender' => '男', 'birth_date' => '1990-01-01', 'club' => 'バスケ', 'cram_school' => '通塾あり']);


        $request = new Request();
        $request->merge($student->toArray());;

        $result = $this->studentService->updateStudent($request, 3);
        // print_r($result['universities']);
        $this->assertEquals(null, $result);
    }
    public function testDestroyStudent()
    {
        $result = $this->studentService->destroyStudent(3);
        $this->assertEquals(null, $result);
    }
    public function testPassRegist()
    {
        $request = new Request();
        // $studentId1 = "1";
        // $universityId1 = "1";
        $request->merge(['studentId' => 1, 'universityId' => 1]);
        $result = $this->studentService->passRegist($request);
        $this->assertEquals(null, $result);
    }
    public function testPassEdit()
    {
        $result = $this->studentService->passEdit(1);
        $this->assertEquals($this->expectedTestGetById, $result['student']);
        $this->assertEquals($this->expectedTestShow, $result['universities']);
    }
    public function testPassUpdate()
    {
        $request = new Request;
        $request->merge(['beforeEditUniversity' => 1, 'afterEditUniversity' => 2]);
        $result = $this->studentService->passUpdate($request, 2);
        $this->assertEquals(null, $result);
    }
    public function testPassDestroy()
    {
        $request = new Request;
        $request->merge(['beforeEditUniversity' => 2]);
        $result = $this->studentService->passUpdate($request, 2);
        $this->assertEquals(null, $result);
    }
    protected function tearDown(): void
    {
        m::close();
    }
}
