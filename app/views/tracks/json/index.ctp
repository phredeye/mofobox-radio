<?php 


$response = array(
	"paging" => $this->JsonPager->params(),
	"data" => $this->Track->mapAll($tracks)
);

echo $javascript->object($response);