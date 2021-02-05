<?php

/**
 * Placeholder generates a single colour image, based on the path of the request. Used for image placeholders
 * in development.
 */

/**
 * Helper function to return a value from an array, else the fallback value
 */
function array_value($key, Array $arr, $fallback) {
  if (!array_key_exists($key, $arr)) {
    return $fallback;
  }
  return $arr[$key];
}

function generateColorImage($seed, $width, $height) {
  $color = substr(md5($seed), 0, 6);
  $rgb = array_map('hexdec', str_split($color, 2));

  $image = imagecreate($width, $height);
  $bg = imagecolorallocate($image, ...$rgb);

  header("Content-type: image/png");

  imagepng($image);
  imagecolordeallocate($image, $bg );
  imagedestroy($image);
}

generateColorImage(
  array_value('REQUEST_URI', $_SERVER, '/'),
  array_value('width', $_GET, 800),
  array_value('height', $_GET, 600)
);
