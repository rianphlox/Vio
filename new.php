
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Directorate Of Raod Traffic Services (DRTS)</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />



  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.ui.touch-punch.js"></script>

<link type="text/css" href="css/jquery.signature.css" rel="stylesheet"> 
<script type="text/javascript" src="js/jquery.signature.js"></script>


  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />


  <style>
            .kbw-signature {
                width: 400px;
                height: 200px;
            }
        </style>
</head>




<body>
    
</body>
            <form action="">
                <div class="col-md-6 form-group">
                    
                    <div id="sig" class="sig"></div>
                    <div>

                        <button class="btn btn-info btn-sm" id="clear">Clear Signature</button>
                        <button class="btn btn-info btn-sm" id="json">TO JSON</button>
                        <button class="btn btn-info btn-sm" id="png">TO PNG</button>
                        <button class="btn btn-info btn-sm" id="json">TO JSON</button>
                    </div>
                    <textarea name="signed" id="" style="display:none"></textarea>
                </div>
            </form>

            <script type="text/javascript">
                $(function() {
	$('#sig').signature();
	$('#clear').click(function() {
		$('#sig').signature('clear');
	});
	$('#json').click(function() {
		alert($('#sig').signature('toJSON'));
	});
	$('#svg').click(function() {
		alert($('#sig').signature('toSVG'));
	});
});
            </script>
</html>