<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CarsController extends Controller
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
				
			$model_id = $request['model_id'];
			$insurance_companie_id = $request['insurance_companie_id'];
			$buy_at = $request['buy_at'];
			$buy_address = $request['buy_address'];
			$check_at = $request['check_at'];
			$maintain_at = $request['maintain_at'];
			$identifier = $request['identifier'];
			$engine_code = $request['engine_code'];
			$certificate = $request['certificate'];
			$insurance_quantity = $request['insurance_quantity'];
			$insurance_at = $request['insurance_at'];
			$insurance_content = $request['insurance_content'];
							
			if(empty($model_id))
			{
				return redirect()->back()->withErrors(['name' => '请选择车辆品牌']);
			}
			if(empty($insurance_companie_id))
			{
				return redirect()->back()->withErrors(['number' => '请选择保险公司']);
			}
			if(empty($buy_at))
			{
				return redirect()->back()->withErrors(['category' => '请输入购买日期']);
			}
			if(empty($buy_address))
			{
				return redirect()->back()->withErrors(['receive_at' => '请输入汽车购买的详细地址']);
			}
			if(empty($check_at))
			{
				return redirect()->back()->withErrors(['check_at' => '请输入年检日期']);
			}
			if(empty($maintain_at))
			{
				return redirect()->back()->withErrors(['check_at' => '请输入保养日期']);
			}
			if(empty($identifier))
			{
				return redirect()->back()->withErrors(['check_at' => '请输入车辆识别号']);
			}
			if(empty($engine_code))
			{
				return redirect()->back()->withErrors(['check_at' => '请输入发动机号']);
			}
			if(empty($certificate))
			{
				return redirect()->back()->withErrors(['check_at' => '请输入证书编号']);
			}
			if(empty($insurance_quantity))
			{
				return redirect()->back()->withErrors(['check_at' => '请输入保险金额']);
			}
			if(empty($insurance_at))
			{
				return redirect()->back()->withErrors(['check_at' => '请输入保险时间']);
			}
			// if(empty($insurance_content))
// 			{
// 				return redirect()->back()->withErrors(['check_at' => '请选择已购买的保险']);
// 			}
			
			
			$staff = \App\Car::create(array('user_id' => $user->id, 'model_id' => $model_id, 'insurance_companie_id' => $insurance_companie_id, 'buy_at' => $buy_at, 'buy_address' => $buy_address, 'check_at' => $check_at, 'maintain_at' => $maintain_at, 'identifier' => $identifier, 'engine_code' => $engine_code, 'certificate' => $certificate, 'insurance_quantity' => $insurance_quantity, 'insurance_at' => $insurance_at, 'insurance_content' => $insurance_content));

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
        //
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
