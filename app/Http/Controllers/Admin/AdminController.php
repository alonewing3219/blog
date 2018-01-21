<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.check');
    }
   public function dashboard()
    {
        return view('home');
    }
}
