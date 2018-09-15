<?php
include_once( '../config.php' );
require_once('class.phpmailer.php');
if ( isset( $_POST['FromEmailAddress'] ) ) {
	if ( ! isset( $_POST['Name'] ) ||
	     ! isset( $_POST['PhoneNumber'] ) ||
	     ! isset( $_POST['FromEmailAddress'] ) ||
	     ! isset( $_POST['Comments'] ) ) {
		died( 'We are sorry, but there appears to be a problem with the form you submitted.' );
	}
	$name          = $_POST['Name']; // required
	$phone         = $_POST['PhoneNumber']; // not required
	$email         = $_POST['FromEmailAddress']; // required
	$comments      = $_POST['Comments']; // required
	$email_to      = $_POST['FromEmailAddress'];
	$error_message = "";
	$email_exp     = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	if ( ! preg_match( $email_exp, $email ) ) {
		$error_message .= 'ایمیل وارد شده معتبر نمی باشد .<br />';
	}
	$string_exp = "/^[A-Za-z .'-]+$/";
	if ( ! preg_match( $string_exp, $name ) ) {
		$error_message .= 'نام وارد شده معتبر نمی باشد لطفا نام خود را به انگلیسی وارد کنید.<br />';
	}
	if ( strlen( $comments ) < 2 ) {
		$error_message .= 'متن ارسالی شما معتبر نمی باشد.<br />';
	}
	if ( strlen( $error_message ) > 0 ) {
		died( $error_message );
	}
	$message   = $name. ' با سلام '  . "<br>" .'پیام شما دریافت شد و در اسرع وقت با شما تماس خواهیم گرفت. '. "<br>" .'با تشکر';
	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; // or 587
	$mail->IsHTML(true);
	//$mail->Username = "bahman.dana.7@gmail.com";
	//$mail->Password = "09189100281bahman";
	$mail->CharSet = 'UTF-8';
	$mail->Username = "sale.originalpal@gmail.com";
	$mail->Password = "@a@s_4141";
	$mail->SetFrom("sale.originalpal@gmail.com");
	$mail->Subject ='تایید دریافت پیام';
	$mail->Body =$message;
	$mail->AddAddress($_POST['FromEmailAddress']);

	if(!$mail->Send()) {
		echo '<script type="text/javascript">alert("خطا رخ داد !!!!:  '.$mail->ErrorInfo.'"); window.location.href="../index.php";</script>';
	} else {
		echo "<script>alert('پیام شما با موفقیت ارسال شد ');	window.location.href='../index.php';</script>";
	}
	insert($name,$email_to,$phone,$comments,$conn);
}


function died( $error ) {
	echo "متاسفانه در زمان ارسال فرم خطایی رخ داده است ";
	echo "خطای به وجود امده در سطر زیر نشان داده شده.<br /><br />";
	echo $error . "<br /><br />";
	echo "لطفا برگردید و خطای بوجود امده را اصلاح کنید.<br /><br />";
	die();
}
function clean_string( $string ) {
	$bad = array( "content-type", "bcc:", "to:", "cc:", "href" );
	return str_replace( $bad, "", $string );
}
function insert($name,$email_to,$phone,$comments, $conn ){
	$sql = "insert into comments (name,email,number,text) values ('$name','$email_to','$phone','$comments')";
	$conn->query( $sql );
}
?>



