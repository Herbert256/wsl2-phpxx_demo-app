<?php include '/app/php/wsl2-phpxx.php' ?>
<html>

	<head>
		<title><?php echo phpversion(); ?></title>
	</head>

	<body>
		
		<h1>WSL2-PHPxx / Demo App</h1>

		<p>Small demo application for <a href="https://github.com/Herbert256/wsl2-phpxx">WSL2-PHPxx</a></p>

		<h3>Switch to</h3>
		<ul>
			<li>PHP 8.0 &nbsp; <a href="http://localhost:1080">http://localhost:1080</a><?php version ('8.0'); ?></li>
			<li>PHP 7.4 &nbsp; <a href="http://localhost:1074">http://localhost:1074</a><?php version ('7.4'); ?></li>
			<li>PHP 7.3 &nbsp; <a href="http://localhost:1073">http://localhost:1073</a><?php version ('7.3'); ?></li>
			<li>PHP 7.2 &nbsp; <a href="http://localhost:1072">http://localhost:1072</a><?php version ('7.2'); ?></li>
			<li>PHP 7.1 &nbsp; <a href="http://localhost:1071">http://localhost:1071</a><?php version ('7.1'); ?></li>
			<li>PHP 7.0 &nbsp; <a href="http://localhost:1070">http://localhost:1070</a><?php version ('7.0'); ?></li>
		</ul>

		<h3>Installed generic modules</h3>
		<ul>
			<li><a href="/phpinfo">/phpinfo</a></li>
			<li><a href="/phpsysinfo">/phpsysinfo</a></li>
			<li><a href="/phpmyadmin">/phpmyadmin</a> (use user 'data' whith no password)</li>
		</ul>

		<h3>Testing</h3>
		<ul>
			<li><?php echo memory_cache () ?></li>
			<li><?php echo database_cache () ?></li>
		</ul>


	</body>

</html>
<?php write_log() ?>