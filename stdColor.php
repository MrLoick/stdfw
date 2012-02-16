<?php

/**
 * @name StandardFramework Color
 * @author Inlife
 * @copyright DENFER STUDIO
 */

Function HexToRGB($hex) 
{
        $hex = ereg_replace("0x", "", $hex);
        $color = array();

        IF(strlen($hex) == 3) {
                $color['r'] = hexdec(substr($hex, 0, 1));
                $color['g'] = hexdec(substr($hex, 1, 1));
                $color['b'] = hexdec(substr($hex, 2, 1));
        }
        ELSE IF(strlen($hex) == 6) {
                $color['r'] = hexdec(substr($hex, 0, 2));
                $color['g'] = hexdec(substr($hex, 2, 2));
                $color['b'] = hexdec(substr($hex, 4, 2));
        }

        Return $color;
}

Function HexToCmyk($hex)
{
    return Rgb2Cmyk(HexToRGB($hex));
}

Function HexToHSV($hex)
{
    $rgb = HexToRgb($hex);
    list($r, $g, $b) = $rgb;
    $r = $r/255;
    $g = $g/255;
    $b = $b/255;

    $h = 0;
    $s = 0;
    $v = 0;

    $min = min(min($r, $g),$b);
    $max = max(max($r, $g),$b);

    $r = $max-$min;
    $v = $max;


    if($r == 0){
        $h = 0;
        $s = 0;
    }
    else {
        $s = $r / $max;

        $hr = ((($max - $r) / 6) + ($r / 2)) / $r;
        $hg = ((($max - $g) / 6) + ($r / 2)) / $r;
        $hb = ((($max - $b) / 6) + ($r / 2)) / $r;

        if ($r == $max) $h = $hb - $hg;
        else if($g == $max) $h = (1/3) + $hr - $hb;
        else if ($b == $max) $h = (2/3) + $hg - $hr;

        if ($h < 0)$h += 1;
        if ($h > 1)$h -= 1;
    }
    return array($h, $s, $v);
}

Function Rgb2Cmyk($var1,$g=0,$b=0) 
{
   if (is_array($var1)) {
      $r = $var1['r'];
      $g = $var1['g'];
      $b = $var1['b'];
   } else {
      $r=$var1;
   }
   $cyan    = 255 - $r;
   $magenta = 255 - $g;
   $yellow  = 255 - $b;
   $black  = min($cyan, $magenta, $yellow);
   $cyan    = @(($cyan    - $black) / (255 - $black)) * 255;
   $magenta = @(($magenta - $black) / (255 - $black)) * 255;
   $yellow  = @(($yellow  - $black) / (255 - $black)) * 255;
   return array('c' => $cyan / 255,
                'm' => $magenta / 255,
                'y' => $yellow / 255,
                'k' => $black / 255);
}

Function HSV($H,$S,$V) {
    //1
    $H *= 6;
    //2
    $I = floor($H);
    $F = $H - $I;
    //3
    $M = $V * (1 - $S);
    $N = $V * (1 - $S * $F);
    $K = $V * (1 - $S * (1 - $F));
    //4
    switch ($I) {
        case 0:
            list($R,$G,$B) = array($V,$K,$M);
            break;
        case 1:
            list($R,$G,$B) = array($N,$V,$M);
            break;
        case 2:
            list($R,$G,$B) = array($M,$V,$K);
            break;
        case 3:
            list($R,$G,$B) = array($M,$N,$V);
            break;
        case 4:
            list($R,$G,$B) = array($K,$M,$V);
            break;
        case 5:
        case 6: //for when $H=1 is given
            list($R,$G,$B) = array($V,$M,$N);
            break;
    }
    return Rgb($R, $G, $B);
}

Function Rgb($R, $G, $B) 
{
        $hex = "0x";
        $hex.= str_pad(dechex($R), 2, "0", STR_PAD_LEFT);
        $hex.= str_pad(dechex($G), 2, "0", STR_PAD_LEFT);
        $hex.= str_pad(dechex($B), 2, "0", STR_PAD_LEFT);

        Return $hex;
}

Function Cmyk($c, $m, $y, $k)
{
    $r = 255 - round(2.55 * ($c+$k)) ;
    $g = 255 - round(2.55 * ($m+$k)) ;
    $b = 255 - round(2.55 * ($y+$k)) ;

    if($r<0) $r = 0 ;
    if($g<0) $g = 0 ;
    if($b<0) $b = 0 ;

    return Rgb($r, $g, $b);
} 

?>
