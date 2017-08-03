<?php

class Configuration
{
	public static $data;

	public static function init($path, $base_url, $static_url)
	{
		self::$data['path'] = $path;
		self::$data['base_url'] = $base_url;
		self::$data['static_url'] = $static_url;
		self::$data['accesos'] = 'http://192.168.1.3/accesos/';
	}

	public static function get($key)
	{
		return self::$data[$key];
	}

	public static function set($key, $value)
	{
		return self::$data[$key] = $value;
	}

}

?>