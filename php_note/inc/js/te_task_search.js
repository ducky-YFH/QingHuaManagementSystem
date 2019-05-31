function showContent(str, name, url) {
    if (str == "") {
        document.getElementById("ContentArea").innerHTML = "";
        return;
    }
    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        var xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ContentArea").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", url + "?" + name + "=" + str, true);
    xmlhttp.send();
    // console.log(url+"?" +name+  "=" + str);
}
$(function($) {
    // 1711140136-获取学年，学期，院系的选项用ajax加载数据
    $(".LTD_btn").on("click", function() {
        var $learn_year = $("select[name='learn_year']").val();
        var $term = $("select[name='learn_term']").val();
        var $dep = $("select[name='dep']").val();
        var url = 'content.php';
        var data = {
            learn_year: $learn_year,
            learn_term: $term,
            dep: $dep
        }
        $.get(url, data, function(responseText) {
            $("#ContentArea").html(responseText);
        });
    });
    // 1711140136-“系”下拉菜单的事件驱动
    $("select[name='dep']").on("change", function() {
        var $dep = $("select[name='dep']").val();
        $.ajax({
            async: false,
            url: 'linkage_query.php',
            type: 'get',
            dataType: 'json',
            data: {
                dep: $dep
            },
            success: function(res) {
                // 1711140136-如果没有这个数据就显示暂无纪录
                if (!res) {
                    $("select[name='search_class'],select[name='search_course'],select[name='search_te']").append("<option>暂无数据</option>");
                } else {
                    $("select[name='search_class'],select[name='search_course'],select[name='search_te']").children('option').remove();
                }
                ClassRes(res);
                CourseRes(res);
                TeRes(res);
            }
        });
    });

    function ClassRes(res) {
        $(res).each(function(i, res) {
            if (res['stu_class']) {
                $("select[name='search_class']").append("<option>" + res['stu_class'] + "</option>");
            } 
            else if (res['stu_class'] == "") {
                $("select[name='search_class']").append("<option>暂无纪录</option>");
            }
        });
    }

    function CourseRes(res) {
        $(res).each(function(i, res) {
            if (res['c_name']) {
                $("select[name='search_course']").append("<option>" + res['c_name'] + "</option>");
            } 
            else if (res['c_name'] == "") {
                $("select[name='search_course']").append("<option>暂无纪录</option>");
            }
        });
    }

    function TeRes(res) {
        $(res).each(function(i, res) {
            if (res['te_name']) {
                $("select[name='search_te']").append("<option>" + res['te_name'] + "</option>");
            }
            else if (res['te_name'] == "") {
                $("select[name='search_te']").append("<option>暂无纪录</option>");
            }
        });
    }
})