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
        $studens = Student::search('no die')->get()->toArray();
        print_r($studens);
    }
}
