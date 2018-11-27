<?php 
$connect=mysqli_connect('OBF', 'OBF', 'OBF', 'OBF');
$page=mysqli_real_escape_string($connect,$_GET['page']-1);
if(!isset($page)) {
    $page=0;
}
if($page==-1) {
    $page=0;
}
$result=mysqli_query($connect, "SELECT * FROM players LIMIT " .($page*7). ",7");
while ($temp=mysqli_fetch_assoc($result)) {
    $export=$temp;
    $arr=explode(",", str_replace("]", "", str_replace("[", "", $export['tpsarr'])));
    $foundplayer=$export['playername'];
    $tps=round(array_sum($arr)/count($arr), 1);
    echo '<div class="text-left d-xl-flex justify-content-xl-start" style="vertical-align: middle;text-align: left;border-bottom: 1px solid rgba(255,255,255,0.35);height: 10vh;align-items: center;"> <img src="https://minotar.net/avatar/' .$foundplayer. '" width="auto" height="75%" style="position: relative;left: 0.5%;"> <h1 style="margin-left: 1%;margin-top: 0;width: auto;color: rgba(0,0,0,0.71);font-size: 35px;">' .$foundplayer. '</h1> <h1 style="margin-right: 3%;margin-left: auto;color: rgb(56,70,84);font-size: 19px;">Average TPS : ' .$tps. '</h1> </div>';
}
?>