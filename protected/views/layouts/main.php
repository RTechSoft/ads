<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- blueprint CSS framework -->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />-->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
	<style type="text/css">
		 html, body, #map {
        margin: 0;
        width: 100%;
        height: 100%;
		}
		.leaflet-map-pane {
    z-index: 2 !important;
	}
		.leaflet-control-container {
    z-index: 2 !important;
	}

	.leaflet-google-layer {
	    z-index: 1 !important;
	}
	</style>

 <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
 

<script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>
<script src="http://maps.google.com/maps/api/js?v=3.2&sensor=false"></script>
<script src="http://matchingnotes.com/javascripts/leaflet-google.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
			var map = new L.Map('map', {center: new L.LatLng(14.559129738860397, 121.0180842876434
), zoom: 15});
	var googleLayer = new L.Google('ROADMAP');
	map.addLayer(googleLayer);
	
	$.each($(".initial_marker"), function(){
		var marker = L.marker([$(this).attr("data-lat"),$(this).attr("data-lon")]).addTo(map);
	});
		$(".requests").click(function(e){
			var lat = $(this).attr("data-lat");
			var lon = $(this).attr("data-lon");
			var latlng = new L.LatLng(lat, lon);
			map.panTo(latlng);			
			return false;
		});
		
		$("#add_new").on('click', function(){
			map.on('click', function(e){
		    	var marker = new L.marker(e.latlng).addTo(map);
				$("#req_lat").val(e.latlng.lat);
				$("#req_long").val(e.latlng.lng);
				map.off("click");	
				$("#add_form").show();
				$('html, body').animate({
		            scrollTop: $("#add_form").offset().top
		        }, 1000);
			});	
				
		});
		$("#submit_request").click(function(e){
			e.preventDefault();
			$.ajax({
			url: "<?php Yii::app()->createUrl('/site/submit_request')?>",
			type: "POST",
			data: $("#add_form2").serialize(),
			dataType: "json"
			});
			
		});
	});

function test(testmap, latlng){
	//testmap.
}	
</script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div role="navigation" class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand">ADS</a>
        </div>
        <div class="navbar-collapse collapse">
          <form role="form" class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password">
            </div>
            <button class="btn btn-success" type="submit">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

<h1>Hello, world!</h1>
<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
	<a href="javascript:void(0);" id="add_new">Add</a>
	 <div style="width:800px; height:500px" id="map"></div>
	 <div id="add_form" style="display:none;">
	 	<form action="/" method="POST" id="add_form2" role="form">
	 	Event Name: <input type="text" name="event_name" /> <br />
	 	Event Description: <input type="text" name="req_desc" /><br />
	 	<input type="hidden" name="req_lat" id="req_lat" />
	 	<input type="hidden" name="req_long" id="req_long" />
		<input type="button" id="assign_assets" value="Assign" />
		<input type="button" id="submit_request" value="Submit" />
		
	 </form>
	</div>
	<div id="mainmenu">
		<a href="javascript:void(0);" class="requests" data-lon="121.0580842876434" data-lat="14.559129738860397">Test</a>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->
<div style="display:none;">
	<?php 
		$sql = 'SELECT * FROM asset';
		$rows = Yii::app()->db->createCommand($sql)->queryAll();
		foreach($rows as $row){
			echo '<a class="initial_marker" data-lat="'.$row['a_lat'].'" data-lon="'.$row['a_long'].'">none</a>';
		}
	?>	
</div>
</body>
</html>
