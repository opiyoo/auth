<?php


class Config {
	public static function get($path) {
		$path = explode('/', strtolower($path));

		return CONFIG[$path[0]][$path[1]];
	}
}