<?php

function logger($kategori, $event, $data_terpengaruh){
    $CI =& get_instance();

    $data['user'] = $CI->session->userdata('id_user');
    $data['ip_address'] = $CI->session->userdata('ip_address');
    $data['os'] = $CI->session->userdata('os');
    $data['browser'] = $CI->session->userdata('browser');
    $data['kategori'] = $kategori; 
    $data['event'] = $event; //Membuat, Mengubah, Menghapus, Login
    $data['deskripsi'] = $data_terpengaruh;

    //load model log
    $CI->load->model('M_logger');

    //save to database
    $CI->M_logger->save_log($data);

}

function logger_absen($user, $kategori, $event, $data_terpengaruh){
    $CI =& get_instance();

    $data['user'] = $user;
    $data['ip_address'] = $CI->session->userdata('ip_address');
    $data['os'] = $CI->session->userdata('os');
    $data['browser'] = $CI->session->userdata('browser');
    $data['kategori'] = $kategori; 
    $data['event'] = $event; //Membuat, Mengubah, Menghapus, Login
    $data['deskripsi'] = $data_terpengaruh;

    //load model log
    $CI->load->model('M_logger');

    //save to database
    $CI->M_logger->save_log($data);

}