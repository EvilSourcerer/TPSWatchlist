<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <title>NouveauDesign</title>
      <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
      <link rel="stylesheet" href="../assets/css/styles.min.css">
      
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113204701-1"></script>
      <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());
         
         gtag('config', 'UA-113204701-1');
      </script>
      <script>
        var page=1;
        function showResult(str) {
          if (str.length==0) { 
            changepage(page);
            return;
          }
          if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
          } else {  // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
              document.getElementById("container").innerHTML=this.responseText;
              document.getElementById("container").style.border="1px solid #A5ACB2";
            }
          }
          xmlhttp.open("GET","livesearch.php?q="+str,true);
          xmlhttp.send();
        }
        </script>
   </head>
   <body>
      <div style="margin-top: -20px;background-repeat: no-repeat;background-size: cover;text-align: center;height: 100vh;background-image: url(&quot;../assets/img/2b2tbg.png&quot;);filter: brightness(103%);">
         <div style="padding-top: 40px;">
            <h1 class="text-center" style="width: auto;color: rgb(255,255,255);">2b2t TPS Watchlist</h1>
         </div>
         <div class="text-center" style="width: auto;border-style: none;"><input type="text" placeholder="Search Players..." style="padding: 5px;box-sizing: border-box;height: 35px;border: none;background-color: rgba(255,255,255,0.4);width: 65%;" onkeyup="showResult(this.value)"></div>
         <div id="container" style="margin-right: auto;margin-left: auto;width: 65%;height: 70vh;background-color: rgba(255,255,255,0.4);margin-top: 1%;opacity: 1;">
            
         </div>
         <div style="margin-top: 1%;display: block;">
            <div class="btn-group" role="group"><a role="button" class="btn btn-primary shadow-lg" onclick="changepage(page-1); page=page-1;" type="button" style="border: none;background-color: rgba(255,255,255,0.5);">&lt;&lt;</a><a role="button" id="updatethis" class="btn btn-primary shadow-lg" type="button" style="border: none;background-color: rgba(255,255,255,0.5);"><script>page</script></a>
               <a role="button" class="btn btn-primary shadow-lg" onclick="changepage(page+1); page=page+1;" type="button" style="border: none;background-color: rgba(255,255,255,0.5);">&gt;&gt;</a>
            </div>
         </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
      <script src="../assets/js/script.min.js"></script>
      <script>
         changepage(1);
         function changepage(page)
         {
            xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
              document.getElementById("container").innerHTML=this.responseText;
              document.getElementById("container").style.border="1px solid #A5ACB2";
            }
          }
          xmlhttp.open("GET","liveget.php?page="+page,true);
          xmlhttp.send();
          document.getElementById("updatethis").innerHTML=page;
         }
      </script>
   </body>
</html>