<?php
class SongInfoHelper extends AppHelper {
	
	function formatDuration($duration) {
		
		$minutes = intval($duration / 60);
		$seconds = intval($duration % 60);
		
		return sprintf("%d:%02d", $minutes, $seconds);
		
	}
}
?>