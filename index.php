<?php 


    global $inner, $odds;
    
    $parts = explode(".", time());
    mt_srand(mt_rand(-time(), time()));
    mt_srand(mt_rand(-time() * time(), time() * time()));
    mt_srand(mt_rand(-time() * time() * time(), time() * time() * time()));
    mt_srand(mt_rand(-time() * time() * time() * time(), time() * time() * time() * time()));
    $salter = ((float)(mt_rand(0,1)==1?'':'-').$parts[1].'.'.$parts[0]) / sqrt((float)$parts[1].'.'.intval(cosh($parts[0])))*tanh($parts[1]) * mt_rand(1, intval($parts[0] / $parts[1]));
    header('Blowfish-salt: '. $salter);
    
    require_once __DIR__ . DIRECTORY_SEPARATOR . 'apiconfig.php';
    error_reporting(E_ERROR);
    ini_set('display_errors', true);
    $odds = $inner = array();
    foreach($_GET as $key => $values) {
        if (!isset($inner[$key])) {
            $inner[$key] = $values;
        } elseif (!in_array(!is_array($values)?$values:md5(json_encode($values, true)), array_keys($odds[$key]))) {
            if (is_array($values)) {
                $odds[$key][md5(json_encode($inner[$key] = $values, true))] = $values;
            } else {
                $odds[$key][$inner[$key] = $values] = "$values--$key";
            }
        }
    }
    foreach($_POST as $key => $values) {
        if (!isset($inner[$key])) {
            $inner[$key] = $values;
        } elseif (!in_array(!is_array($values)?$values:md5(json_encode($values, true)), array_keys($odds[$key]))) {
            if (is_array($values)) {
                $odds[$key][md5(json_encode($inner[$key] = $values, true))] = $values;
            } else {
                $odds[$key][$inner[$key] = $values] = "$values--$key";
            }
        }
    }
    foreach(parse_url('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].(strpos($_SERVER['REQUEST_URI'], '?')?'&':'?').$_SERVER['QUERY_STRING'], PHP_URL_QUERY) as $key => $values) {
        if (!isset($inner[$key])) {
            $inner[$key] = $values;
        } elseif (!in_array(!is_array($values)?$values:md5(json_encode($values, true)), array_keys($odds[$key]))) {
            if (is_array($values)) {
                $odds[$key][md5(json_encode($inner[$key] = $values, true))] = $values;
            } else {
                $odds[$key][$inner[$key] = $values] = "$values--$key";
            }
        }
    }
 
    $audio = getAudioListAsArray(API_ROOT_PATH . DS . 'uploads' . DS . 'mp3');
    if (count($audio)>0) {
        $files = array();
        foreach($audio as $mp3)
            $files[] = $mp3['file'];
        shuffle($files); shuffle($files); shuffle($files); shuffle($files); shuffle($files);
        define("AUDIO_MP3", API_URL . '/uploads/mp3/' . $files[mt_rand(0, count($files)-1)]);
    }
    
    if (!defined("AUDIO_MP3")) {
        $audio = getAudioListAsArray(API_ROOT_PATH . DS . 'assets' . DS . 'mp3');
        $files = array();
        foreach($audio as $mp3)
            $files[] = $mp3['file'];
        shuffle($files); shuffle($files); shuffle($files); shuffle($files); shuffle($files);
        define("AUDIO_MP3", API_URL . '/assets/mp3/' . $files[mt_rand(0, count($files)-1)]);
    }
    
    $backgrounds = getImagesListAsArray(API_ROOT_PATH . DS . 'uploads' . DS . 'backgrounds');
    if (count($backgrounds)>0) {
        $files = array();
        foreach($backgrounds as $image)
            $files[] = $image['file'];
        shuffle($files); shuffle($files); shuffle($files); shuffle($files); shuffle($files);
        define("BACKGROUND_IMAGE", API_URL . '/uploads/backgrounds/' . $files[mt_rand(0, count($files)-1)]);
    }
    
    if (!defined("BACKGROUND_IMAGE")) {
        $backgrounds = getImagesListAsArray(API_ROOT_PATH . DS . 'assets' . DS . 'images' . DS . 'backgrounds');
        $files = array();
        foreach($backgrounds as $image)
            $files[] = $image['file'];
        shuffle($files); shuffle($files); shuffle($files); shuffle($files); shuffle($files);
        define("BACKGROUND_IMAGE", API_URL . '/assets/images/backgrounds/' . $files[mt_rand(0, count($files)-1)]);
    }
    
    require_once __DIR__ . DS . 'template.php';
?>
