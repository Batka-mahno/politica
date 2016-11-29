<?php require_once 'functions.php'; ?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>Страница</title>
	<link rel="stylesheet" rev="stylesheet" type="text/css" href="style.css" />	
	<script type="text/javascript" src="js/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
	<script type="text/javascript" src="AjexFileManager/ajex.js"></script>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('a.fb').fancybox();
		});
	</script>
</head>

<body>

<div class="content">
	<?php

	$txt = selectTxt();
	foreach($txt as $item){
		echo $item['text'];
	}

	?>
</div>

<textarea id="editor1" name="txt" cols="100" rows="20"><?php echo $txt[0]['text'] ?></textarea>
		<script type="text/javascript">
			var ckeditor1 = CKEDITOR.replace( 'editor1' );
			AjexFileManager.init({
				returnTo: 'ckeditor',
				editor: ckeditor1
			});
		</script>
</body>
</html>