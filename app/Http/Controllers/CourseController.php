<?php
namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Course;
use App\Http\Resources\CourseResource;
use App\Http\Resources\LessonResource;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(10);
        return CourseResource::collection($courses);
    }

    public function show($id)
    {
        $course = Course::with(['lessons' => function ($query) {
            $query->paginate(5);
        }, 'students'])->findOrFail($id);

        return response()->json([
            'course' => new CourseResource($course),
            'lessons' => LessonResource::collection($course->lessons()->paginate(5)),
            'students' => StudentResource::collection($course->students),
        ]);
    }
}
