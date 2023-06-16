<?php

require_once "db.php";
require_once "util.php";

$db = new Database();
$util = new Util();

if(isset($_POST['add'])){
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $room = $_POST['room'];
    $room_bill = $_POST['room_bill'];
    $electricity_bill = $_POST['electricity_bill'];
    $water_bill = $_POST['water_bill'];
    $parking_fee = $_POST['parking_fee'];

    if($db->insert($username,
    $phone, 
    $room, 
    $room_bill,
    $electricity_bill,
    $water_bill,
    $parking_fee)){
        echo $util->showMessage("success","User inserted successfully!");
    }else{
        echo $util->showMessage("danger","Something went wrong!");
    }
}

if(isset($_GET['read'])){
    $users = $db->read();
    $output = '';
    if ($users){
        foreach($users as $row){
            $output .= '<tr>
                <td>'.$row["id"].'</td>
                <td>'.$row["username"].'</td>
                <td>'.$row["phone"].'</td>
                <td>'.$row["room"].'</td>
                <td>'.$row["room_bill"].'</td>
                <td>'.$row["electricity_bill"].'</td>
                <td>'.$row["water_bill"].'</td>
                <td>'.$row["parking_fee"].'</td>
                <td>
                <a href="#" id="'.$row["id"].'" class="btn btn-success btn-sm rounded-pull py-0 editlink" data-bs-toggle="modal" data-bs-target="#editUserModal">Edit</a>
                <a href="#" id="'.$row["id"].'" class="btn btn-danger btn-sm rounded-pull py-0 deletelink">Delete</a>
                </td>
            </tr>';
        }
        echo $output;
    }else{
        echo '<tr>
        <td colspan="9">No users found in the Database</td>
        </tr>';
    }
}
?>
