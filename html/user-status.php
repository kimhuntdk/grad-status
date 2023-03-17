<?PHP
$user = "admin022222";
$user = substr($user, 0, 5);
if($user!="admin"){
    echo "user ไม่ใช่".$user;
}else{
    echo "user ใช่".$user;
}
?>