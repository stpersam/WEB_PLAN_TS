<?php
include "DB.php";
include "../model/picture.php";
include "../model/User.php";
session_start();

$db = new DB();
$db->connect("users");
$result = $db->getUserList();
$output = '

<table class="table table-bordered table-striped">
 <tr>
  <td>Username</td>
  <td>Status</td>
  <td>Action</td>
 </tr>
';
foreach($result as $row)
{
    if($row->Username != $_SESSION['users']['Username']){
        $output .= '
                     <tr>
                      <td>'.$row->Username.'</td>
                      <td>'.$row->State.'</td>
                      <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row->ID.'" data-tousername="'.$row->Username.'">Start Chat</button></td>
                     </tr>
                     ';
    }
}
$output .= '</table>';
echo $output;
?>

