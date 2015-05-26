<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="<?php echo $response['page_author']; ?>" />
	<meta name="description" content="<?php echo $response['page_description']; ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $response['page_title']; ?></title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">

		$(function() {
			// On affiche les flashbags pendant 4 secondes
		    var flashbag = $('.flashbag');
		    flashbag.addClass('flashbag-open').delay(4000).queue(function() {
		        $(this).removeClass('flashbag-open');
		        $(this).dequeue();
		    });
		})
		
	</script>
</head>
<body>