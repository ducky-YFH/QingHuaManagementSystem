$(function(){
    $(".searchBtn").on("click",function(){
        var value = decodeURI($(".searchForm").serialize() || "");
        value = value.replace('find_score=','').split(">");
        var params = {"stuClass":value[0],"courseName":value[1]};
        getData(params,function(data){
            console.log(data);
            if(data.detail){
                var html = '<tr>'+
                    '<td>教师姓名：' + data.detail.te_name + ' </td>'+
                    '<td>课程名称：' + data.detail.c_name + '</td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td>班级：' + data.detail.stu_class + '</td>'+
                    '<td>学年学期：' + data.detail.task_term + '</td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td>课程性质：' + data.detail.c_type + '</td>'+
                    '<td>考核方式：' + data.detail.c_exam + '</td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td>输入规范提示：数字成绩不得超过100分</td>'+
                    '<td>输入记分制：总评好成绩保存为：</td>'+
                    '</tr>';
                $(".introduce_table").html(html);
            }
            if(data.stu){
                var i = 0
                $(".tbodyStu").html("");
                data.stu.forEach(item => {
                    i++;
                    var tbodyHtml = 
                    '<tr>'+
                    '<th scope="row"> ' + i + ' </th>'+
                    '<td> ' + item.stu_class + ' </td>'+
                    '<td> ' + item.stu_id + ' </td>'+
                    '<td> ' + item.stu_name + ' </td>'+
                    '<td><input placeholder=" '+ item.sc_final +' " type="text" class="form-control"></td>'+
                    '<td><input type="text" class="form-control"></td>'+
                    '<td><input type="text" class="form-control"></td>'+
                    '<td><input type="text" class="form-control"></td>'+
                    '<td><input placeholder=" ' + item.sc_overall + ' " type="text" class="form-control"></td>'+
                    '</tr>';
                    $(".tbodyStu").append(tbodyHtml);
                });
            }else{
                $(".tbodyStu").html('数据为空！');
            }
        })
    })
})

var getData = function(params,callback){
    $.ajax({
        type: "get",
        url: "../../../school/PHPAJAX/deal_te_score_in.php",
        data: params,
        dataType: "json",
        success: function (data) {
            callback && callback(data);
        }
    });
}