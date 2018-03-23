<?php
$tst="netbsankdnsng";
$pattern='/(netbank|dnsng)/';

$arr=preg_match($pattern, $tst);

echo $arr;
exit;
set_time_limit(0);
$arg=$_SERVER['argv'][1];
$a=$arg;
$b=$arg+1;
$start=$a*1000;
$end=$b*1000;
// echo date("Ymd H:i:s",time());
$pattern='/(netbank|dnsng)/';
$dbh = new PDO('mysql:host=mysql;dbname=cdn', 'root', '12netwyw#&*');
$url="http://whois.chinaz.com/";
$arr=$dbh->query("SELECT id,name from records where type='A' and zzflag=0 and id>=".$start." and id<".$end." order by id asc");
// echo count($arr->fetchAll());exit;
// print_r($arr);exit;
 foreach ($arr->fetchAll() as $row) {

 	echo $url.$row['name'];
       $content=file_get_contents($url.$row['name']);
       // echo $content;
       $arr1=preg_match($pattern, $content);
       // echo $arr;
       $flag=$arr1?1:2;
       $dbh->exec("update records set zzflag=".$flag." where name='".$row['name']."'");
       	usleep(5000);
       	// break;

       
 }
// echo '<br/>';
// echo date("Ymd H:i:s",time());