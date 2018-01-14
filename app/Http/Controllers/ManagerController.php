<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Http\Requests;


class ManagerController extends Controller
{
    
public function __construct(){
 $this->middleware('admin.check');
}

public function index(){

return view('test');
}

public function getManager(Request $request){

$store = DB::table('store')->select('id','name','address','phone');
$foods = DB::table('food')->select('id','name','thing','price');
if ($store->count()>0)
{
//print_r($store);
    return view('manager',['storelist' => $store->get(),
			 'foods' => $foods->get()]
		);
}

else {
    return 'nothing';
}

}
public function getStore(Request $request){
$input = $request;
DB::table('Select_Store')->insert([
	'meeting_time' => $input['meeting_time'],
'deadline' => $input['deadline'],
'store' => $input['store'],
]);
        return redirect('/manager');
}
}
