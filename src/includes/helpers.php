<?php
function split_on_newlines($input)
{
	return preg_split("/\r\n|\n|\r/", $input);
}

function is_whitespace($input)
{
	return ctype_space($input) || $input == "";
}

function shorten($input, $max_length = 300)
{
	if (strlen($input) < $max_length) {
		return $input;
	}

	return substr($input, 0, $max_length) . "...";
}