<?php

echo "begin\n";

$con = mysql_connect("localhost","root","");
if (!$con)
{
  die('mysql Could not connect: ' . mysql_error());
}else{
  echo "mysql connect succness!\n";
}

mysql_select_db("fourwork", $con);

$checkindata = mysql_query("SELECT t2.student_id,t2.real_name,t2.company_name,t1.checkin_datetime FROM we_checkin_data t1 ,we_students t2 where t1.user_id = t2.student_id;");
//debug
//while($row = mysql_fetch_array($result))
//{
//  echo $row['student_id'] . " " . $row['checkin_datetime'];
//  echo "\n";
//}
mysql_close($con);
echo "mysql conncet closed!\n";



try { 
    $dbh = new PDO("sqlsrv:server=192.168.0.22;database=Kindergarten","sa","sasa"); 

    $sql = "delete from Studentdate";
    $res = $conn->query($sql);

    $stmt = $dbh->prepare("INSERT INTO Studentdate (student_id, student_name, class_name, checkin_datetime) VALUES(?,?,?,?)"); 

    try { 
        $dbh->beginTransaction(); 
        $tmt->execute( $checkindata ); 
        $dbh->commit(); 
        //print $dbh->lastInsertId(); 
    } catch(PDOExecption $e) { 
        $dbh->rollback(); 
        print "Error!: " . $e->getMessage() . "</br>"; 
    } 
} catch( PDOExecption $e ) { 
    print "Error!: " . $e->getMessage() . "</br>"; 
} 
