<?php

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
		<title>elFinder 2.1.x source version with PHP connector</title>
		<script data-main="main.default.js" src="require.min.js"></script>
		<script>
			define('elFinderConfig', {
				defaultOpts : {
					url : 'connector.php'
					,commandsOptions : {
						edit : {
							extraOptions : {
								creativeCloudApiKey : '',
								managerUrl : ''
							}
						}
						,quicklook : {
							sharecadMimes : ['image/vnd.dwg', 'image/vnd.dxf', 'model/vnd.dwf', 'application/vnd.hp-hpgl', 'application/plt', 'application/step', 'model/iges', 'application/vnd.ms-pki.stl', 'application/sat', 'image/cgm', 'application/x-msmetafile'],
							googleDocsMimes : ['application/pdf', 'image/tiff', 'application/vnd.ms-office', 'application/msword', 'application/vnd.ms-word', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/postscript', 'application/rtf'],
							officeOnlineMimes : ['application/vnd.ms-office', 'application/msword', 'application/vnd.ms-word', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/vnd.oasis.opendocument.text', 'application/vnd.oasis.opendocument.spreadsheet', 'application/vnd.oasis.opendocument.presentation']
						}
					},
					bootCallback : function(fm, extraObj) {
						fm.bind('init', function() {
						});
						var title = document.title;
						fm.bind('open', function() {
							var path = '',
								cwd  = fm.cwd();
							if (cwd) {
								path = fm.path(cwd.hash) || null;
							}
							document.title = path? path + ':' + title : title;
						}).bind('destroy', function() {
							document.title = title;
						});
					}
				},
				managers : {
					'elfinder': {}
				}
			});
		</script>
	</head>
	<body style="background-color: #000;">
		<center>
			<div style="margin-bottom: 20px;">
				<a href="logout.php"><button id="lgg">Logout</button></a>
			</div>
			<div id="elfinder"></div>
		</center>
		<style type="text/css">
			.elfinder-navbar-wrapper-root {
				background-color: #570560;
				color: #fff;
			}
			.ui-helper-clearfix {
				background-color: #570560;
				color: #fff;
			}
			#lgg {
				cursor: pointer;
			}
		</style>
	</body>
</html>
