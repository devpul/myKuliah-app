<?php

namespace App\Http\Controllers\Lecture;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function index()
    {
        return view('lecture.lecture');
    }

    public function create()
    {
        return view('lecture.create_lecture');
    }
}
