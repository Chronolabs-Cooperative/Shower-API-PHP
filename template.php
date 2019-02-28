<html xmlns="//www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Labs' Saftey Shower :: Chronolabs Cooperative</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="content-language" content="en" />
	<meta name="robots" content="index,follow" />
	<meta name="keywords" content="Cronolabs,Cooperative,Time,Travel,Chronographics,Lab,Laboratory,Movement" />
	<meta name="description" content="Chronolabs Cooperative is a chronographics + chronologistic cooperative histographically that deal in time capsules and historical makeup - gladly a part of moving the Digital Age to its sweet spot!" />
	<meta name="rating" content="restricted" />
	<meta name="author" content="Dr. Simon A. Roberts" />
	<meta name="copyright" content="<? echo date('Y'); ?> &copy; Chronolabs Cooperative." />
	<?php global $inner;
	if (!empty($inner['uri'])) { ?>
	<meta http-equiv="Refresh" content="<?php echo mt_rand(29, 120*8.69); ?>; url=<?php echo $inner['uri']; ?>" />
	<?php } elseif( !empty($inner['url']) ) { ?>
	<meta http-equiv="Refresh" content="<?php echo mt_rand(29, 120*8.69); ?>; url=<?php echo $inner['url']; ?>" />
	<?php } ?>
	<meta name="generator" content="Chronolabs Cooperative" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 	<script type="text/javascript" src="<?php echo API_URL; ?>/assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo API_URL; ?>/assets/js/jquery.jplayer.min.js"></script>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/ico" href="<?php echo API_URL; ?>/assets/images/icons/favicon.ico" />
    <link rel="icon" sizes="48x48" type="image/png" href="<?php echo API_URL; ?>/assets/images/icons/icon.png" id="icon-png" class="icon-48x48-png" />
    <link rel="icon" sizes="56x56" href="<?php echo API_URL; ?>/assets/images/icons/apple-touch-icon-56x56.png" id="apple-touch-icon-56x56-png" class="icon-56x56-png" />
    <link rel="icon" sizes="72x72" href="<?php echo API_URL; ?>/assets/images/icons/apple-touch-icon-72x72.png" id="apple-touch-icon-72x72-png" class="icon-72x72-png" />
    <link rel="icon" sizes="114x114" href="<?php echo API_URL; ?>/assets/images/icons/apple-touch-icon-114x114.png" id="apple-touch-icon-114x114-png" class="icon-114x114-png" />
	
	<!-- AddThis Smart Layers BEGIN -->
	<!-- Go to //www.addthis.com/get/smart-layers to customize -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50f9a1c208996c1d"></script>
	<script type="text/javascript">
	  addthis.layers({
		'theme' : 'transparent',
		'share' : {
		  'position' : 'right',
		  'numPreferredServices' : 6
		}, 
		'follow' : {
		  'services' : [
			{'service': 'facebook', 'id': 'ChronolabsCoop'},
			{'service': 'twitter', 'id': 'SimonXaies'},
			{'service': 'twitter', 'id': 'ChronolabsCoop'},
			{'service': 'twitter', 'id': 'VCF5Project'},
			{'service': 'linkedin', 'id': 'founderprinciple'}
		  ]
		},  
		'whatsnext' : {},  
		'recommended' : {
		  'title': 'Recommended for you:'
		} 
	  });
	</script>
	<!-- AddThis Smart Layers END -->

	<link rel="stylesheet" href="<?php echo API_URL; ?>/assets/css/styles.css" type="text/css" />
	<?php if (!isset($inner['clouds'])) { ?>
	<link rel="stylesheet" href="<?php echo API_URL; ?>/assets/css/rainsnow.css" type="text/css">
	<script src="<?php echo API_URL; ?>/assets/js/rainsnow.php" type="text/javascript"></script>
	<?php } else { ?>
	<link rel="stylesheet" href="<?php echo API_URL; ?>/assets/css/clouds.css" type="text/css">
	<script src="<?php echo API_URL; ?>/assets/js/clouds.js" type="text/javascript"></script>
	<?php } ?>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

	<style>
<?php
foreach(array('html') as $cssele)
{
	mt_srand(mt_rand(-microtime(true), microtime(true)));
	mt_srand(mt_rand(-microtime(true), microtime(true)));
	mt_srand(mt_rand(-microtime(true), microtime(true)));

	$modes = array(	'one'=>array('a'=>'center, ellipse', 'b'=>'radial, center center'),
			'two'=>array('a'=>'-45deg', 'b'=>'left top, right bottom'),
			'three'=>array('a'=>'45deg', 'b'=>'left bottom, right top'),
			'four'=>array('a'=>'top', 'b'=>'left top, left bottom'),
			'five'=>array('a'=>'left', 'b'=>'left top, right top'));

	$modeskeys = array('one','two','three','four','five');

	$colour = array();
	foreach(array('one', 'two', 'three', 'four') as $key) {
		$colour[$key]['red'] = mt_rand(33.0000001, 162);
		$colour[$key]['green'] = mt_rand(11.000012, 210);
		$colour[$key]['blue'] = mt_rand(24.1210123, 195);
		if (in_array($key, array('one')))
			$colour[$key]['heat'] = mt_rand(15.0121425154, 99);
		else
			$colour[$key]['heat'] = mt_rand(25.211412, 99);
		$colour[$key]['opacity'] = (string)round(mt_rand(12.000121 ,91) / 92, 2);
	}
	shuffle($modeskeys);
	$state = $modes[$modeskeys[mt_rand(0, count($modekeys)-1)]];

	echo  "\n\n\t$cssele\n\t" .  '{
	   background: rgba('.$colour['one']['red'].','.$colour['one']['green'].','.$colour['one']['blue'].','.$colour['one']['opacity'].');
	   background: -moz-linear-gradient('.$state['a'].', rgba('.$colour['one']['red'].','.$colour['one']['green'].','.$colour['one']['blue'].','.$colour['one']['opacity'].') '.$colour['one']['heat'].'%, rgba('.$colour['two']['red'].','.$colour['two']['green'].','.$colour['two']['blue'].','.$colour['two']['opacity'].') '.$colour['two']['heat'].'%, rgba('.$colour['three']['red'].','.$colour['three']['green'].','.$colour['three']['blue'].','.$colour['three']['opacity'].') '.$colour['three']['heat'].'%, rgba('.$colour['four']['red'].','.$colour['four']['green'].','.$colour['four']['blue'].','.$colour['four']['opacity'].') '.$colour['four']['heat'].'%, rgba('.$colour['one']['red'].','.$colour['one']['green'].','.$colour['one']['blue'].','.$colour['one']['opacity'].') '.$colour['one']['heat'].'%);
	   background: -webkit-gradient('.$state['b'].', color-stop('.$colour['one']['heat'].'%, rgba('.$colour['one']['red'].','.$colour['one']['green'].','.$colour['one']['blue'].','.$colour['one']['opacity'].')), color-stop('.$colour['two']['heat'].'%, rgba('.$colour['two']['red'].','.$colour['two']['green'].','.$colour['two']['blue'].','.$colour['two']['opacity'].')), color-stop('.$colour['three']['heat'].'%, rgba('.$colour['three']['red'].','.$colour['three']['green'].','.$colour['three']['blue'].','.$colour['three']['opacity'].')), color-stop('.$colour['four']['heat'].'%, rgba('.$colour['four']['red'].','.$colour['four']['green'].','.$colour['four']['blue'].','.$colour['four']['opacity'].')), color-stop('.$colour['one']['heat'].'%, rgba('.$colour['one']['red'].','.$colour['one']['green'].','.$colour['one']['blue'].','.$colour['one']['opacity'].')));
	   background: -webkit-linear-gradient('.$state['a'].', rgba('.$colour['one']['red'].','.$colour['one']['green'].','.$colour['one']['blue'].','.$colour['one']['opacity'].') '.$colour['one']['heat'].'%, rgba('.$colour['two']['red'].','.$colour['two']['green'].','.$colour['two']['blue'].','.$colour['two']['opacity'].') '.$colour['two']['heat'].'%, rgba('.$colour['three']['red'].','.$colour['three']['green'].','.$colour['three']['blue'].','.$colour['three']['opacity'].') '.$colour['three']['heat'].'%, rgba('.$colour['four']['red'].','.$colour['four']['green'].','.$colour['four']['blue'].','.$colour['four']['opacity'].') '.$colour['four']['heat'].'%, rgba('.$colour['one']['red'].','.$colour['one']['green'].','.$colour['one']['blue'].','.$colour['one']['opacity'].') '.$colour['one']['heat'].'%);
	   background: -o-linear-gradient('.$state['a'].', rgba('.$colour['one']['red'].','.$colour['one']['green'].','.$colour['one']['blue'].','.$colour['one']['opacity'].') '.$colour['one']['heat'].'%, rgba('.$colour['two']['red'].','.$colour['two']['green'].','.$colour['two']['blue'].','.$colour['two']['opacity'].') '.$colour['two']['heat'].'%, rgba('.$colour['three']['red'].','.$colour['three']['green'].','.$colour['three']['blue'].','.$colour['three']['opacity'].') '.$colour['three']['heat'].'%, rgba('.$colour['four']['red'].','.$colour['four']['green'].','.$colour['four']['blue'].','.$colour['four']['opacity'].') '.$colour['four']['heat'].'%, rgba('.$colour['one']['red'].','.$colour['one']['green'].','.$colour['one']['blue'].','.$colour['one']['opacity'].') '.$colour['one']['heat'].'%);
	   background: -ms-linear-gradient('.$state['a'].', rgba('.$colour['one']['red'].','.$colour['one']['green'].','.$colour['one']['blue'].','.$colour['one']['opacity'].') '.$colour['one']['heat'].'%, rgba('.$colour['two']['red'].','.$colour['two']['green'].','.$colour['two']['blue'].','.$colour['two']['opacity'].') '.$colour['two']['heat'].'%, rgba('.$colour['three']['red'].','.$colour['three']['green'].','.$colour['three']['blue'].','.$colour['three']['opacity'].') '.$colour['three']['heat'].'%, rgba('.$colour['four']['red'].','.$colour['four']['green'].','.$colour['four']['blue'].','.$colour['four']['opacity'].') '.$colour['four']['heat'].'%, rgba('.$colour['one']['red'].','.$colour['one']['green'].','.$colour['one']['blue'].','.$colour['one']['opacity'].') '.$colour['one']['heat'].'%);
	   background: linear-gradient('.$state['a'].', rgba('.$colour['one']['red'].','.$colour['one']['green'].','.$colour['one']['blue'].','.$colour['one']['opacity'].') '.$colour['one']['heat'].'%, rgba('.$colour['two']['red'].','.$colour['two']['green'].','.$colour['two']['blue'].','.$colour['two']['opacity'].') '.$colour['two']['heat'].'%, rgba('.$colour['three']['red'].','.$colour['three']['green'].','.$colour['three']['blue'].','.$colour['three']['opacity'].') '.$colour['three']['heat'].'%, rgba('.$colour['four']['red'].','.$colour['four']['green'].','.$colour['four']['blue'].','.$colour['four']['opacity'].') '.$colour['four']['heat'].'%, rgba('.$colour['one']['red'].','.$colour['one']['green'].','.$colour['one']['blue'].','.$colour['one']['opacity'].') '.$colour['one']['heat'].'%);
	   filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#ffffff\', endColorstr=\'#ffffff\', GradientType=1 );
	}';
}
?>
    </style>
 <?php 
 if (defined("BACKGROUND_IMAGE")) { 
    $opacity = mt_rand(41, 89);
 ?>
    <style>
    body { 
       background: url(<?php echo BACKGROUND_IMAGE; ?>) no-repeat center center fixed !important; 
	   -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=<?php echo $opacity; ?>)";
	   filter: alpha(opacity=<?php echo $opacity; ?>);
	   -moz-opacity:0.<?php echo $opacity; ?>;
	   -khtml-opacity: 0.<?php echo $opacity; ?>;
	   opacity: 0.<?php echo $opacity; ?>;
	   width: 100%;
	   min-height: 100%;
    }
    </style>
 <?php } ?>
</head>
<body>
	<div id="tile">
	<div style="display: none; margin: auto;">
<?php 
if (defined("AUDIO_MP3")) {
?>
    <script type="text/javascript">
        var aud = document.createElement("iframe");
        aud.setAttribute('src', "<?php echo AUDIO_MP3; ?>"); // replace with actual file path
        aud.setAttribute('width', '1px');
        aud.setAttribute('height', '1px');
        aud.setAttribute('scrolling', 'no');
        aud.style.border = "0px";
        document.body.appendChild(aud);
    </script>

<?php } ?></div>
</body>
</html>