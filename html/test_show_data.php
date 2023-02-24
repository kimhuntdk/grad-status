<?php
//require_once("lib/nusoap.php");
$CITIZENID = "1100200405991";
 echo $url = "http://regpr.msu.ac.th/webservice/JsonStudentMasterPaymentAndRegistWhitCitizenid.php?citizenid=".$CITIZENID;
 $contents = file_get_contents($url);
 //$contents = utf8_encode($contents);
 $results = json_decode($contents);
 foreach ($results as $key => $value) { 
 foreach ($value as $k => $v) { 
     echo "$k | $v <br />"; 
 }
}

?>