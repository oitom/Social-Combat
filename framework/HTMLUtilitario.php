<?php
function html_img($src, $title, $class, $id = null)
	{
		$src = IMG . $src;
		echo "<img src='$src' title='$title' class='$class' id='$id'>";
	}
?>