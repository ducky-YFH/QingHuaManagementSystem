$(document).ready(function() {
    $('.loginForm').bootstrapValidator({
        message: '登录信息不能为空',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                message: '输入的账号无效',
                validators: {
                    notEmpty: {
                        message: '请输入账号信息'
                    },
                    callback: {
                        message: '不存在这个用户'
                    },
                    stringLength: {
                        min: 3,
                        max: 20,
                        message: '账号信息必须为3到20个字母或数字'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: '账号只能由字母、数字和下划线组成'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: '密码不能为空！'
                    },
                    stringLength: {
                        min: 6,
                        max: 20,
                        message: '账号信息必须为6到20个字母或数字'
                    },
                    callback: {
                        message: "用户密码错误！"
                    }
                }
            },
        }
    }).on('success.form.bv', function(e) {
        e.preventDefault();
        // 表单序列化
        var form = $(e.target);
        var data = form.serialize();
        $.ajax({
            url : "adminDoLogin.php",
            data : data,
            type : "post",
            dataType : "json",
            success : function(data){
                if(data.success){
                    alert("登录成功！");
                    window.location = "admin.php";
                }else{
                    alert("登录失败！");
                }
            }
        });
    });
    // 重置按钮
    $(".btn-danger").on("click",function(){
        $("input[name=username]").val("");
        $("input[name=password]").val("");
    })
});