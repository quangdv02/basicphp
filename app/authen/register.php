<?php
include('../../db.php');
if(isset($_POST['ok'])){
    $data = validateForm($_POST['data']);
    if(!isset($data['error'])){
        $data['password'] = md5($data['password']);
        $sql = "INSERT INTO users(fullname, email, password, level)
                VALUES ('".$data['fullname']."','".$data['email']."','".$data['password']."', 1)";
        $rows = exec_update($sql);
        if($rows)
            $notice = "Đăng ký thành công";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Registration Page</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php include('template/style.php') ?>
</head>
<body class="register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership<br><?php echo isset($notice)?$notice:"" ?></p>
        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Full name" name="data[fullname]"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <p class="text-red"><?php echo isset($data['error']['fullname'])?$data['error']['fullname']:"" ?></p>
            </div>
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
                            <input type="checkbox"> I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="ok">Register</button>
                </div><!-- /.col -->
            </div>
        </form>
        <a href="login.php" class="text-center">I already have a membership</a>
    </div><!-- /.form-box -->
</div><!-- /.register-box -->
<?php include('template/script.php') ?>
</body>
</html>