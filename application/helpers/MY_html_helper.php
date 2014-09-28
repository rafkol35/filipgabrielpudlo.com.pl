<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('script_tag')) {

    function script_tag($src = '', $index_page = FALSE) {
        $CI = & get_instance();

        $script = '<script ';

        if (strpos($src, '://') !== FALSE) {
            $script .= 'src="' . $src . '" ';
        } elseif ($index_page === TRUE) {
            $script .= 'src="' . $CI->config->site_url($src) . '" ';
        } else {
            $script .= 'src="' . $CI->config->slash_item('base_url') . $src . '" ';
        }
        $script .= 'type="text/javascript"></script>';

        return $script;
    }
}

if (!function_exists('removeButton')) {

    function removeButton($onClick,$gfx='') {
        if( $gfx === '')
            echo '<div class="removeButton" onclick="'.$onClick.';"></div>';
        else
            echo '<div class="removeButton" onclick="'.$onClick.';">'.img($gfx).'</div>';
    }
}

if (!function_exists('editButton')) {

    function editButton($href) {
        echo '<a href="'.$href.'"><div class="editButton">EDIT</div></a>';
    }
}