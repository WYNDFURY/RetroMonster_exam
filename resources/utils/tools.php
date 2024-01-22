<?php 

if (!function_exists('stars')) {
    function stars($notation)
    {
        $roundedNotation = round($notation, 1); 

        $fullStars = floor($roundedNotation);
        $halfStar = ($roundedNotation - $fullStars) == 0.5 ? 1 : 0;
        $emptyStars = 5 - $fullStars - $halfStar;

        $stars = str_repeat('★', $fullStars) . ($halfStar ? '☆' : '') . str_repeat('☆', $emptyStars);

        return $stars;
    }
}