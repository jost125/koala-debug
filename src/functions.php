<?php

use Koala\Logger\SyslogLogger;

function vd($variable) {
	var_dump($variable);
}

function vdf($var) {
	vd($var);
	if (ob_get_level() > 0) {
		ob_flush();
	}
	flush();
}

function l($message, $logName) {
	$logger = new SyslogLogger();
	$logger->log(is_array($message) || is_object($message) ? vds($message) : $message, $logName);
}

function vds($var) {
	ob_start();
	vd($var);
	$string = ob_get_contents();
	ob_end_clean();
	return $string;
}

function vdx($var) {
	vd($var);
	exit();
}
