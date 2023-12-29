<?php

if(!function_exists('full_url')){
    function full_url(){
        $ci=& get_instance();
        $return = $ci->config->site_url().$ci->uri->uri_string();
        if(count($_GET) > 0)
        {
            $get =  array();
            foreach($_GET as $key => $val)
            {
                if($key == 'per_page') continue;
                $get[] = $key.'='.$val;
            }
            $return .= '?'.implode('&',$get);
        }
        return $return;
    }
}