<?php
    /*Template Name: AJAX Fetch User Data*/

    if (!is_user_logged_in()){
        exit;
    } 

    $users = get_users(array('fields' => array('ID', 'user_login', 'user_email', 'user_pass'), 'orderby' => 'ID', 'order'   => 'ASC'));

    $user_list = [];
    $user_list['data'] = [];

    foreach ($users as $user){
        $temp = array();
        foreach ($user as $key => $val){
            $temp[$key] = $val;
        }
        $temp_user_meta = get_user_meta($temp['ID']);

        $temp['first']      = ($temp_user_meta['First Name'] != null || $temp_user_meta['First Name'] != "")? $temp_user_meta['First Name'][0] : "N/A";
        $temp['middle']     = ($temp_user_meta['Middle Name'] != null || $temp_user_meta['Middle Name'] != "")? $temp_user_meta['Middle Name'][0] : "N/A";
        $temp['last']       = ($temp_user_meta['Last Name'] != null) || $temp_user_meta['Last Name'] != ""? $temp_user_meta['Last Name'][0] : "N/A";
        $temp['dob']        = ($temp_user_meta['DOB'] != null || $temp_user_meta['DOB'] != "")? $temp_user_meta['DOB'][0] : "N/A";
        $temp['mobile']     = ($temp_user_meta['Mobile'] != null) || $temp_user_meta['Mobile'] != ""? $temp_user_meta['Mobile'][0] : "N/A";
        $temp['address']    = ($temp_user_meta['Address'] != null || $temp_user_meta['Address'] != "")? $temp_user_meta['Address'][0] : "N/A";
        array_push($user_list['data'], $temp);
    }

    echo json_encode($user_list);
?>