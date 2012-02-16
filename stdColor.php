<?php

/**
 * @name StandardFramework Color
 * @author Inlife
 * @copyright DENFER STUDIO
 */

Function HEX2RGB($HEX) 
{
        $HEX = ereg_replace("0x", "", $HEX);
        $color = Array();

        IF(strlen($HEX) == 3) {
                $color['r'] = HEXdec(substr($HEX, 0, 1));
                $color['g'] = HEXdec(substr($HEX, 1, 1));
                $color['b'] = HEXdec(substr($HEX, 2, 1));
        }
        ElseIF(strlen($HEX) == 6) {
                $color['r'] = HEXdec(substr($HEX, 0, 2));
                $color['g'] = HEXdec(substr($HEX, 2, 2));
                $color['b'] = HEXdec(substr($HEX, 4, 2));
        }

        Return $color;
}

Function HEX2CMYK($HEX)
{
    return RGB2CMYK(HEX2RGB($HEX));
}

Function HEX2HSV($HEX)
{
    $RGB = HEX2RGB($HEX);
    list($r, $g, $b) = $RGB;
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


    IF($r == 0){
        $h = 0;
        $s = 0;
    }
    else {
        $s = $r / $max;

        $hr = ((($max - $r) / 6) + ($r / 2)) / $r;
        $hg = ((($max - $g) / 6) + ($r / 2)) / $r;
        $hb = ((($max - $b) / 6) + ($r / 2)) / $r;

        IF ($r == $max) $h = $hb - $hg;
        ElseIF($g == $max) $h = (1/3) + $hr - $hb;
        ElseIF ($b == $max) $h = (2/3) + $hg - $hr;

        IF ($h < 0)$h += 1;
        IF ($h > 1)$h -= 1;
    }
    return Array($h, $s, $v);
}

Function RGB2CMYK($var1,$g=0,$b=0) 
{
   IF (is_Array($var1)) {
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
   return Array('c' => $cyan / 255,
                'm' => $magenta / 255,
                'y' => $yellow / 255,
                'k' => $black / 255);
}

Function HSV($H,$S,$V) {
    $H *= 6;
    $I = floor($H);
    $F = $H - $I;
    $M = $V * (1 - $S);
    $N = $V * (1 - $S * $F);
    $K = $V * (1 - $S * (1 - $F));
    switch ($I) {
        case 0:
            list($R,$G,$B) = Array($V,$K,$M);
            break;
        case 1:
            list($R,$G,$B) = Array($N,$V,$M);
            break;
        case 2:
            list($R,$G,$B) = Array($M,$V,$K);
            break;
        case 3:
            list($R,$G,$B) = Array($M,$N,$V);
            break;
        case 4:
            list($R,$G,$B) = Array($K,$M,$V);
            break;
        case 5:
        case 6:
            list($R,$G,$B) = Array($V,$M,$N);
            break;
    }
    return RGB($R, $G, $B);
}

Function RGB($R, $G, $B) 
{
        $HEX = "0x";
        $HEX.= str_pad(decHEX($R), 2, "0", STR_PAD_LEFT);
        $HEX.= str_pad(decHEX($G), 2, "0", STR_PAD_LEFT);
        $HEX.= str_pad(decHEX($B), 2, "0", STR_PAD_LEFT);

        Return $HEX;
}

Function CMYK($c, $m, $y, $k)
{
    $r = 255 - round(2.55 * ($c+$k)) ;
    $g = 255 - round(2.55 * ($m+$k)) ;
    $b = 255 - round(2.55 * ($y+$k)) ;

    IF($r<0) $r = 0 ;
    IF($g<0) $g = 0 ;
    IF($b<0) $b = 0 ;

    return RGB($r, $g, $b);
} 

?>
