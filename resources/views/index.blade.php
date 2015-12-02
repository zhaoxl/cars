<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
<link rel="stylesheet" href="C/index.css">
<script src="J/jquery-1.9.1.min.js"></script>
<script src="J/jquery.validate.min.js"></script>
<script src="J/index.js"></script>
</head>

<body>

<!--我的车辆-->
	<div class="page" id="tpl_myCar">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>错误!</strong> 输入信息有误.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
        <!--顶部-->
        <div class="TopBigBox">
            <div class="leftBox">
            </div>
            <p>我的车辆</p>
            <div class="rightBox">
            </div>
        </div>
        <!--我的车辆-->
        
        <div class="myCarBox">
						@foreach ($cars as $data)
            <dl class="myCar" data-car_id="{{$data->id}}">
            <dt><img src="P/cl1.gif"></dt>
            <dd>
                <div class="rightCarBox">
                    <span class="wz"><a>违章</a></span>
                    <span class="by"><a>保养</a></span>
                </div>
                <div class="leftCarBox">
                    <p>{{$data->carName()}}</p>
                    <p>车牌:吉A3464G</p>
                </div>
            </dd>
            </dl>
						@endforeach
            
            <dl class="myCar1">
            <dt><img src="P/cl2.gif"></dt>
            <dd>
                <div class="rightCarBox">
                    <span class="wz"><a>违章</a></span>
                    <span class="nj"><a>年检</a></span>
                </div>
                <div class="leftCarBox">
                    <p>{{$license->name}}</p>
                    <p>驾照:{{$license->safeNumber()}}</p>
                </div>
            </dd>
            </dl>
      </div>
	</div>
<!--选择添加-->
    <div class="page" id="tpl_xzBox" style=" display:none;">
        <!--顶部-->
        <div class="TopBigBox" style=" border-bottom:#f2f2f2 solid 1px;">
            <div class="leftBox">
            </div>
            <p>选择添加</p>
        </div>
        <div class="xzBigBox">
            <div class="xzBox">
            <button class="CL">添加车辆信息</button>
            </div>
            <div class="xzBox">
            <button class="JZ">添加驾照信息</button>
            </div>
        </div>
    </div>
<!--添加驾照信息-->
	<div class="page" id="tpl_jzBox" style=" display:none;">
  	<!--顶部-->
    <div class="TopBigBox" style=" border-bottom:#f2f2f2 solid 1px;">
    	<div class="leftBox"></div>
      <p>添加驾照</p>
    </div>
    <form id="form_licenses_create" action="/api/licenses" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	    <div class="mylicenseBox">
				<dl>
		    	<dt>驾照姓名</dt>
		        <dd><input placeholder="姓名" name="name" data-rule-required="true" data-msg-required="请输入驾照姓名" maxlength="5" /></dd>
		    </dl>
		    <dl>
		    	<dt>驾驶证号</dt>
		        <dd><input placeholder="驾驶证" name="number" data-rule-required="true" data-msg-required="请输入驾驶证号" data-rule-minlength="18" data-msg-minlength="驾驶证号格式错误" maxlength="18"></dd>
		    </dl>
		    <dl>
		    	<dt>准驾车型</dt>
		        <dd><input placeholder="准驾车型" name="category" data-rule-required="true" data-msg-required="请输入准驾车型" maxlength="2"></dd>
		    </dl>
		    <dl>
		    	<dt>领证时间</dt>
		        <dd><input type="date" placeholder="2015-01-01" name="receive_at" data-rule-required="true" data-msg-required="请输入领证时间" maxlength="10" data-rule-isDate="true" data-msg-isDate="领证时间格式错误" /></dd>
		    </dl>
		    <dl>
		    	<dt>年检时间</dt>
		        <dd><input type="date" placeholder="2021-01-01" name="check_at" data-rule-required="true" data-msg-required="请输入领证时间" maxlength="10" data-rule-isDate="true" data-msg-isDate="年检时间格式错误" /></dd>
		    </dl>
		    <div class="mylicenseButtonBox"><button>保存</button></div>
			</div>
		</form>
	</div>
<!--添加车辆-->
<div class="page" id="tpl_addCar" style=" display:none;">
    <div class="showBox">
        <div class="TopBigBox">
            <div class="leftBox">
            </div>
            <p>添加车辆</p>
        </div>
				<form id="form_cars_create" action="/api/cars" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	        <div class="addCarBox">
	            <dl>
	                <dt>车辆品牌</dt>
	                <dd>
	                    <input id="RR" class="RR" placeholder="点击选择车辆品牌" data-rule-required="true" data-msg-required="请选择车辆品牌" readonly>
											<input type="hidden" id="model_id" name="model_id" />
	                </dd>
	            </dl>
	            <dl>
	                <dt>购买日期</dt>
	                <dd><input type="date" name="buy_at" data-rule-required="true" data-msg-required="请输入购买日期" maxlength="10" data-rule-isDate="true" data-msg-isDate="时间格式错误"></dd>
	            </dl>
	            <dl>
	                <dt>购买地点</dt>
	                <dd><input placeholder="汽车购买的详细地址" name="buy_address" data-rule-required="true" data-msg-required="请输入汽车购买的详细地址"></dd>
	            </dl>
	            <dl>
	                <dt>年检日期</dt>
	                <dd><input type="date" name="check_at" data-rule-required="true" data-msg-required="请输入年检日期" maxlength="10" data-rule-isDate="true" data-msg-isDate="时间格式错误"></dd>
	            </dl>
	            <dl>
	                <dt>保养日期</dt>
	                <dd><input type="date" name="maintain_at" data-rule-required="true" data-msg-required="请输入保养日期" maxlength="10" data-rule-isDate="true" data-msg-isDate="时间格式错误"></dd>
	            </dl>
	            <dl>
	                <dt>车辆识别号</dt>
	                <dd><input placeholder="汽车识别号" name="identifier" data-rule-required="true" data-msg-required="请输入车辆识别号"></dd>
	            </dl>
	            <dl>
	                <dt>发动机号</dt>
	                <dd><input placeholder="发动机号码" name="engine_code" data-rule-required="true" data-msg-required="请输入发动机号"></dd>
	            </dl>
	            <dl>
	                <dt>证书编号</dt>
	                <dd><input placeholder="证明编号" name="certificate" data-rule-required="true" data-msg-required="请输入证书编号"></dd>
	            </dl>
	            <dl>
	                <dt>保险公司</dt>
	                <dd><input class="qq" id="EE" name="insurance_companie" placeholder="选择保险公司" data-rule-required="true" data-msg-required="请选择保险公司" readonly>
										<input type="hidden" name="insurance_companie_id" id="insurance_companie_id" />
	                </dd>
	            </dl>
	            <dl>
	                <dt>保险金额</dt>
	                <dd><input placeholder="保险金额" name="insurance_quantity" data-rule-required="true" data-msg-required="请输入保险金额"></dd>
	            </dl>
	            <dl>
	                <dt>保险时间</dt>
	                <dd><input type="date" name="insurance_at" data-rule-required="true" data-msg-required="请输入保险时间" maxlength="10" data-rule-isDate="true" data-msg-isDate="时间格式错误"></dd>
	            </dl>
	            <dl>
	                <dt>保险内容</dt>
	                <dd><input class="content" value="选择已购买的保险" name="insurance_content" readonly></dd>
	            </dl>
	            <div class="addCarButton"><button>提交车辆信息</button></div>
	        </div>
				</form>
    </div>
    <!--保险内容弹出-->
    <div class="showBox1" style=" display:none;">
    	<div class="TopBigBox">
            <div class="leftBox">
            </div>
            <p>保险内容</p>
    	</div>
            <div class="contentBox">
            	<ul>
                	<li><label><p>交通事故责任强保险</p><input type="checkbox"></label></li>
                    <li><label><p>第三者责任险</p><input type="checkbox"></label></li>
                    <li><label><p>车辆损失险</p><input type="checkbox"></label></li>
                    <li><label><p>全车强盗险</p><input type="checkbox"></label></li>
                    <li><label><p>玻璃单独破碎险</p><input type="checkbox"></label></li>
                    <li><label><p>自燃损失险</p><input type="checkbox"></label></li>
                    <li><label><p>不计免赔特约险</p><input type="checkbox"></label></li>
                    <li><label><p>无过责任险</p><input type="checkbox"></label></li>
                    <li><label><p>车上人员责任险</p><input type="checkbox"></label></li>
                    <li><label><p>车身划痕险</p><input type="checkbox"></label></li>
                    <li><label><p>司机座位责任险</p><input type="checkbox"></label></li>
                    <li><label><p>乘客座位责任险</p><input type="checkbox"></label></li>
                    <li><label><p>涉水险/发动机特别损失险</p><input type="checkbox"></label></li>
                </ul>
                <div class="qrqxBigBox">
                <button class="FF2"  style=" background-color:#ccc">取消</button><button style=" background-color:#ff003c">确认</button>
                </div>
            </div>
    </div>
    <!--保险公司弹出-->
    <div class="showBox2" style=" display:none;">
    	<div class="TopBigBox">
            <div class="leftBox">
            </div>
            <p>保险公司</p>
    	</div>
      <div class="company" data-url="/api/insurance_companies">
      	<ul>
					@foreach ($insurance_companies as $data)
          <li data-id="{{$data->id}}" data-name="{{$data->name}}"><span><img src="P/bx.gif"></span><p>{{$data->name}}</p></li>
					@endforeach
          </ul>
      </div>
    </div>
    <!--汽车列表弹出-->
    <div class="carListBox" style=" display:none;">
        <div class="TopBigBox">
        		<div class="leftBox">
        		</div>
        		<p>汽车列表</p>
    		</div>
            <div class="carList">
              <div class="zmBox">
								@foreach ($brand_initials as $data)
                <a href="#{{$data->initial}}">{{$data->initials}}</a>
								@endforeach
            	</div>
            <div class="carList1">
							<?php $up_initials = '';?>
							@foreach($brands as $data)
								@if($up_initials != '' && $data->initials != $up_initials)
										</dd>
									</dl>
								@endif
								@if($up_initials != $data->initials)
		              <dl id="{{$data->initials}}">
		              	<dt>{{$data->initials}}</dt>
                    <dd>
								@endif
								<?php $up_initials = $data->initials?>
                			<li data-brandid="{{$data->brandid}}"><span class="tb"></span><p>{{$data->brandname}}</p><span class="xyb"></span></li>
							@endforeach
            </div>
        </div>
    </div>
    <!--汽车详细弹出-->
    <div class="carListBox1" style=" display:none;">
        <div class="TopBigBox">
        		<div class="leftBox">
        		</div>
        		<p>汽车列表</p>
    	</div>
        <div class="carList2">
            正在加载...
        </div>
    </div>
</div>
<div class="page carList11" style=" display:none;">
	<div class="TopBigBox">
        <div class="leftBox">
        </div>
        <p>汽车年份</p>
   	</div>
    <ul>
    	<li>2016款 30 TFSI 手动 舒适型</li>
        <li>2016款 30 TFSI 自动 舒适型</li>
        <li>2015款 30 TFSI 手动 舒适型</li>
        <li>2015款 30 TFSI 自动 舒适型</li>
    </ul>
</div>
<!--查看汽车-->
	<div class="page" id="tpl_checkCar">
	<div class="TopBigBox">
        <div class="leftBox">
        </div>
        <p>查看汽车</p>
        <div class="rightBox1">
        </div>
    </div>
    <div id="focus1" class="focus1">
				<div class="hd">
					<ul></ul>
				</div>
				<div class="bd">
					<ul>
							<li><a href="#"><img _src="images/m1.jpg" src="P/banner1.gif" /></a></li>
                            <p>暂无图片</p>
					</ul>
				</div>
	</div>
    <div class="checkCarBox">
    	<dl class="carBox1">
        <dd><div class="gs name"><p>正在加载...</p></div><span class="FF"></span></dd>
        </dl>
        <div class="carBox_11" style=" display:none;">
            <dl class="carBox">
                <dt>购买地点</dt>
                <dd><p class="buy_address">正在加载...</p></dd>
            </dl>
            <dl class="carBox">
                <dt>购买时间</dt>
                <dd><p class="buy_at">正在加载...</p></dd>
            </dl>
            <dl class="carBox">
                <dt>年检时间</dt>
                <dd><p class="check_at">正在加载...</p></dd>
            </dl>
            <dl class="carBox">
                <dt>保养日期</dt>
                <dd><p class="maintain_at">正在加载...</p></dd>
            </dl>
        </div>
    </div>
    <div class="checkCarBox">
    	<dl class="carBox1">
        <dd><div class="gs"><p class="insuranceCompanyName">平安保险有限公司</p></div><span style=" border-left:#f2f2f2 solid 1px;"><a href="tel://15043012317"></a></span></dd>
        </dl>
        <div class="carBox_11" style=" display:none;">
            <dl class="carBox">
                <dt>保险时间</dt>
                <dd><p class="insurance_at">正在加载...</p></dd>
            </dl>
            <dl class="carBox">
                <dt>保险金额</dt>
                <dd><p class="insurance_quantity">正在加载...</p></dd>
            </dl>
            <dl class="carBox">
                <dt>保养日期</dt>
                <dd><p>正在加载...</p></dd>
            </dl>
            <dl class="carBox">
                <dt>保险内容</dt>
                <dd><a>玻璃险</a><a>玻璃险</a><a>交通事故责任强保险</a><a>玻璃险</a><a>玻璃险</a><a>玻璃险</a><a>玻璃险</a><a>玻璃险</a></dd>
            </dl>
        </div>
    </div>
    <div class="loginBigBox">
    	<span></span><p>违章记录</p><button>刷新</button>
    </div>
    <div class="IllegalBox">
        <dl>
            <dt></dt>
            <dd><p>2015年11月25日（扣<b>2</b>分，罚款<b>200</b>元）</p><p>违章地点：工农大路与红旗街 违章停车：工农大路与红旗街 违章停车</p></dd>
            <span>1</span>
        </dl>
        <dl>
            <dt></dt>
            <dd><p>2015年11月10日（扣<b>4</b>分，罚款<b>400</b>元）</p><p>违章地点：工农大路与红旗街 违章停车</p></dd>
            <span>2</span>
        </dl>
        <dl>
            <dt></dt>
            <dd><p>2015年11月30日（扣<b>6</b>分，罚款<b>600</b>元）</p><p>违章地点：工农大路与红旗街 违章停车</p></dd>
            <span>3</span>
        </dl>
    </div>
	</div>
    
<!--我的驾照-->
<div class="page" id="tpl_mylicense" style=" display:none;">
	<div class="mylicense">
    <div class="TopBigBox">
        <div class="leftBox">
        </div>
        <p>我的驾照</p>
        <div class="rightBox1"></div>
    </div>
    <div class="checkCarBox">
    	<dl class="carBox1">
        <dd><div class="gs"><p>{{$license->name}}</p></div><span class="FF"></span></dd>
        </dl>
        <div class="carBox_11" style=" display:none;">
            <dl class="carBox">
                <dt>驾驶证号</dt>
                <dd><p>{{$license->number}}</p></dd>
            </dl>
            <dl class="carBox">
                <dt>准驾车型</dt>
                <dd><p>{{$license->category}}</p></dd>
            </dl>
            <dl class="carBox">
                <dt>领证时间</dt>
                <dd><p>{{$license->receive_at}}</p></dd>
            </dl>
            <dl class="carBox">
                <dt>年检时间</dt>
                <dd><p>{{$license->check_at}}</p></dd>
            </dl>
        </div>
    </div>
    <div class="loginBigBox">
    	<span></span><p>违章记录</p><button>刷新</button>
    </div>
    <div class="IllegalBox">
        <dl>
            <dt></dt>
            <dd><p>2015年11月25日（扣<b>2</b>分，罚款<b>200</b>元）</p><p>违章地点：工农大路与红旗街 违章停车</p></dd>
            <span>1</span>
        </dl>
        <dl>
            <dt></dt>
            <dd><p>2015年11月10日（扣<b>4</b>分，罚款<b>400</b>元）</p><p>违章地点：工农大路与红旗街 违章停车</p></dd>
            <span>2</span>
        </dl>
        <dl>
            <dt></dt>
            <dd><p>2015年11月30日（扣<b>6</b>分，罚款<b>600</b>元）</p><p>违章地点：工农大路与红旗街 违章停车</p></dd>
            <span>3</span>
        </dl>
    </div>
    </div>
    
    <div class="mylicense1" style=" display:none;">
    <div class="TopBigBox" style=" border-bottom:#f2f2f2 solid 1px;">
            <div class="leftBox">
            </div>
            <p>修改驾照</p>
        </div>

		    <form id="form_licenses_edit" action="/api/licenses/{{$license->id}}" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<input type="hidden" name="_method" value="PUT" />
			    <div class="mylicenseBox">
						<dl>
				    	<dt>驾照姓名</dt>
				        <dd><input placeholder="姓名" name="name" value="{{$license->name}}" data-rule-required="true" data-msg-required="请输入驾照姓名" maxlength="5" /></dd>
				    </dl>
				    <dl>
				    	<dt>驾驶证号</dt>
				        <dd><input placeholder="驾驶证" name="number" value="{{$license->number}}" data-rule-required="true" data-msg-required="请输入驾驶证号" data-rule-minlength="18" data-msg-minlength="驾驶证号格式错误" maxlength="18"></dd>
				    </dl>
				    <dl>
				    	<dt>准驾车型</dt>
				        <dd><input placeholder="准驾车型" name="category" value="{{$license->category}}" data-rule-required="true" data-msg-required="请输入准驾车型" maxlength="2"></dd>
				    </dl>
				    <dl>
				    	<dt>领证时间</dt>
				        <dd><input type="date" placeholder="2015-01-01" name="receive_at" value="{{$license->receive_at}}" data-rule-required="true" data-msg-required="请输入领证时间" maxlength="10" data-rule-isDate="true" data-msg-isDate="领证时间格式错误" /></dd>
				    </dl>
				    <dl>
				    	<dt>年检时间</dt>
				        <dd><input type="date" placeholder="2021-01-01" name="check_at" value="{{$license->check_at}}" data-rule-required="true" data-msg-required="请输入领证时间" maxlength="10" data-rule-isDate="true" data-msg-isDate="年检时间格式错误" /></dd>
				    </dl>
				    <div class="mylicenseButtonBox"><button>保存</button></div>
					</div>
				</form>
    	</div>
    </div>
</div>

<div class="page" id="tpl_addCar1" style=" display:none;">
    <div class="showBox">
        <div class="TopBigBox">
            <div class="leftBox">
            </div>
            <p>修改车辆</p>
        </div>
				<form id="form_cars_edit" action="/api/cars" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<input type="hidden" name="_method" value="PUT" />
	        <div class="addCarBox">
	            <dl>
	                <dt>车辆品牌</dt>
	                <dd>
	                    <input id="RR" class="RR" placeholder="点击选择车辆品牌" data-rule-required="true" data-msg-required="请选择车辆品牌" readonly>
											<input type="hidden" id="model_id" name="model_id" />
	                </dd>
	            </dl>
	            <dl>
	                <dt>购买日期</dt>
	                <dd><input type="date" name="buy_at" data-rule-required="true" data-msg-required="请输入购买日期" maxlength="10" data-rule-isDate="true" data-msg-isDate="时间格式错误"></dd>
	            </dl>
	            <dl>
	                <dt>购买地点</dt>
	                <dd><input placeholder="汽车购买的详细地址" name="buy_address" data-rule-required="true" data-msg-required="请输入汽车购买的详细地址"></dd>
	            </dl>
	            <dl>
	                <dt>年检日期</dt>
	                <dd><input type="date" name="check_at" data-rule-required="true" data-msg-required="请输入年检日期" maxlength="10" data-rule-isDate="true" data-msg-isDate="时间格式错误"></dd>
	            </dl>
	            <dl>
	                <dt>保养日期</dt>
	                <dd><input type="date" name="maintain_at" data-rule-required="true" data-msg-required="请输入保养日期" maxlength="10" data-rule-isDate="true" data-msg-isDate="时间格式错误"></dd>
	            </dl>
	            <dl>
	                <dt>车辆识别号</dt>
	                <dd><input placeholder="汽车识别号" name="identifier" data-rule-required="true" data-msg-required="请输入车辆识别号"></dd>
	            </dl>
	            <dl>
	                <dt>发动机号</dt>
	                <dd><input placeholder="发动机号码" name="engine_code" data-rule-required="true" data-msg-required="请输入发动机号"></dd>
	            </dl>
	            <dl>
	                <dt>证书编号</dt>
	                <dd><input placeholder="证明编号" name="certificate" data-rule-required="true" data-msg-required="请输入证书编号"></dd>
	            </dl>
	            <dl>
	                <dt>保险公司</dt>
	                <dd><input class="qq" id="EE" name="insurance_companie" placeholder="选择保险公司" data-rule-required="true" data-msg-required="请选择保险公司" readonly>
										<input type="hidden" name="insurance_companie_id" id="insurance_companie_id" />
	                </dd>
	            </dl>
	            <dl>
	                <dt>保险金额</dt>
	                <dd><input placeholder="保险金额" name="insurance_quantity" data-rule-required="true" data-msg-required="请输入保险金额"></dd>
	            </dl>
	            <dl>
	                <dt>保险时间</dt>
	                <dd><input type="date" name="insurance_at" data-rule-required="true" data-msg-required="请输入保险时间" maxlength="10" data-rule-isDate="true" data-msg-isDate="时间格式错误"></dd>
	            </dl>
	            <dl>
	                <dt>保险内容</dt>
	                <dd><input class="content" value="选择已购买的保险" name="insurance_content" readonly></dd>
	            </dl>
	            <div class="addCarButton"><button>提交车辆信息</button></div>
	        </div>
				</form>
    </div>
    <!--保险内容弹出-->
    <div class="showBox1" style=" display:none;">
    	<div class="TopBigBox">
            <div class="leftBox">
            </div>
            <p>保险内容</p>
    	</div>
            <div class="contentBox">
            	<ul>
                	<li><label><p>交通事故责任强保险</p><input type="checkbox"></label></li>
                    <li><label><p>第三者责任险</p><input type="checkbox"></label></li>
                    <li><label><p>车辆损失险</p><input type="checkbox"></label></li>
                    <li><label><p>全车强盗险</p><input type="checkbox"></label></li>
                    <li><label><p>玻璃单独破碎险</p><input type="checkbox"></label></li>
                    <li><label><p>自燃损失险</p><input type="checkbox"></label></li>
                    <li><label><p>不计免赔特约险</p><input type="checkbox"></label></li>
                    <li><label><p>无过责任险</p><input type="checkbox"></label></li>
                    <li><label><p>车上人员责任险</p><input type="checkbox"></label></li>
                    <li><label><p>车身划痕险</p><input type="checkbox"></label></li>
                    <li><label><p>司机座位责任险</p><input type="checkbox"></label></li>
                    <li><label><p>乘客座位责任险</p><input type="checkbox"></label></li>
                    <li><label><p>涉水险/发动机特别损失险</p><input type="checkbox"></label></li>
                </ul>
                <div class="qrqxBigBox">
                <button class="FF2"  style=" background-color:#ccc">取消</button><button style=" background-color:#ff003c">确认</button>
                </div>
            </div>
    </div>
    <!--保险公司弹出-->
    <div class="showBox2" style=" display:none;">
    	<div class="TopBigBox">
            <div class="leftBox">
            </div>
            <p>保险公司</p>
    	</div>
        <div class="company">
        	<ul>
						@foreach ($insurance_companies as $data)
	          <li data-id="{{$data->id}}" data-name="{{$data->name}}"><span><img src="P/bx.gif"></span><p>{{$data->name}}</p></li>
						@endforeach
          </ul>
        </div>
    </div>
    <!--汽车列表弹出-->
    <div class="carListBox" style=" display:none;">
        <div class="TopBigBox">
        		<div class="leftBox">
        		</div>
        		<p>汽车列表</p>
    		</div>
        <div class="carList">
          <div class="zmBox">
						@foreach ($brand_initials as $data)
            <a href="#{{$data->initial}}">{{$data->initials}}</a>
						@endforeach
        	</div>
        <div class="carList1">
					<?php $up_initials = '';?>
					@foreach($brands as $data)
						@if($up_initials != '' && $data->initials != $up_initials)
								</dd>
							</dl>
						@endif
						@if($up_initials != $data->initials)
              <dl id="{{$data->initials}}">
              	<dt>{{$data->initials}}</dt>
                <dd>
						@endif
						<?php $up_initials = $data->initials?>
            			<li data-brandid="{{$data->brandid}}"><span class="tb"></span><p>{{$data->brandname}}</p><span class="xyb"></span></li>
					@endforeach
        </div>
    </div>
    <!--汽车详细弹出-->
    <!--汽车详细弹出-->
    <div class="carListBox1" style=" display:none;">
        <div class="TopBigBox">
        		<div class="leftBox">
        		</div>
        		<p>汽车列表</p>
    	</div>
        <div class="carList2">
					正在加载...
        </div>
    </div>
</div>
<div class="page carList11" style=" display:none;">
	<div class="TopBigBox">
        <div class="leftBox">
        </div>
        <p>汽车年份</p>
   	</div>
    <ul class="model_list">
			正在加载...
    </ul>
</div>
<script type="text/javascript">
	TouchSlide({ 
		slideCell:"#focus1",
		titCell:".hd ul", 
		mainCell:".bd ul", 
		effect:"leftLoop", 
		autoPlay:true,
		autoPage:true,
	});
</script>
	
<style type="text/css" media="screen">
	.mylicenseBox dl dd input.error{color: red;}
	.addCarBox dl dd{height: 55px;}
	.addCarBox dl dd input.error{color: red;}
</style>
<script type="text/javascript">
	$(function(){
		//验证插件验证日期格式
		jQuery.validator.addMethod("isDate", function(value, element){
			var ereg = /^(\d{4})-(\d{2})-(\d{2})$/;
			var r = value.match(ereg);
			if (r == null) {
				return false;
			}
			var d = new Date(r[1], r[2] - 1, r[3]);
			var result = (d.getFullYear() == r[1] && (d.getMonth() + 1) == r[2] && d.getDate() == r[3]);
			return this.optional(element) || (result);
		}, "请输入正确的日期");
		//添加驾照表单提交事件
		$("#form_licenses_create").submit(function(){

		}).validate({
    	debug: false,
			onsubmit: true, 
			onfocusout: false,
			onkeyup: false,
			onclick: false,
			errorPlacement: function(error, element) {
				$("#form_licenses_create input.error").css("position", "absolute").each(function() {
					var left = $(this).position()["left"];
	        $(this).stop()
	        .animate({ left: (left-5)+"px" }, 10).animate({ left: (left+5)+"px" }, 10)
	        .animate({ left: (left)+"px" }, 10);
				});
			}
    });
		
		//添加车辆表单提交事件
		$("#form_cars_create").submit(function(){

		}).validate({
    	debug: false,
			onsubmit: true, 
			onfocusout: false,
			onkeyup: false,
			onclick: false,
			errorPlacement: function(error, element) {
				$("#form_cars_create input.error").css("position", "absolute").each(function() {
					var left = $(this).position()["left"];
	        $(this).stop()
	        .animate({ left: (left-5)+"px" }, 10).animate({ left: (left+5)+"px" }, 10)
	        .animate({ left: (left)+"px" }, 10);
				});
			}
    });
		//修改驾照表单提交事件
		$("#form_licenses_edit").submit(function(){

		}).validate({
    	debug: false,
			onsubmit: true, 
			onfocusout: false,
			onkeyup: false,
			onclick: false,
			errorPlacement: function(error, element) {
				$("#form_licenses_create input.error").css("position", "absolute").each(function() {
					var left = $(this).position()["left"];
	        $(this).stop()
	        .animate({ left: (left-5)+"px" }, 10).animate({ left: (left+5)+"px" }, 10)
	        .animate({ left: (left)+"px" }, 10);
				});
			}
    });
		
		//修改车辆表单提交事件
		$("#form_cars_edit").submit(function(){

		}).validate({
    	debug: false,
			onsubmit: true, 
			onfocusout: false,
			onkeyup: false,
			onclick: false,
			errorPlacement: function(error, element) {
				$("#form_cars_create input.error").css("position", "absolute").each(function() {
					var left = $(this).position()["left"];
	        $(this).stop()
	        .animate({ left: (left-5)+"px" }, 10).animate({ left: (left+5)+"px" }, 10)
	        .animate({ left: (left)+"px" }, 10);
				});
			}
    });
		
		//选择汽车品牌加载汽车系列
		$(".carList1 li").click(function(){
			$(".carList2").html("正在加载...");
			var brandid = $(this).attr('data-brandid');
	    $.ajax({
	      url: '/api/car_serials?brandid=' + brandid,
	      success: function(result) {
					$(".carList2").html(result);
					$('.carListBox1 ul li').click(function(){
						$('.carList11').show();
						$('.carListBox1').hide();	
					})
					//选择汽车系列加载汽车型号
					$(".carList2 li").click(function(){
						$(".model_list").html("正在加载...");
						var serialid = $(this).attr('data-serialid');
				    $.ajax({
				      url: '/api/car_models?serialid=' + serialid,
				      success: function(result) {
								$(".model_list").html(result);
								//选择汽车型号
								$(".model_list li").click(function(){
									$('.carList11').hide();
									$('.carListBox').hide();	
									$('.carListBox1').hide();	
									$(".RR").val($(this).attr('data-modelname'));
									$("[name='model_id']").val($(this).attr('data-modelid'));
								});
				      }
				    });
					});
					
	      }
	    });
		});
		
		//选择保险公司
		$(".company li").click(function(){
			$("[name='insurance_companie_id']").val($(this).attr('data-id'));
			$(".qq").val($(this).attr('data-name'));
		});
		
		//点击查看汽车详情
		$(".myCar").click(function(){
			var car_id = $(this).attr('data-car_id');
			$("#form_cars_edit").attr('action', '/api/cars/'+car_id);
			
	    $.ajax({
				dataType: 'json',
	      url: '/api/cars/' + car_id,
	      success: function(result) {
					//设置显示
					$("#tpl_checkCar .name p").html(result['carName']);
					$("#tpl_checkCar .buy_address").html(result['buy_address']);
					$("#tpl_checkCar .buy_at").html(result['buy_at']);
					$("#tpl_checkCar .check_at").html(result['check_at']);
					$("#tpl_checkCar .maintain_at").html(result['maintain_at']);
					$("#tpl_checkCar .insuranceCompanyName").html(result['insuranceCompanyName']);
					$("#tpl_checkCar .insurance_quantity").html(result['insurance_quantity']);
					$("#tpl_checkCar .insurance_at").html(result['insurance_at']);
					
					//设置表单
					$("#form_cars_edit #RR").val(result['carName']);
					$("#form_cars_edit #EE").val(result['insuranceCompanyName']);
					$("#form_cars_edit [name='model_id']").val(result['model_id']);
					$("#form_cars_edit [name='insurance_companie_id']").val(result['insurance_companie_id']);
					$("#form_cars_edit [name='buy_at']").val(result['buy_at']);
					$("#form_cars_edit [name='buy_address']").val(result['buy_address']);
					$("#form_cars_edit [name='check_at']").val(result['check_at']);
					$("#form_cars_edit [name='maintain_at']").val(result['maintain_at']);
					$("#form_cars_edit [name='identifier']").val(result['identifier']);
					$("#form_cars_edit [name='engine_code']").val(result['engine_code']);
					$("#form_cars_edit [name='certificate']").val(result['certificate']);
					$("#form_cars_edit [name='insurance_quantity']").val(result['insurance_quantity']);
					$("#form_cars_edit [name='insurance_at']").val(result['insurance_at']);
					$("#form_cars_edit [name='insurance_content']").val(result['insurance_content']);
	      }
	    });
			
		});
	});
</script>
</body>
</html>
