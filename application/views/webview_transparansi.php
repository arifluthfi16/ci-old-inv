<!DOCTYPE html>
<html>
<head>
	<title><?= $transparansi->title ?></title>
	<link href="https://fonts.googleapis.com/css2?family=Varta:wght@400;700&display=swap" rel="stylesheet"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link href="<?= base_url("assets/css/ext/normalize.css") ?>" rel="stylesheet"> 
	<link href="<?= base_url("assets/plugins/jquery-oembed/jquery.oembed.css") ?>" rel="stylesheet"> 
	<style type="text/css">
		body{
			font-family: 'Varta', sans-serif;
			font-size: 14px;
			padding: 15px;
		}

		p{
			margin: 4px 0px;
		}

		figure{
			margin: 0px;
		}
		figure img{
			width: 100%;
		}

		.title{
			font-size: 1.6rem;
			font-weight: bold;
			margin-bottom: 2rem;
		}

		.date{
			color: #690952;
			margin-bottom: 2rem;
		} 
	</style>
</head>
<body>
	<h1 class="title"><?= $transparansi->title ?></h1>

	<div class="date"> 
	<b>Tanggal Terbit : <?= format_tanggal($transparansi->published_date) ?></b>
	</div>
	<div class="content"> 
		<?= $transparansi->content ?>
	</div>
</body>
    
   <script charset="utf-8" src="//cdn.iframe.ly/embed.js"></script>
<script type="text/javascript">
	document.querySelectorAll( 'oembed[url]' ).forEach( element => {
       iframely.load( element, element.attributes.url.value );
   } );
</script> 
</html>