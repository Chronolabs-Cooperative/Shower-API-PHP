<?php 
	$uris = file(__DIR__ . DIRECTORY_SEPARATOR . "hop-uris.diz"); 
?><html xmlns="//www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Labs' Saftey Shower :: Chronolabs Cooperative</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="content-language" content="en" />
	<meta name="robots" content="index,follow" />
	<meta name="keywords" content="Cronolabs,Cooperative,Time,Travel,Chronographics,Lab,Laboratory,Movement" />
	<meta name="description" content="Chronolabs Cooperative is a time travel & chronographics cooperative histographically that deal in time capsules and historical makeup - gladly a part of moving the Digital Age to its sweet spot!" />
	<meta name="rating" content="restricted" />
	<meta name="author" content="Simon Roberts" />
	<meta name="copyright" content="<? echo date('Y'); ?> &copy; Chronolabs Cooperative." />
	<meta http-equiv="Refresh" content="<?php echo mt_rand(29, 120*8.69); ?>; url=<?php echo $uris[mt_rand(0, count($uris)-1)]; ?>" />
	<meta name="generator" content="Chronolabs" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
	<script>
	//<![CDATA[
	$(document).ready(function(){
		$("#randomradio").jPlayer({
			ready: function () {
				$(this).jPlayer("setMedia", {
					mp3: "/shower.labs.coop.mp3"
				}).jPlayer("play");
			},
		 	ended: function() { // The $.jPlayer.event.ended event
			 	$(this).jPlayer("play"); // Repeat the media
			},
			swfPath: "/swf/Jplayer.swf",
			supplied: "mp3",
			wmode: "window",
			smoothPlayBar: true,
			keyEnabled: true,
			remainingDuration: false,
			toggleDuration: false
		});
	});
	//]]>
	</script>
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
			{'service': 'facebook', 'id': 'chronolabs'},
			{'service': 'twitter', 'id': 'Cipherhouse'},
			{'service': 'twitter', 'id': 'ChronolabsCoop'},
			{'service': 'twitter', 'id': 'PublicHoneypot'},
			{'service': 'linkedin', 'id': 'founderandprinciple'},
			{'service': 'google_follow', 'id': '111267413375420332318'}
		  ]
		},  
		'whatsnext' : {},  
		'recommended' : {
		  'title': 'Recommended for you:'
		} 
	  });
	</script>
	<!-- AddThis Smart Layers END -->

	<link rel="stylesheet" href="//shower.labs.coop/css/styles.css" type="text/css" />
	<link rel="stylesheet" href="//shower.labs.coop/css/jplayer.css" type="text/css"  media="all"  />
	<link rel="stylesheet" href="css/rainsnow.css" type="text/css">
	<script src="js/rainsnow.js" type="text/javascript"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script>
		var icoroite = 9966 * Math.random() + 7755;
		setTimeout(function() {
			jQuery.getJSON( "https://icons.ringwould.com.au/icons/java/".($GLOBALS["domain"]=="ringwould.com.au"?"ringwould":"invader")."/random.json", function( data ) {
				$.each(data, function( keyey, value ) {
					$( "#" + keyey ).href = value;
				});
			});
		}, icoroite);
	</script>
	<?php
		if ((!isset($_SESSION['icon-meta-html']) || empty($_SESSION['icon-meta-html'])) && session_id())
			$_SESSION['icon-meta-html'] = file_get_contents("https://icons.ringwould.com.au/icons/java/".($GLOBALS["domain"]=="ringwould.com.au"?"ringwould":"invader")."/random.html");
		if (isset($_SESSION['icon-meta-html']) && !empty($_SESSION['icon-meta-html']))
			echo $_SESSION['icon-meta-html'];
		else
			echo file_get_contents("https://icons.ringwould.com.au/icons/java/".($GLOBALS["domain"]=="ringwould.com.au"?"ringwould":"invader")."/random.html");
	?>
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
    <style>
    body { 
        background: url(http://shower.labs.coop/image/bg-<?php echo sprintf("%'.02d", mt_rand(1, 25)); ?>.jpg) no-repeat center center fixed !important; 
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=89)";
	filter: alpha(opacity=89);
	-moz-opacity:0.89;
	-khtml-opacity: 0.89;
	opacity: 0.89;
    }
    </style>
</head>
<body>
	<div id="tile">
	<div style="display: none;"><center><h4><a href="<?php echo $_SESSION['station']['info']['website']; ?>" target="_blank"><?php echo $_SESSION['station']['info']['name']; ?></a></h4><div><?php echo $_SESSION['station']['info']['description']; ?></div>
	<div id="randomradio" class="jp-jplayer"></div>
	<div id="jp_container_1" class="jp-audio">
	    <div class="jp-type-single">
	        <div class="jp-gui jp-interface">
	            <ul class="jp-controls">
	                <!-- comment out any of the following <li>s to remove these buttons -->
	                <li><a href="javascript:;" class="jp-play" tabindex="1">play</a>
	                </li>
	                <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a>
	                </li>
	                <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a>
	                </li>
	                <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a>
	                </li>
	                <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a>
	                </li>
	                <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a>
	                </li>
	            </ul>
	            <!-- you can comment out any of the following <div>s too -->
	            <div class="jp-progress">
	                <div class="jp-seek-bar">
	                    <div class="jp-play-bar"></div>
	                </div>
	            </div>
	            <div class="jp-volume-bar">
	                <div class="jp-volume-bar-value"></div>
	            </div>
	            <div class="jp-current-time"></div>
	            <div class="jp-duration"></div>
	        </div>
	        <div class="jp-details">
	            <ul>
	                <li><span class="jp-title"></span>
	                </li>
	            </ul>
	        </div>
	        <div class="jp-no-solution"> <span>Update Required</span>
	To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.</div>
	    </div>
	</div>
</center></div>
</body>
</html>
