$(function() {
    // -------------------1711140136-获取头像-------------------
    $(".account").on("blur", function() {
        var avatar_val = $(".account").val();
        if (avatar_val == "1711140136") {
            $(".avatar>img").fadeOut(function() {
                $(this).on("load", function() {
                    $(this).fadeIn();
                }).attr("src", "php_note/inc/upload/admin.jpg");
            })
        }
    });
    // -----------------1711140136-validate使用-----------------
    $(".login_input").validate({
			// 1711140136-将错误信息统一放到一个容器
            errorLabelContainer: ".alert-danger",
            // errorClass: ".alert-danger",
            rules: {
                account: {
                    required: true,
                    minlength: 6,
                    digits: true,
                },
                password: {
                    required: true,
                    minlength: 5
                },
                role: {
                    required: true,
                },
                auth_code: {
                    required: true,
                },
            },
            messages: {
                account: {
                    required: "请输入教工号/学号，",
                    minlength: "教工号/学号有误，",
                    digits: "只能输入整数，",
                },
                password: {
                    required: "请输入密码，",
                    minlength: "密码长度不能小于5位数，"
                },
                role: {
                    required: "请选择身份，"
                },
                auth_code: {
                    required: "请填写验证码，"
                },
            }
        })
    // ---------------------1711140136-验证码---------------------
    // 171114013-生成随机数	
    function random_num(min, max) {
        return Math.floor(Math.random() * (max - min) + min);
    }
    // 171114013-生成随机颜色,颜色由rgb组成所以设置3个变量
    function random_color(min, max) {
        var R = random_num(min, max);
        var G = random_num(min, max);
        var B = random_num(min, max);
        return "rgb(" + R + "," + G + "," + B + ")";
    }
    // 171114013-画布的设置
    $("#auth_code canvas").on("click", function(e) {
        e.preventDefault();
        num = play_canvas();
    });

    function play_canvas() {
        // 171114013-取到元素canvas
        var $canvas = document.querySelector("#auth_code canvas");
        var _str = "0123456789"; // 171114013-置随机数库
        var _picTxt = ""; // 171114013-机数
        var _num = 4; // 171114013-个随机数字
        var _width = $canvas.width;
        var _height = $canvas.height;
        var ctx = $canvas.getContext("2d"); // 171114013-取 context 对象
        ctx.textBaseline = "bottom"; // 171114013-字上下对齐方式--底部对齐
        ctx.fillStyle = random_color(180, 240); // 171114013-充画布颜色
        ctx.fillRect(0, 0, _width, _height); // 171114013-充矩形--画画
        for (var i = 0; i < _num; i++) {
            var x = (_width - 10) / _num * i + 10;
            var y = random_num(_height / 2, _height);
            var deg = random_num(-45, 45);
            var txt = _str[random_num(0, _str.length)];
            _picTxt += txt; // 171114013-取一个随机数
            ctx.fillStyle = random_color(10, 100); // 171114013-充随机颜色
            ctx.font = random_num(16, 40) + "px SimHei"; // 171114013-置随机数大小，字体为SimHei
            ctx.translate(x, y); // 171114013-当前xy坐标作为原始坐标
            ctx.rotate(deg * Math.PI / 180); // 171114013-转随机角度
            ctx.fillText(txt, 0, 0); // 171114013-制填色的文本
            ctx.rotate(-deg * Math.PI / 180);
            ctx.translate(-x, -y);
        }
        for (var i = 0; i < _num; i++) {
            // 171114013-义笔触颜色
            ctx.strokeStyle = random_color(90, 180);
            ctx.beginPath();
            // 171114013-机划线--4条路径
            ctx.moveTo(random_num(0, _width), random_num(0, _height));
            ctx.lineTo(random_num(0, _width), random_num(0, _height));
            ctx.stroke();
        }
        for (var i = 0; i < _num * 10; i++) {
            ctx.fillStyle = random_color(0, 255);
            ctx.beginPath();
            // 171114013-机画原，填充颜色
            ctx.arc(random_num(0, _width), random_num(0, _height), 1, 0, 2 * Math.PI);
            ctx.fill();
        }
        return _picTxt; // 171114013-回随机数字符串
    }
    num = play_canvas();
    $form = $(".login_input");
    $(".btn-primary").on("click", function() {
    	$num = num;
        $AuthCodeVal = $("#auth_code input").val();
        console.log($AuthCodeVal);
        console.log(num);
        if ($AuthCodeVal !== "" && $AuthCodeVal !== $num) {
        	$(".alert-danger").fadeIn().html("验证码错误");
       		$("#auth_code input").val("");
        	num = play_canvas();
        	return false;
        }
    })
});