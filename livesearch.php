<?php
    $connect = mysqli_connect('', '', '', '');
    $playername=mysqli_real_escape_string($connect,$_GET['q']);
    $result=mysqli_query($connect,"SELECT * FROM players WHERE playername LIKE '%" .$playername. "%' LIMIT 7");
    while ($temp=mysqli_fetch_assoc($result)) {
        $arr=explode(",",str_replace("]","",str_replace("[","",$temp['tpsarr'])));
        $foundplayer=$temp['playername'];
        $tps=round(array_sum($arr)/count($arr),1);
        if(isset($foundplayer) && $foundplayer!="")
        {
            echo '<div class="text-left d-xl-flex justify-content-xl-start" style="vertical-align: middle;text-align: left;border-bottom: 1px solid rgba(255,255,255,0.35);height: 10vh;align-items: center;"> <img src="https://minotar.net/avatar/' .$foundplayer. '" width="auto" height="75%" style="position: relative;left: 0.5%;"> <h1 style="margin-left: 1%;margin-top: 0;width: auto;color: rgba(0,0,0,0.71);font-size: 35px;">' .$foundplayer. '</h1> <h1 style="margin-right: 3%;margin-left: auto;color: rgb(56,70,84);font-size: 19px;">Average TPS : ' .$tps. '</h1> </div>';
        }
        else
        {
            echo '<h1 style="font-size:18px">No Players Found</h1>';
        }
    }   
?>