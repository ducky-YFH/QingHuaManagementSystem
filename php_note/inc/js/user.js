$(function(){
    // -----------------1711140136-validate使用-----------------
    $(".changePa").validate({
            rules: {
                oldPa: {
                    required: true,
                    minlength: 5,
                },
                newPa: {
                    required: true,
                    minlength: 5
                },
                newPa1: {
                    required: true,
                    minlength: 5,
                    equalTo: "#newPa",
                },
                Email: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                oldPa: {
                    required: "<span>请输入旧密码</span>",
                    minlength: "<span>密码长度不能小于5位数</span>",
                },
                newPa: {
                    required: "<span>请输入新密码</span>",
                    minlength: "<span>密码长度不能小于5位数</span>"
                },
                newPa1: {
                    required: "<span>请重新输入新密码</span>",
                    minlength: "<span>密码长度不能小于5位数</span>",
                    equalTo: "<span>输入的新密码不一致</span>"
                },
                Email: {
                    required: "<span>请输入邮箱</span>",
                    email: "<span>请输入正确的邮箱！</span>"
                },
            }
        })
   	// 如果有错误提示信息则为input加个红色边缘
    $("#oldPa,#newPa,#newPa1,#Email").on("blur",function(){
    	var state = $(this).siblings("label").css("display");
    	if($(this).siblings().is("label")){
    		$(this).css("border","1px solid red");
    	}
    	if(state !== 'block'){
    		$(this).css("border","");
    	}
    });
})