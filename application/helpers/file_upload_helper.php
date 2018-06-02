<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('upload_site_url'))
{
    function upload_site_url($var = '')
    {
        return get_instance()->config->item('file_upload_url').$var;
    }
    function print_content_site_url($var = '')
    {
        return get_instance()->config->item('req_print_content_url').$var;
    }   
}