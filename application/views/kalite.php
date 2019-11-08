<!doctype html>
<html lang="tr">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title>Anasayfa</title>
</head>
<?php  $css_class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12 btn-lg btn-block active";  ?>

<body>
  <div class="container">
        <div class="row">
            <div class="col-md-12">
				<a href="<?php echo $girdi_kontrol;?>" class="<?php echo $css_class;?>">Girdi Kontrol Formu</a>
				<a href="<?php echo $process_kontrol;?>" class="<?php echo $css_class;?>">Process Kontrol Formu</a>
				<a href="<?php echo $final_kontrol;?>" class="<?php echo $css_class;?>">Final Kontrol Formu</a>
				<a href="<?php echo $process_takip;?>" class="<?php echo $css_class;?>">Process Takip Çizelgesi</a>
			</div>
        </div>
    </div>
</body>

</html>