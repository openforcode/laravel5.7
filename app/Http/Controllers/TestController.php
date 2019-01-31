<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class TestController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $studens = Student::search('周伯通')->get()->toArray();
        print_r($studens);
    }
}
