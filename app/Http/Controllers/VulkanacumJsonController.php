<?php

namespace App\Http\Controllers;
use App\Models\Vulkanacum;
use Illuminate\Http\Request;

class VulkanacumJsonController extends Controller
{
    public function index(){
        $vulkanacum = Vulkanacum::all();
        return json_encode($vulkanacum);
    }
}
