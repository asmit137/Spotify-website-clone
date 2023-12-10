<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(Search) Spotify - Your favourite music is here</title>
    <link rel="icon"  href="photos/logo.png">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Ubuntu', sans-serif;
        
        }
        
        body {
            background-color: #055505;
        }
        
        nav {
            font-family: 'Ubuntu', sans-serif;
        
        }
        
        nav ul {
            display: flex;
            align-items: center;
            list-style-type: none;
            height: 50px;
            background-color: black;
            color: white;
        }
        
        nav ul li {
            padding: 0 12px;
        }
        
        
        .brand img {
            width: 44px;
            padding: 0 8px;
        }
        
        .brand {
            display: flex;
            align-items: center;
            font-weight: bolder;
            font-size: 1.3rem;
        }
        
        /* content 
        
        div 1 */
        .content {
            display: flex;
        }
      
        
        .music {
            margin: 10px;
            width: 100%;
            background-color: rgb(123, 215, 87);
        }
        
        .title {
            margin: 5px;
            background-color: black;
            color: white;
            height: 40px;
            width: 255px;
            text-align: center;
            font-size: 30px;
            font-family: 'Ubuntu', sans-serif;
        }
        
        .photo {
            background-image: url("photos/amit.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            border: 5px solid #484317;
            width: 190px;
            height: 190px;
            margin: 20PX 30PX 0PX 30px;
            border-radius: 48%;
        }
        
        .head {
            background-color: black;
            color: white;
            align-content: center;
            text-align: center;
            height: 704px;
            margin: 10px;
            padding: 10px;
            margin-top: 20px;
            border-radius: 20px;
        }
        .head h5{
            font-size: 30px;
            
        }
        .head p{
            font-size: 15px;
            margin-top: 15px;
            overflow: scroll;

        }
        
        .first {
            display: flex;
            height: 170px;
            width: 96%;
            margin: 2%;
            background-color: white;
            border-radius: 20px;
        }
        
        /* .first:hover{
            width: 1060px;
            height: 180px;
            box-shadow: 8px inset rgb(155, 233, 155);
            margin-top: 0px;
            margin-left: 0px;
        } */
        .song_img {
            background-size: contain;
            background-repeat: no-repeat;
            height: 125px;
            width: 125px;
            margin: 16px 0px 0px 9px;
        }
        
        .song_img:hover{
            margin: 0px;
            height: 160px;
            width: 160px;
        }
        
        .name {
            margin-top: 20px;
            margin-left: 50px;
            width: 373px;
        }
        
        .name h4 {
            font-size: 20px;
            margin-top: 5px;
        }
        
        .artist {
            margin-top: 8px;
            font-size: 18px;
            margin-bottom: 8px;
        }
        
        .album {
            margin-top: 5px;
            font-size: 16px
        }
        
        .play {
            height: 60px;
            width: 140px;
            padding: 10px;
            margin-top: 35px;
            border-radius: 45%;
            border-style: solid;
            margin-left: 340px;
            color: white;
            background-color: #155315;
            font-size: 22px;
            cursor: pointer;
            border: none;
        }
        
        .footer {
            background-color: black;
            color: white;
            height: 30px;
            text-align: center;
            padding-top: 15px;
        }
        
        .buttons{
            display: flex;
            margin-right: 20px;
            
        }
        .download{
            width: 141px;
          height: 63px;
          background-color: #155315;
          color: white;
          text-align: center;
          padding-top: 2px;
          margin-top: 33px;
          margin-left: 15px;
          border-radius: 45%;
          cursor: pointer;
          font-size: 22px;
          border: none;
        }
    </style>
</head>

<body>
   
    <nav>
        <!-- navbar  -->
        <ul>
            <li class="brand"><img src="photos/logo.png" alt="Spotify"> Spotify</li>
            <li onclick="goback()" style="cursor: pointer;">Go Back</li>
        </ul>
    </nav>
    <!-- information -->
    <div class="content">
        <div class="music">
        <?php
        include 'dbconnect.php';

        $query= $_GET["search"];
        $sql= "SELECT * FROM `songs` WHERE MATCH(songname, artist, album) against ('$query')";
        $noresults=true;
        $result= mysqli_query($conn, $sql);
        
        if($result){
            echo "<h2>Search results for <em> '$query'</em></h2>";
            while($row = mysqli_fetch_assoc($result)){
                $name = $row['songname'];
                $photo = $row['image'];
                $artist_name = $row['artist'];
                $album_name = $row['album'];
                $songlocation = $row['audio'];
                $folder = "photos/".$photo;
                $noresults = false;
                $filelocation = $row['file'];
                
                echo "
                <div class='first'>
                    <div class='song_img'>
                        <img src='$folder' height='125px' width='125px' alt='Image not found'>
                    </div>
                    <div class='name'>
                        <h4>Song Name : '$name'</h4>
                        <div class='artist'>Artist : $artist_name </div>
                        <div class='album'>Album : $album_name</div>
                    </div>
                <div>
                    <div class='buttons'>
                        <button class='play' id='playbutton' onclick='start()'>Play</button>
                        <a href='$songlocation' download><button class='download'>Download</button></a>
                        <a href='$filelocation'><button class='download'>Go</button></a>
                    </div>
                    <div id='audiocontainer' style='display: none;'>
                    <audio id='audio' controls style='width: 600px;margin-top: 16px; margin-left: 90px;'>
                    <source src='$songlocation' type='audio/mpeg'>
                    Your browser does not support the audio element.
                    </audio>
                    </div>
                    </div>
                    
                    </div>";
                }
            
                if($noresults){
                echo "
                <div class='first'>
                    <h1 style='margin-left: 15px; margin-top:10px;'>The result not found</h1>
                </div>";
            }
        }
    ?>
    
        </div>
    </div>
    <footer class="footer">
        <div class="copyright">
            copyright @Spotify Clone
        </div>
    </footer>

    <script>
        
function goback() {
    window.location.href = "spotify.php";
}


function start() {
    var playButton = document.getElementById('playbutton');
    var audioContainer = document.getElementById('audiocontainer');
    var audio = document.getElementById('audio');

    // Add a click event listener to the play button
    playButton.addEventListener('click', function () {
        if (audio.paused) {
            audio.play();
            playButton.innerHTML = 'Pause';
            audioContainer.style.display = 'block'; // Show the audio controls
        } else {
            audio.pause();
            playButton.innerHTML = 'Play';
        }
    });

}

    </script>
</body>
</html>