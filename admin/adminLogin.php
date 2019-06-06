<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>后台管理登录</title>
<link rel="stylesheet" href="../php_note/inc/vendors/bootstrap4/css/bootstrap.min.css">
<link rel="stylesheet" href="../php_note/inc/vendors/bootstrapvalidator/dist/css/bootstrapValidator.min.css">
<link rel="stylesheet" href="../php_note/inc/css/admin.css">

</head>
<body>
<div class="container">
  <div class="background">
    <div class="moon"></div>
    <img src="../php_note/inc/img/1.png" alt="">
    <img src="../php_note/inc/img/2.png" alt="">
  </div>
  <div class="login">
  <form class="loginForm">
      <div class="form-group inputMessage">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" id="username" />
      </div>
      <div class="form-group inputMessage">
          <label for="password">password</label>
          <input type="password" class="form-control" name="password" id="password" />
      </div>
      <div class="form-group buttonBox">
          <button type="submit" name="submit" class="btn btn-info">登录</button>
          <button type="button" class="btn btn-danger">清除</button>
      </div>
  </form>
</div>
</div>
<script src="../php_note/inc/js/jQuery/jquery-3.3.1.min.js"></script>
<script src="../php_note/inc/vendors/bootstrap4/js/bootstrap.min.js"></script>
<script src="../php_note/inc/vendors/bootstrapvalidator/dist/js/bootstrapValidator.min.js"></script>
<script src="../php_note/inc/js/admin.js"></script>
</body>
</html>