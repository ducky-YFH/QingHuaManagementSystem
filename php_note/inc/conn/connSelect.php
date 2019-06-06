<?php
/*封装好的查询函数*/
// function mysql_search($sql)
// {
//     $connect = mysqli_connect("127.0.0.1", "root", "123456", "yefh_school");
//     //查询语句
//     if (!$connect) {
//         exit('连接失败');
//     }
//     $query = mysqli_query($connect, $sql);
//     if (!$query) {
//         exit("查询语句有错");
//     }
//     while ($row = mysqli_fetch_assoc($query)) {
//         $rows[] = $row;
//     }
//     mysqli_free_result($query);
//     mysqli_close($connect);
//     if (empty($rows)) {
//         return;
//     }
//     return $rows;
// }

$connect = mysqli_connect("127.0.0.1", "selectUser", "123456", "yefh_school");
if (!$connect) {
    echo "连接数据库失败！";
}
?>
