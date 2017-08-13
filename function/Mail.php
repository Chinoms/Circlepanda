<?php
include_once '__autoload.php';
class Mail
{
  function mailUser($to, $name, $subject, $body)
  {
		$msg = '
			<html>
				<head>
					<title>'. $subject .'</title>
					<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
					<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
					<link rel="stylesheet" href="' . BASE_URL . '"asset/plugins/semantic-ui/semantic.min.css">
					<link rel="stylesheet" href="' . BASE_URL . 'asset/css/w3.css">
					<style>
						body {
							margin: 0 auto;
							background: #f9f7f6;
							color: #404d5b;
							font-weight: 500;
							font-size: 1.05em;
							font-family: \'Raleway\', Arial, sans-serif;
						}
						section.wrap {
							display: block;
							margin: 3% 15%;
							height: 90%;
							width: 60%;
							background-color: #ffffff;
							padding: 2% 5%;
						}
						section p {
							display: inline-table;
							font-size: 16px;
							color: #444;
						}
						a.button {
							display: inline-block;
							padding: 8px 20px;
							height: auto;
							width: auto;
							font-size: 18px;
							background-color: #3462aa;
							border-radius: 3px;
							color: #fff;
						}
					</style>
				</head>
			<body>
				<section class="wrap">
					<div class="w3-container w3-center">
					<a href="' . BASE_URL . '">
						<img src="' . BASE_URL . 'asset/images/circlepanda-logo.png" alt="Circlepanda logo">
					</a>
					<p> Connecting Creative minds </p>
					</div>
					<h2> Hi ' . $name . ', </h2>
					<p> ' . $body . ' </p>
					<div class="w3-container w3-center">
						<a class="ui button blue" href="' . BASE_URL . 'login"> Login </a>
					</div>
				</section>
				<script src="' . BASE_URL . '"asset/plugins/semantic-ui/semantic.min.js"></script>
			</body>
			</html>';

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		// More headers
		$headers .= 'From: <Circlepanda@circlepanda.com>' . "\r\n";
		$headers .= 'Cc: noreply@circlepanda.com' . "\r\n";
		mail($to,$subject,$msg,$headers);
	}
}
$mailer = new Mail;
?>
