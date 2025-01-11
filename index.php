<?php

require "src/repository/database.php";

class Routing
{
	public function basic_route($src, $dest)
	{
		$path = "/";
		if (!empty($_SERVER['REQUEST_URI']))
		{
            $src = preg_replace("/(^\/)|(\/$)/", "", $src);
            $path =  preg_replace("/(^\/)|(\/$)/", "", $_SERVER['REQUEST_URI']);
        }

		if ($path == $src)
		{
			$params = [];
			include($dest);
			exit();
		}
	}

    public function not_found($dest)
	{
        include($dest);
        exit();
    }

	public function complex_route($src, $dest)
	{
		$params = [];
		$paramKey = [];

		preg_match_all("/(?<={).+?(?=})/", $src, $paramMatches);
		if (empty($paramMatches[0]))
		{
            $this->basic_route($src, $dest);
            return;
        }

		foreach ($paramMatches[0] as $key)
			$paramKey[] = $key;

		$path = "/";
		if (!empty($_SERVER['REQUEST_URI']))
		{
            $src = preg_replace("/(^\/)|(\/$)/", "", $src);
            $path =  preg_replace("/(^\/)|(\/$)/", "", $_SERVER['REQUEST_URI']);
        }

		$uri = explode("/", $src);
		$indexNum = []; 

		foreach ($uri as $index => $param)
			if (preg_match("/{.*}/", $param))
				$indexNum[] = $index;

		$path = explode("/", $path);
		foreach ($indexNum as $key => $index)
		{
			if (empty($path[$index]))
				return;

			$params[$paramKey[$key]] = $path[$index];
			$path[$index] = "{.*}";
		}

		$path = implode("/", $path);
		$path = str_replace("/", '\\/', $path);

		if (preg_match("/$path/", $src))
		{
			include($dest);
			exit();
		}
	}
}

$routing = new Routing();
$routing->basic_route("", "public/views/landing-page.php");
$routing->basic_route("/about", "public/views/about.php");
$routing->basic_route("/faq", "public/views/faq.php");
$routing->complex_route("/feed/{filter}", "public/views/feed.php");
$routing->basic_route("/login", "public/views/login.php");
$routing->basic_route("/register", "public/views/register.php");
$routing->not_found("public/views/error.php");