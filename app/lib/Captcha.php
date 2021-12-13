<?php
namespace App\lib;
use Session;
class Captcha
{
    public function create()
    {
        $word = '';
        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $len = strlen($letters);
        for ($i = 0; $i < 5; $i++) {
            $letter = $letters[rand(0, $len - 1)];
            $word .= $letter;
        }
        Session::put('Captcha', $word);
        $image = imagecreatefrompng('./images/captcha.png');

        $font1 = './fonts/' . rand(1, 5) . '.ttf';
        $font2 = './fonts/' . rand(1, 5) . '.ttf';
        $font3 = './fonts/' . rand(1, 5) . '.ttf';
        $font4 = './fonts/' . rand(1, 5) . '.ttf';
        $font5 = './fonts/' . rand(1, 5) . '.ttf';


        $angle1 = rand(-15, 15);
        $angle2 = rand(-15, 15);
        $angle3 = rand(-15, 15);
        $angle4 = rand(-15, 15);
        $angle5 = rand(-15, 15);

        $color1 = rand(0, 255);
        $color2 = rand(0, 255);
        $color3 = rand(0, 255);
        $color4 = rand(0, 255);
        $color5 = rand(0, 255);

        $text_color1 = imagecolorallocate($image, $color1, 15, $color2);
        $text_color2 = imagecolorallocate($image, $color3, 20, $color4);
        $text_color3 = imagecolorallocate($image, $color5, 30, $color1);
        $text_color4 = imagecolorallocate($image, $color2, 15, $color3);
        $text_color5 = imagecolorallocate($image, $color4, 20, $color5);

        $size1 = rand(18, 21);
        $size2 = rand(18, 21);
        $size3 = rand(18, 21);
        $size4 = rand(18, 21);
        $size5 = rand(18, 21);

        $position1 = rand(25, 30);
        $position2 = rand(25, 30);
        $position3 = rand(25, 30);
        $position4 = rand(25, 30);
        $position5 = rand(25, 30);

        imagettftext($image, $size1, $angle1, 20, $position1, $text_color1, $font1, substr($word, 0, 1));
        imagettftext($image, $size2, $angle2, 38, $position2, $text_color2, $font2, substr($word, 1, 1));
        imagettftext($image, $size3, $angle3, 55, $position3, $text_color3, $font3, substr($word, 2, 1));
        imagettftext($image, $size4, $angle4, 70, $position4, $text_color4, $font4, substr($word, 3, 1));
        imagettftext($image, $size5, $angle5, 95, $position5, $text_color5, $font5, substr($word, 4, 1));


        header("content-type:image/png");
        imagepng($image);

    }
}