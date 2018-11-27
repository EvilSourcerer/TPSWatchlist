<?php
    if($_GET['auth']=="OBF")
    {
        $connect = mysqli_connect('OBF', 'OBF', 'OBF', 'OBF');
        $playername=$_GET['player'];
        $tps=$_GET['tps'];
        echo "SELECT tpsarr FROM players WHERE playername='" .$playername ."'";
        $previousarr=explode(",",str_replace("]","",str_replace("[","",mysqli_fetch_array(mysqli_query($connect,"SELECT tpsarr FROM players WHERE playername='" .$playername ."'"))[0]))) or die(mysqli_error($connect));
        array_push($previousarr,$tps);
        $serialized="[" .ltrim(implode(",",$previousarr),','). "]";
        mysqli_query($connect,"INSERT INTO players(playername,tpsarr) VALUES('" .$playername. "','" .$serialized. "') ON DUPLICATE KEY UPDATE tpsarr='" .$serialized. "'") or die(mysqli_error($connect));
        echo "UPDATED KEK!";
    }
?>