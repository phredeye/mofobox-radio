<?php

class TrackHelper extends AppHelper {
	
	public function map($row) {
		$track = $row["Track"];
		$track["artist"] = $row["Artist"];
		$track["album"] = $row["Album"];
		return $track;
	}
	
	public function mapAll($tracks) {
		$data = array();
		foreach($tracks as $row) {
			$data[] = $this->map($row);
		}
		return $data;
	}
	
}
?>