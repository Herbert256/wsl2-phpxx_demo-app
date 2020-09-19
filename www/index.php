<?php include '/app/php/wsl2-phpxx.php' ?>
<html>

	<head>
		<title>WSL2-PHPxx - <?php echo phpversion(); ?></title>
	</head>

	<body>
		
		<blockquote>
			
			<br/>

			<h1>WSL-PHPxx - <?php echo phpversion(); ?></h1>

			<ul>
				<li>PHP 8.0 &nbsp; <a href="http://localhost:1080">http://localhost:1080</a></li>
				<li>PHP 7.4 &nbsp; <a href="http://localhost:1074">http://localhost:1074</a></li>
				<li>PHP 7.3 &nbsp; <a href="http://localhost:1073">http://localhost:1073</a></li>
				<li>PHP 7.2 &nbsp; <a href="http://localhost:1072">http://localhost:1072</a></li>
				<li>PHP 7.1 &nbsp; <a href="http://localhost:1071">http://localhost:1071</a></li>
				<li>PHP 7.0 &nbsp; <a href="http://localhost:1070">http://localhost:1070</a></li>
			</ul>

			<ul>
				<li><a href="/phpinfo">/phpinfo</a></li>
				<li><a href="/phpsysinfo">/phpsysinfo</a></li>
				<li><a href="/phpmyadmin">/phpmyadmin</a></li>
			</ul>

			<p><?php echo memory_cache () ?></p>

		</blockquote>

	</body>

</html>
<?php write_log() ?>