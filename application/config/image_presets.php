<?php

//Image manipulation presets
//Make sure all width/heights are the same aspect ratio
$config['thumb'] = [
    'create_thumb' => TRUE,
    'thumb_marker' => '_thumb',
    'maintain_ratio' => TRUE,
    'width' => 140,
    'height' => 79
];

$config['small'] = [
    'create_thumb' => TRUE,
    'thumb_marker' => '_small',
    'maintain_ratio' => TRUE,
    'width' => 640,
    'height' => 360

];

$config['medium'] = [
    'create_thumb' => TRUE,
    'thumb_marker' => '_medium',
    'maintain_ratio' => TRUE,
    'width' => 1280,
    'height' => 720
];

$config['large'] = [
    'create_thumb' => TRUE,
    'thumb_marker' => '_large',
    'maintain_ratio' => TRUE,
    'width' => 2080,
    'height' => 1170

];

