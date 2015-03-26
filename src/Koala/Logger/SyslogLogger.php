<?php

namespace Koala\Logger;

class SyslogLogger implements ILogger {

	public function log($message, $logName) {
		if (PHP_OS === 'Linux') {
			openlog($logName, LOG_PID, LOG_LOCAL0);
			syslog(LOG_INFO, $message);
			closelog();
		}
	}
}
