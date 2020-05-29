<?php

require_once '../config.php';


switch ($_POST['action']) {
    case 'add_category':
        add_category($_POST['data']);
        break;
    case 'update_category':
        update_category($_POST['data']);
        break;
}


function add_category($data) {
    if (!$data) return ;
    header('Content-Type: application/json');

    parse_str(urldecode($data), $result);
    $categories = new Categories();
    echo json_encode($categories->add_category($result['category_name']));
}


function update_category($data) {
    if (!$data) return ;
    header('Content-Type: application/json');

    parse_str(urldecode($data), $result);
    $categories = new Categories();
    echo json_encode($categories->update_category($result['category_id'], $result['category_name']));
}
