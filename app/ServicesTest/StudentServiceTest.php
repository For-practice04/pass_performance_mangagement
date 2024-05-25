<?php

// use PHPUnit\Framework\TestCase;

use Tests\TestCase;
use App\Services\StudentService;

use App\Repositories\StudentRepository;
use Mockery as m;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Student;

require_once 'app/Services/StudentService.php';

class StudentServiceTest extends TestCase
{
    private $studentRepository; // この行を追加
    private $studentService; // StudentServiceのインスタンスも保持するために追加
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testindex()
    {
        $mockRepository = $this->createMock(StudentRepository::class);
        $student = new Collection([
            new Student(['id' => 1, 'name' => 'Alice']),
            new Student(['id' => 2, 'name' => 'Bob'])
        ]);
        $originalStudent = new Collection($student);
        // foreach ($student as $item) {
        //     $student->push(clone $item);
        // }
        $mockRepository->method('getAllStudent')->willReturn($student);

        $studentService = new StudentService($mockRepository);
        $result = $studentService->index();
        print_r('確認' . $result);
        // 結果を検証
        // $this->assertCount(2, $result);
        print_r('確認3' . $originalStudent);
        $this->assertEquals($originalStudent, $result);
        // $this->assertEquals('Bob', $result[1]->name);
    }
    protected function tearDown(): void
    {
        m::close();
    }
}
