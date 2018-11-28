<?php
    if($_GET['auth']=="")
    {
        $connect = mysqli_connect('', '', '', '');
        $playername=$_GET['player'];
        $tps=$_GET['tps'];
        echo "SELECT tpsarr FROM players WHERE playername='" .$playername ."'";
        $previousarr=explode(",",str_replace("]","",str_replace("[","",mysqli_fetch_array(mysqli_query($connect,"SELECT tpsarr FROM players WHERE playername='" .$playername ."'"))[0]))) or die(mysqli_error($connect));
        array_push($previousarr,$tps);
        $serialized="[" .ltrim(implode(",",$previousarr),','). "]";
        $avg=round(array_sum($previousarr)/count($previousarr), 1);
        mysqli_query($connect,"INSERT INTO players(playername,tpsarr,scans,avgtps) VALUES('" .$playername. "','" .$serialized. "',1," .$previousarr[0]. ") ON DUPLICATE KEY UPDATE tpsarr='" .$serialized. "',scans=scans+1,avgtps=" .$avg) or die(mysqli_error($connect));
        echo "UPDATED KEK!";
    }
?>