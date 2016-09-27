<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Print Array
 *
 * Prints array with pre
 *
 */

if ( ! function_exists('pre'))
{
	function pre($array)
	{
		echo "<pre>";
		print_r($array);
	}
}

/**
 * Print Array 
 *
 * Prints array with pre and exit
 *
 */

if ( ! function_exists('pree'))
{
	function pree($array)
	{
		echo "<pre>";
		print_r($array);
		exit;
	}
}

/* End of file file_helper.php */
/* Location: ./system/helpers/file_helper.php */