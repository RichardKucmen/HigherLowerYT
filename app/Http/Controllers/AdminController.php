<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware("has.role:admin|user");
    }
    public function index(){
        return "Admin";
    }
}
