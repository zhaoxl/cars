<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LicensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			if(\Auth::guest()){
				return redirect("/");
			}

			$user = \Auth::user();
			//如果用户已经添加过驾驶证则添加失败
			if(\App\License::where('user_id', '=', $user->id)->first())
			{
				return redirect("/");
			}
				
			$name = $request['name'];
			$number = $request['number'];
			$category = $request['category'];
			$receive_at = $request['receive_at'];
			$check_at = $request['check_at'];
							
			if(empty($name))
			{
				return redirect()->back()->withErrors(['name' => '请输入驾照姓名']);
			}
			if(empty($number))
			{
				return redirect()->back()->withErrors(['number' => '请输入驾驶证号']);
			}
			if(empty($category))
			{
				return redirect()->back()->withErrors(['category' => '请输入准驾车型']);
			}
			if(empty($receive_at))
			{
				return redirect()->back()->withErrors(['receive_at' => '请输入领证时间']);
			}
			if(empty($check_at))
			{
				return redirect()->back()->withErrors(['check_at' => '请输入年检时间']);
			}
			
			
			$staff = \App\License::create(array('user_id' => $user->id, 'name' => $name, 'number' => $number, 'category' => $category, 'receive_at' => $receive_at, 'check_at' => $check_at));

			return redirect("/");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
			if(\Auth::guest()){
				return redirect("/");
			}

			$user = \Auth::user();
			
			$name = $request['name'];
			$number = $request['number'];
			$category = $request['category'];
			$receive_at = $request['receive_at'];
			$check_at = $request['check_at'];
							
			if(empty($name))
			{
				return redirect()->back()->withErrors(['name' => '请输入驾照姓名']);
			}
			if(empty($number))
			{
				return redirect()->back()->withErrors(['number' => '请输入驾驶证号']);
			}
			if(empty($category))
			{
				return redirect()->back()->withErrors(['category' => '请输入准驾车型']);
			}
			if(empty($receive_at))
			{
				return redirect()->back()->withErrors(['receive_at' => '请输入领证时间']);
			}
			if(empty($check_at))
			{
				return redirect()->back()->withErrors(['check_at' => '请输入年检时间']);
			}
			
			
			$staff = \App\License::find($id);
			$staff->name = $name;
			$staff->number = $number;
			$staff->category = $category;
			$staff->receive_at = $receive_at;
			$staff->check_at = $check_at;
			$staff->save();
			
			return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
