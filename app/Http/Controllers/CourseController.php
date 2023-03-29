<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseUpdateRankingRequest;
use App\Models\Course;

class CourseController extends Controller
{
    public function rank(CourseUpdateRankingRequest $request)
    {
        $input = $request->validated();

        Course::all()->each(function ($course) use ($input) {

            $key = array_search($course->id, $input['ids']);

            $course->ranking = $key;
            $course->update();
        });
    }
}
