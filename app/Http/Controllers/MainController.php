<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TesteModels;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        
        $result = TesteModels::all()->toArray();
        echo "<pre>";
        print_r($result);
    }
}
