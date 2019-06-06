$(function($) {
    // 1711140136-获取学年，学期，院系的选项用ajax加载数据
    $(".LTD_btn").on("click", function() {
        var $learn_year = $("select[name='learn_year']").val();
        var $term = $("select[name='learn_term']").val();
        var $dep = $("select[name='dep']").val();
        var $stuClass = $("select[name='stuClass']").val();
        var url = 'stuContent.php';
        var data = {
            learn_year: $learn_year,
            learn_term: $term,
            dep: $dep,
            class: $stuClass,
        }
        $.get(url, data, function(responseText) {
            $("#ContentArea").html(responseText);
        });
    });
    $(".courseBtn").on("click",function(){
        var url = 'stuContent.php';
        var $course = $("select[name='course']").val();
        var data = {
            course: $course,
        }
        $.get(url, data, function(responseText) {
            $("#ContentArea").html(responseText);
        });
    })

    // 1711140136-联动代码
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