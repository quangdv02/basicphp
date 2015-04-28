<?php
include('../../db.php');
if(isset($_POST['ok'])){
    $data = validateForm($_POST['data']);
    if(!isset($data['error'])){
        if(checkLogin($data['email'],$data['password'])==true)
            echo "login success";
        else
            echo "login fail";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php include('template/style.php') ?>
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../public/backend/index2.html"><b>Admin</b>LTE</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Username" name="data[email]"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <p class="text-red"><?php echo isset($data['error']['email'])?$data['error']['email']:"" ?></p>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="data[password]"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <p class="text-red"><?php echo isset($data['error']['password'])?$data['error']['password']:"" ?></p>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="ok">Sign In</button>
                </div><!-- /.col -->
            </div>
        </form>
        <a href="#">I forgot my password</a><br>
        <a href="register.php" class="text-center">Register a new membership</a>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
<?php include('template/script.php') ?>
</body>
</html>