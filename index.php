<?php

include('youtube.php');

$app = new Gostrafx\Youtube();

$link_video = $app->set_url('https://www.youtube.com/watch?v=HiZXABMNCUY');
print_r($link_video);

