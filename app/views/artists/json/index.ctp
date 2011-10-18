<?php

$response = array(
    "paging" => $this->JsonPager->params(),
    "data" => $artists
);

echo $javascript->object($response);