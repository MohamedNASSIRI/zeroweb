<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$cell = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
$msg = filter_var($_POST['message'], FILTER_SANITIZE_STRING);



$formErrors = array();
if (strlen ($user) <= 5){
				$formErrors [] = 'الإسم + النسب';
}
if (strlen ($cell) > 12){
				$formErrors [] = 'رقم الهاتف غير صحيح';
}


$userError ='';
if (strlen ($user) <= 5){
				$userError = 'الإسم + النسب';
}
$cellError ='';
if (strlen ($cell) > 12){
				$cellError = 'رقم الهاتف غير صحيح';
}

$header = 'form: ' . $mail . '\r\n';
if (empty($formErrors)){
				mail('mohamednassiri0604@gmail.com', 'contact', $msg, $header);
}

}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<link rel="stylesheet" href="css/css.css"></link>
				<title>Page title</title>
</head>
<body>
			<form action=" <?php echo $_SERVER['PHP_SELF'] ?>" method="POST">		
			<?php
if (isset ($formErrors)) {
				foreach ($formErrors as $error) {
								echo $error . '<br>';
								
				}
}
?>
				<input type="text" name="username" placeholder="username" value="<?php if (isset($user)) { echo $user; } ?>" >
							
							<?php if (!empty($userError)) { ?>
							<div class="eruser">
											<?php
if (isset ($userError)) {
				echo $userError;
}
?>
							</div>
							<?php } ?>
							<input type="email" name="email" placeholder="email" value="<?php if (isset($mail)) { echo $mail; } ?> ">
							<input type="text" name="cellphone" placeholder="cellphone" value="<?php if (isset($cell)) { echo $cell; } ?>" >
								<?php if (!empty($cellError)) { ?>
							<div class="eruser">
											<?php
if (isset ($cellError)) {
				echo $cellError;
}
?>
							</div>
							<?php } ?>
						 <textarea name="message" placeholder="message"> <?php if (isset($msg)) { echo $msg; } ?> </textarea>
						 
							<input type="submit" value="submit">
			</form>
</body>
</html>
