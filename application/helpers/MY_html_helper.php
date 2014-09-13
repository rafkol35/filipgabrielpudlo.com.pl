<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('script_tag'))
{
	function script_tag($src = '', $index_page = FALSE)
	{
		$CI =& get_instance();

		$script = '<script ';

                if ( strpos($src, '://') !== FALSE)
                {
                    $script .= 'src="'.$src.'" ';
                }
                elseif ($index_page === TRUE)
                {
                    $script .= 'src="'.$CI->config->site_url($src).'" ';
                }
                else
                {
                    $script .= 'src="'.$CI->config->slash_item('base_url').$src.'" ';
                }
                $script .= 'type="text/javascript"></script>';

		return $script;
	}
}