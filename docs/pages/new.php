<?php
require '../dbh/dbh.php';

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="sample.csv"');
$output = fopen('php://output', 'wb');
fputcsv($output,array('Name','Surname','DOB','Reg-number','Program','Department','Email_address','Physical_address','contact','Gender','Password'));
$sql = "SELECT * FROM students";
$result = mysqli_query($Conn,$sql);
$Confirm = mysqli_num_rows($result);
if($Confirm > 0)
{
	while ($row = mysqli_fetch_assoc($result)){
		fputcsv($output, $row);
	}
	fclose($output);

}
else{
	echo $Conn->error;
}
/*

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="sample.csv"');
$data = array(
        'aaa,bbb,ccc,dddd',
        '123,456,789',
        '"aaa","bbb"'
);

$fp = fopen('php://output', 'wb');
foreach ( $data as $line ) {
    $val = explode(",", $line);
    fputcsv($fp, $val);
}
fclose($fp);

*/