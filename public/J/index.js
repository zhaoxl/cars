// JavaScript Document
	document.addEventListener('touchstart',function(){},false);
	
	
	
	$(document).ready(function(){
		$("#tpl_checkCar").hide()
        $("#tpl_myCar .TopBigBox .rightBox").click(function(){
			$("#tpl_xzBox").show();
			$("#tpl_myCar").hide();
		})
		$(".xzBigBox .CL").click(function(){
			$("#tpl_addCar").show();
			$("#tpl_myCar").hide();
		})
		$("#tpl_addCar .showBox .TopBigBox .leftBox").click(function(){
			$("#tpl_xzBox").show();
			$("#tpl_addCar").hide();
			})
		$("#tpl_xzBox .TopBigBox .leftBox").click(function(){
			$("#tpl_myCar").show();
			$("#tpl_xzBox").hide();
			})
		$(".myCar").click(function(){
			$("#tpl_checkCar").show();
			$("#tpl_myCar").hide();
		})
		$("#tpl_checkCar .TopBigBox .leftBox").click(function(){
			$("#tpl_myCar").show();
			$("#tpl_checkCar").hide();
			})
			
		$(".myCar1").click(function(){
			$("#tpl_mylicense").show();
			$("#tpl_myCar").hide();
		})
		$(".mylicense .leftBox").click(function(){
			$("#tpl_myCar").show();
			$("#tpl_mylicense").hide();
			})
		// $('.carListBox1 ul li').click(function(){
// 			$('.carList11').show();
// 			$('.carListBox1').hide();
// 		})
		// $('.carList11 .leftBox').click(function(){
// 			$('.carList11').hide();
// 			$('.carListBox1').show();
// 			})
			
    });
	
	
	/*汽车详情*/
	$(document).ready(function(){
        $(".checkCarBox .carBox1 .gs,.FF").click(function(){
			$(this).parents('.carBox1').next().slideToggle();
			})
    });
	
	/*汽车列表*/
	    	$(document).ready(function(){
            $("#tpl_addCar #RR").click(function(){
				$("#tpl_addCar .carListBox").show();
			})
			$("#tpl_addCar .carListBox .TopBigBox .leftBox").click(function(){
				$("#tpl_addCar .carListBox").hide();
			})
			$("#tpl_addCar .carList1 li").click(function(){
				$("#tpl_addCar .carListBox1").show();
			})
			$("#tpl_addCar .carListBox1 .TopBigBox .leftBox").click(function(){
				$("#tpl_addCar .carListBox1").hide();
			})
        });
	/*保险公司列表*/
	$(document).ready(function(){
            $("#tpl_addCar #EE").click(function(){
				$("#tpl_addCar .showBox2").show();
				})
			$("#tpl_addCar .showBox2 .TopBigBox .leftBox").click(function(){
				$("#tpl_addCar .showBox2").hide();
				})
        });
	/*保险内容列表*/
	    $(document).ready(function(){
        $("#tpl_addCar .content").click(function(){
			$("#tpl_addCar .showBox1").show();
			})
		$("#tpl_addCar .showBox1 .TopBigBox .leftBox").click(function(){
			$("#tpl_addCar .showBox1").hide();
			})
        });
	
	/*修改详情的表单*/
			$(document).ready(function(){
			$("#tpl_checkCar .TopBigBox .rightBox1").click(function(){
				$("#tpl_addCar1").show();
				$("#tpl_checkCar").hide();
			})
			$("#tpl_addCar1 .showBox .leftBox").click(function(){
				$("#tpl_checkCar").show();
				$("#tpl_addCar1").hide();
			})
			});
	
	
		/*汽车列表*/
	    	$(document).ready(function(){
            $("#tpl_addCar1 #RR").click(function(){
				$("#tpl_addCar1 .carListBox").show();
			})
			$("#tpl_addCar1 .carListBox .TopBigBox .leftBox").click(function(){
			$("#tpl_addCar1 .carListBox").hide();
			})
			$("#tpl_addCar1 .carList1 li").click(function(){
			$("#tpl_addCar1 .carListBox1").show();
			})
			$("#tpl_addCar1 .carListBox1 .TopBigBox .leftBox").click(function(){
			$("#tpl_addCar1 .carListBox1").hide();
			})
        });
	/*保险公司列表*/
	$(document).ready(function(){
            $("#tpl_addCar1 #EE").click(function(){
				$("#tpl_addCar1 .showBox2").show();
				})
			$("#tpl_addCar1 .showBox2 .TopBigBox .leftBox").click(function(){
				$("#tpl_addCar1 .showBox2").hide();
				})
        });
	/*保险内容列表*/
	    $(document).ready(function(){
        $("#tpl_addCar1 .content").click(function(){
			$("#tpl_addCar1 .showBox1").show();
			})
		$("#tpl_addCar1 .showBox1 .TopBigBox .leftBox").click(function(){
			$("#tpl_addCar1 .showBox1").hide();
			})
        });
		
		/*我的驾照*/
	
	

	    				$(document).ready(function(){
                        $(".qrqxBigBox .FF2").click(function(){
							$(".showBox1").hide()
							$(".showBox2").hide()
							$(".carListBox1").hide()
							})
						$(".xzBox .JZ").click(function(){
							$("#tpl_xzBox").hide();
							$("#tpl_jzBox").show();
							})
						$("#tpl_jzBox .leftBox").click(function(){
							$("#tpl_xzBox").show();
							$("#tpl_jzBox").hide();
							})
                   		 });
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*我的驾照-----修改*/
	$(document).ready(function(){
            $(".mylicense .rightBox1").click(function(){
				$(".mylicense1").show();
				$(".mylicense").hide();
			})
			$(".mylicense1 .leftBox").click(function(){
				$(".mylicense1").hide();
				$(".mylicense").show();
			})
        });
		
		
		

		$(document).ready(function(){
            $('.showBox2 .company ul li').click(function(){
			$('.showBox2').hide()
			})
			$('.showBox2 .company ul li').each(function(){
                $(this).click(function(){
					var e = $(this).children('p').text();
					$('.qq').val(e);
					})
            });
        });

