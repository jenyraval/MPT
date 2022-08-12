<?php
include_once("config.php");

$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {
$update_field='';
if(isset($input['status'])) {
$update_field.= "status='".$input['status']."'";
} 
if($update_field && $input['id']) {
$sql_query = "UPDATE issuedetails SET $update_field WHERE id='" . $input['id'] . "'";
mysqli_query($db, $sql_query) or die("database error:". mysqli_error($conn));
}
}
?>