<!doctype html>
<html lang="fa">
	<head>
	<title>Contact Us Form</title>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>
  <div class="container">
    <div class="row">
      <div class="contact">
        <h1 class="title">فرم تماس با ما</h1>
		<?php
		$name = @$_POST['name'];
		$surname = @$_POST['surname'];
		$email = @$_POST['email'];
		$phone = @$_POST['phone'];
		$msg = @$_POST['message'];
		if ($name && $surname && $email && $msg){
			$connection = new PDO("mysql:host=localhost;dbname=<DB_NAME>","<DB_USER>","<DB_PASS>");
			$connection->exec('set names utf8');
			$sql = "INSERT INTO `contact`(`fname`, `lname`, `email`, `phone`, `msg`, `time`) VALUES (?,?,?,?,?,?)";
			if ($connection->prepare($sql)->execute([$name,$surname,$email,$phone,$msg,time()])){
		?>
		<div class="sbtn col-md-6 alert alert-success">پیغام شما دریافت شد</div>
		<p class="lead title">پیام شما در اسرع وقت پاسخ داده خواهد شد</p>
		<?php
		}else {
		?>
		<div class="sbtn col-md-6 alert alert-danger" role="alert">متاسفانه مشکلی در ثبت اطلاعات رخ داد</div>
		<?php
		}}else {
		?>
        <p class="lead title">پیغام خود را بگذارید</p>
        <form class="col-md-10" id="contact-form" method="post" action="" role="form">
        <div class="messages"></div>
        <div class="controls">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="form_name">نام <span>(ضروری)</span></label>
                <input id="form_name" type="text" name="name" class="form-control" placeholder="نام" required="required" data-error="نام اجباری است">
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="form_lastname">نام خانوادگی <span>(ضروری)</span></label>
                <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="نام خانوادگی" required="required" data-error="نام خانوادگی اجباری است">
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="form_email">ایمیل <span>(ضروری)</span></label>
                <input id="form_email" type="email" name="email" class="form-control" placeholder="ایمیل" required="required" data-error="ایمیل اجباری است">
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="form_phone">شماره تلفن</label>
                <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="شماره تلفن">
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="form_message">پیغام <span>(ضروری)</span></label>
                <textarea id="form_message" name="message" class="form-control" placeholder="پیغام خود را وارد کنید" rows="4" required="required" data-error="لطفا پیغام خود را وارد کنید"></textarea>
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-md-12">
              <input type="submit" class="btn btn-success btn-send col-md-12" value="ارسال پیام">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <p class="text-muted" lang="en">Developed by Metti</p>
            </div>
          </div>
        </div>
        </form>
		<?php
		}
		?>
      </div>
    </div>
  </div>
  <!-- External JS Scripts -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>