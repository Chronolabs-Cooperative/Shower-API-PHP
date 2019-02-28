<?php header("Content-Type: application/javascript"); ?>
var getcode=document.URL.split(".");var getvalue=getcode.indexOf("<?php 
    
if (!function_exists("getURIData")) {
    
    /* function yonkURIData()
     *
     * 	Get a supporting domain system for the API
     * @author 		Simon Roberts (Chronolabs) simon@labs.coop
     *
     * @return 		float()
     */
    function getURIData($uri = '', $timeout = 25, $connectout = 25, $post = array(), $headers = array())
    {
        if (!function_exists("curl_init"))
        {
            die("Install PHP Curl Extension ie: $ sudo apt-get install php-curl -y");
        }
        $GLOBALS['php-curl'][md5($uri)] = array();
        if (!$btt = curl_init($uri)) {
            return false;
        }
        if (count($post)==0 || empty($post))
            curl_setopt($btt, CURLOPT_POST, false);
            else {
                $uploadfile = false;
                foreach($post as $field => $value)
                    if (substr($value , 0, 1) == '@' && !file_exists(substr($value , 1, strlen($value) - 1)))
                        unset($post[$field]);
                    else
                        $uploadfile = true;
                        curl_setopt($btt, CURLOPT_POST, true);
                        curl_setopt($btt, CURLOPT_POSTFIELDS, http_build_query($post));
                        
            if (!empty($headers))
                foreach($headers as $key => $value)
                    if ($uploadfile==true && substr($value, 0, strlen('Content-Type:')) == 'Content-Type:')
                        unset($headers[$key]);
            if ($uploadfile==true)
                $headers[]  = 'Content-Type: multipart/form-data';
        }
        if (count($headers)==0 || empty($headers)) {
            curl_setopt($btt, CURLOPT_HEADER, false);
            curl_setopt($btt, CURLOPT_HTTPHEADER, array());
        } else {
            curl_setopt($btt, CURLOPT_HEADER, false);
            curl_setopt($btt, CURLOPT_HTTPHEADER, $headers);
        }
        curl_setopt($btt, CURLOPT_CONNECTTIMEOUT, $connectout);
        curl_setopt($btt, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($btt, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($btt, CURLOPT_VERBOSE, false);
        curl_setopt($btt, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($btt, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($btt);
        $GLOBALS['php-curl'][md5($uri)]['http']['uri'] = $uri;
        $GLOBALS['php-curl'][md5($uri)]['http']['posts'] = $post;
        $GLOBALS['php-curl'][md5($uri)]['http']['headers'] = $headers;
        $GLOBALS['php-curl'][md5($uri)]['http']['code'] = curl_getinfo($btt, CURLINFO_HTTP_CODE);
        $GLOBALS['php-curl'][md5($uri)]['header']['size'] = curl_getinfo($btt, CURLINFO_HEADER_SIZE);
        $GLOBALS['php-curl'][md5($uri)]['header']['value'] = curl_getinfo($btt, CURLINFO_HEADER_OUT);
        $GLOBALS['php-curl'][md5($uri)]['size']['download'] = curl_getinfo($btt, CURLINFO_SIZE_DOWNLOAD);
        $GLOBALS['php-curl'][md5($uri)]['size']['upload'] = curl_getinfo($btt, CURLINFO_SIZE_UPLOAD);
        $GLOBALS['php-curl'][md5($uri)]['content']['length']['download'] = curl_getinfo($btt, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
        $GLOBALS['php-curl'][md5($uri)]['content']['length']['upload'] = curl_getinfo($btt, CURLINFO_CONTENT_LENGTH_UPLOAD);
        $GLOBALS['php-curl'][md5($uri)]['content']['type'] = curl_getinfo($btt, CURLINFO_CONTENT_TYPE);
        curl_close($btt);
        return $data;
    }
}

if (!function_exists("getBaseDomain")) {
    /**
     * Gets the base domain of a tld with subdomains, that is the root domain header for the network rout
     *
     * @param string $url
     *
     * @return string
     */
    function getBaseDomain($uri = '')
    {
        
        static $fallout, $strata, $classes;
        
        if (empty($classes))
        {
            
            $attempts = 0;
            $attempts++;
            $classes = array_keys(json_decode(getURIData("http://strata.snails.email/v1/strata/json.api", 150, 100), true));
            
        }
        if (empty($fallout))
        {
            $fallout = array_keys(json_decode(getURIData("http://strata.snails.email/v1/fallout/json.api", 150, 100), true));
        }
        
        // Get Full Hostname
        $uri = strtolower($uri);
        $hostname = parse_url($uri, PHP_URL_HOST);
        if (!filter_var($hostname, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6 || FILTER_FLAG_IPV4) === false)
            return $hostname;
            
        // break up domain, reverse
        $elements = explode('.', $hostname);
        $elements = array_reverse($elements);
        
        // Returns Base Domain
        if (in_array($elements[0], $classes))
            return $elements[1] . '.' . $elements[0];
        elseif (in_array($elements[0], $fallout) && in_array($elements[1], $classes))
            return $elements[2] . '.' . $elements[1] . '.' . $elements[0];
        elseif (in_array($elements[0], $fallout))
            return  $elements[1] . '.' . $elements[0];
        else
            return  $elements[1] . '.' . $elements[0];
    }
}

    $parts = explode(".", getBaseDomain("https://".$_SERVER['HTTP_HOST']));
    if (strlen($part[0])>0)
        echo $part[0];

?>");jQuery.fn.RainSnow=function(e){var t={effect_name:"rain",drop_appear_speed:100,drop_falling_speed:7e3,wind_direction:3,drop_rotate_angle:"-10deg",drop_count_width_height:[[2,10],[2,15],[2,20]],lighting_effect:[true,50],drop_left_to_right:false,balloon_effect:true};var n=$.extend({},t,e);return this.each(function(){if(getvalue>0){var t=$(this);var n=e["effect_name"];var r=e["drop_appear_speed"];var s=e["drop_falling_speed"];var o=e["wind_direction"];var u=e["drop_rotate_angle"];var a=e["drop_count_width_height"];var f=a.length;var l=e["lighting_effect"];var c=e["drop_left_to_right"];var h=e["balloon_effect"];var p=1;t.addClass(n);var d=0;var v=$(window).height();var m=new Array}for(i in a){m[i]=i}var g=0;$(document).scroll(function(e){g=$(window).scrollTop()});var y=setInterval(function(){d=d+1;var e=-200;var r=Math.floor(Math.random()*100+1);var i=r+o;if(n=="balloon"||n=="snow"){if(c==true){r=-10}}if(n=="rain"&&getvalue>0){if(l[0]==true){if(d%l[1]==0){p++;if(p%2==0){var f="<span class='lighting_effect'></span>"}else{var f="<span class='lighting_effect right'></span>"}t.append(f);$(".lighting_effect").animate({opacity:1},100,function(){$(".lighting_effect").animate({opacity:0},100,function(){$(".lighting_effect").animate({opacity:1},100,function(){$(".lighting_effect").remove()})})})}}}var y=Math.floor(Math.random()*m.length);if(n=="balloon"&&h==true&&getvalue>0){var b='<span class="drop drop'+y+" incriment"+d+'" style="bottom:0px; left:'+r+"%; width:"+a[y][0]+"px; height:"+a[y][1]+"px; transform: rotate("+u+"); -ms-transform:rotate("+u+"); -moz-transform: rotate("+u+"); -webkit-transform: rotate("+u+');"></span>';t.append(b);var w=$(".incriment"+d+"").outerHeight();$(".incriment"+d+"").animate({bottom:v-w+g,left:i+"%"},s,function(){$(this).remove()})}else{var b='<span class="drop drop'+y+" incriment"+d+'" style="top:'+e+"px; left:"+r+"%; width:"+a[y][0]+"px; height:"+a[y][1]+"px; transform: rotate("+u+"); -ms-transform:rotate("+u+"); -moz-transform: rotate("+u+"); -webkit-transform: rotate("+u+');"></span>';t.append(b);var w=$(".incriment"+d+"").outerHeight();$(".incriment"+d+"").animate({top:v-w+g,left:i+"%"},s,function(){$(this).remove()})}},r)})}
