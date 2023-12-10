<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location : login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify - Your favourite music is here</title>
    <link rel="icon" href="photos/logo.png">
    <link rel="stylesheet" href="spotify.css">
    <link rel="stylesheet" href="r1c3.html">
</head>
<style>
    .search {
    width: 400px;
    height: 35px;
    border-radius: 20px;
    margin-left: 250px;
    margin-right: 130px;
    border: none;
    padding-left: 6px;
    }
    .sidebar h2 {
    background-color: black;
    color: white;
    width: 94%;
    height: 40px;
    text-align: center;
    border-radius: 16px;
    padding: 3px;
    margin: 5px;
    background-color: black;
    color: white;
}

.sidebar {
    width: 15%;
    background-color: rgb(44, 42, 80);
    margin-top: 10px;
    margin-left: 2px;
    background-color: #131313;
}

.sidebar p {
    background-color: black;
    color: white;
    margin: 5px;
    padding: 10px;
    border-radius: 16px;
}

.special {
    background-color: black;
    height: 347px;
    border-radius: 16px;
    padding: 8px 6px 3px 7px;
}

.small {
    display: flex;
    color: white;
    height: 50px;
    background-color: #312c2c;
    border-radius: 10px;
    align-items: center;
}

.music-player {
    text-align: center;
    background-color: #131313;
    border-radius: 8px;
    margin: 12px 6px 7px 0px;
}

.music-title {
    text-align: center;
    color: white;
    margin: 10px 0px 0px 1px;
}

.play-pause-btn {
    font-size: 22px;
    cursor: pointer;
    margin-right: 2px;
    margin-top: 3px;
    background-color: #131313;
    color: white;
    border: none;
}

.download-btn {
    font-size: 24px;
    cursor: pointer;
    background-color: #131313;
    color: white;
    border: none;
    margin-top: 5px;
    margin-left: 2px;
    margin-right: 6px;
}

.special_content {
    display: flex;
    margin-left: 7px;
}

.content_hd1{
    background-color: #53ce53;
}

    @media only screen and (max-width: 768px) {
        /* Adjustments for devices with a maximum width of 768px */
        .sidebar {
            width: 100%;
            margin-left: 0;
        }

        .search {
            margin-left: 10px;
            margin-right: 10px;
        }


    }

    @media only screen and (max-width: 600px) {
        /* Adjustments for devices with a maximum width of 600px */
        .content1,
        .content2 {
            height: auto;
        }
    }


</style>
<body>
    <nav>
        <!-- navbar  -->
        <ul>
            <li class="brand"><img src="photos/logo.png" alt="Spotify"> Spotify</li>
            <li>
                <form action="search.php" method="get" style="display: flex">
                    <input type="text" class="search" name="search" placeholder="Search for Music....."
                        style="display: flex;">

                    <input type="submit" name="submit" value="Search" class="button"
                        style=" height: 35px; width: 80px; border-radius: 50px; background-color: #53ce53; font-size: 16px; border: none; cursor: pointer; margin-right: 50px;margin-left: -121px;">
                </form>
            </li>
            <li onclick="gohome()" style="cursor: pointer;">Home</li>
            
            <li>Hello,
                <?php echo $_SESSION['username']?>
            </li>
            <li><button
                    style=" height: 33px; width: 73px; border-radius: 50px; background-color: #53ce53; font-size: 16px; border: none; cursor: pointer; margin-right: 15px;"
                    onclick="gohome1()">Logout</button></li>
        </ul>
    </nav>
    <!-- main page -->
    <div class="main" style="background-color: #131313;">
        <div class="sidebar">
            <h2>About</h2>
            <p id="about">
                Spotify is an international online and offline music streaming and media services provider,
                headquartered in Stockholm, Sweden. Founded in April 2006, which is the Spotify creation date, Spotify
                is the world's largest music streaming service provider. In India, Spotify is the largest audio
                streaming platform among international players.
                <br><br>
                Welcome to “Spotify Clone”. This is the first module in the series we will see “What is Spotify Clone
                and how does it work”. Spotify Clone is a digital music, podcast and video streaming services that gives
                you access to millions of songs from artists all over the world, like other music streaming platform for
                e.g. Youtube Music, Jio Savaan, Music Mania, Retro music, etc.
                <br><br>
                Spotify Clone is immediately appealing because you can access content for free by simply signing up
                using an Email address or by connecting with Facebook, Gmail Account.
            </p>
            <h2 style="margin-top: 10px; height: 30px;">Spotify Special</h2>
            <div class="special">
                <div class="btn">
                    <div class="music-player" id="music-player" style="display: flex;">
                        <div class="music-title" id="music-title">1. Hanuman Chalisa</div>
                        <div class="special_content">
                            <button class="play-pause-btn" id="play-pause-btn" onclick="togglePlayPause()">▶</button>
                            <a href="Songs/शर हनमन चलस Shree Hanuman Chalisa Original Video GULSHAN KUMAR HARIHARAN Full HD.mp3"
                                download><button class="download-btn" id="download-btn"
                                    onclick="download()">⬇</button></a>
                            <audio id="music"
                                src="Songs/शर हनमन चलस Shree Hanuman Chalisa Original Video GULSHAN KUMAR HARIHARAN Full HD.mp3"></audio>
                        </div>
                    </div>

                    <div class="music-player" id="music-player1" style="display: flex;">
                        <div class="music-title" id="music-title1">2. Keejo Kesari ke...</div>
                        <div class="special_content">
                            <button class="play-pause-btn" id="play-pause-btn1" onclick="togglePlayPause1()">▶</button>
                            <a href="Songs/Keejo Kesari Ke Laal Hanuman Janmotsav Special Remix l DJAnkurofficial x DJAshuIndore [TubeRipper.com].mp3"
                                download><button class="download-btn" id="download-btn1"
                                    onclick="download()">⬇</button></a>
                            <audio id="music1"
                                src="Songs/Keejo Kesari Ke Laal Hanuman Janmotsav Special Remix l DJAnkurofficial x DJAshuIndore [TubeRipper.com].mp3"></audio>
                        </div>
                    </div>

                    <div class="music-player" id="music-player2" style="display: flex;">
                        <div class="music-title" id="music-title2">3. Shri Ram Janki....</div>
                        <div class="special_content">
                            <button class="play-pause-btn" id="play-pause-btn2" onclick="togglePlayPause2()">▶</button>
                            <a href="Songs/Shri Ram Janki Baithe Hai Mere Seene Me Dj Song DJ Rohit Mumbai 2023 Ram Navmi Dj Song JayShree Ram.mp3"
                                download><button class="download-btn" id="download-btn2"
                                    onclick="download()">⬇</button></a>
                            <audio id="music2" src="Songs/Shri Ram Janki Baithe Hai Mere Seene Me Dj Song DJ Rohit Mumbai 2023 Ram Navmi Dj Song JayShree Ram.mp3"></audio>
                        </div>
                    </div>

                    <div class="music-player" id="music-player3" style="display: flex;">
                        <div class="music-title" id="music-title3">4. Har Ghar Me.......</div>
                        <div class="special_content">
                            <button class="play-pause-btn" id="play-pause-btn3" onclick="togglePlayPause3()">▶</button>
                            <a href="Songs/Har Ghar Me Ab ek hi naam ek hi Nara gunjega full DJ remix song 2023.mp3"
                                download><button class="download-btn" id="download-btn3"
                                    onclick="download()">⬇</button></a>
                            <audio id="music3"
                                src="Songs/Har Ghar Me Ab ek hi naam ek hi Nara gunjega full DJ remix song 2023.mp3"></audio>
                        </div>
                    </div>

                    <div class="music-player" id="music-player4" style="display: flex;">
                        <div class="music-title" id="music-title4">5. Ye Bhagwa Rang.</div>
                        <div class="special_content">
                            <button class="play-pause-btn" id="play-pause-btn4" onclick="togglePlayPause4()">▶</button>
                            <a href="Songs/य भगव रग Ye Bhagwa Rang DJ Song (MarathiBeatz).mp3" download><button
                                    class="download-btn" id="download-btn4" onclick="download()">⬇</button></a>
                            <audio id="music4" src="Songs/य भगव रग Ye Bhagwa Rang DJ Song (MarathiBeatz).mp3"></audio>
                        </div>
                    </div>

                    <div class="music-player" id="music-player5" style="display: flex;">
                        <div class="music-title" id="music-title5">6. Khalasi.........</div>
                        <div class="special_content">
                            <button class="play-pause-btn" id="play-pause-btn5" onclick="togglePlayPause5()">▶</button>
                            <a href="Songs/Gotilo(PaglaSongs).mp3" download><button class="download-btn"
                                    id="download-btn5" onclick="download()">⬇</button></a>
                            <audio id="music5" src="Songs/Gotilo(PaglaSongs).mp3"></audio>
                        </div>
                    </div>

                  

                </div>
            </div>

        </div>

        <div class="content" style="height: 1230px; background-color: #131313;">
            <!-- landscape 1 -->
            <div class="content1" style="background-color: black;">
                <div class="content_hd1" id="heading1" style="cursor: pointer;  background-color: #53ce53;">
                    <h3>
                        Most listen songs >
                    </h3>
                </div>

                <div class="box_content">
                    <div class="box1 box black">
                        <div class="boxcontent">
                            <a href="r1c1.html">
                                <div class="box-img"
                                    style="background-image: url('photos/Chaleya_Re.jpeg'); cursor: pointer;"></div>
                            </a>
                        </div>
                    </div>

                    <div class="box2 box black">
                        <div class="boxcontent">
                            <a href="r1c2.html">
                                <div class="box-img" style="background-image: url('photos/leo1.jpeg');"></div>
                            </a>
                        </div>
                    </div>

                    <div class="box3 box black">
                        <div class="boxcontent">
                            <a href="r1c3.html">
                                <div class="box-img"
                                    style="background-image: url('photos/uchi_uchi.jpeg'); margin-left: 10px"></div>
                            </a>
                        </div>
                    </div>
                    <div class="box4 box black">
                        <div class="boxcontent">
                            <a href="r1c4.html">
                                <div class="box-img" style="background-image: url('photos/udd_ja.jpeg');"></div>
                            </a>
                        </div>
                    </div>

                    <div class="box5 box black">
                        <div class="boxcontent">
                            <a href="r1c5.html">
                                <div class="box-img" style="background-image: url('photos/heeriye.jpeg');"></div>
                            </a>
                        </div>
                    </div>

                    <div class="box4 box black">
                        <div class="boxcontent">
                            <a href="r1c6.html">
                                <div class="box-img" style="background-image: url('photos/kavalya.jpeg');"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- landscape 1 end -->
            <!-- landscapee 2 -->
            <div class="content1 content2" style="background-color: black;">
                <div class="content_hd1" id="heading2" style="cursor: pointer; background-color: #53ce53;">
                    <h3>
                        new songs >
                    </h3>
                </div>

                <div class="box_content">
                    <div class="box1 box black">
                        <div class="boxcontent">
                            <a href="r2c1.html">
                                <div class="box-img" style="background-image: url('photos/Not_ramaiya.jpeg');"></div>
                            </a>
                        </div>
                    </div>

                    <div class="box2 box black">
                        <div class="boxcontent">
                            <a href="r2c2.html">
                                <div class="box-img" style="background-image: url('photos/devadeva.jpeg'); "></div>
                            </a>
                        </div>
                    </div>

                    <div class="box3 box black">
                        <div class="boxcontent">
                            <a href="r2c3.html">
                                <div class="box-img" style="background-image: url('photos/whatjumka.jpeg');"></div>
                            </a>
                        </div>
                    </div>
                    <div class="box4 box black">
                        <div class="boxcontent">
                            <a href="r2c4.html">
                                <div class="box-img" style="background-image: url('photos/zindabanda.jpeg');"></div>
                            </a>
                        </div>
                    </div>
                    <div class="box5 box black">
                        <div class="boxcontent">
                            <a href="r2c5.html">
                                <div class="box-img" style="background-image: url('photos/Hukum.jpeg');"></div>
                            </a>
                        </div>
                    </div>

                    <div class="box4 box black">
                        <div class="boxcontent">
                            <a href="r2c6.html">
                                <div class="box-img" style="background-image: url('photos/mainnikla.jpg');"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- landscape 2 end -->
            <!-- landscape 3 -->
            <div class="content1 content2" style="background-color: black;">
                <div class="content_hd1" id="heading3" style="cursor: pointer; background-color: #53ce53;">
                    <h3>
                        90's songs >
                    </h3>
                </div>

                <div class="box_content">
                    <div class="box1 box black">
                        <div class="boxcontent">
                            <a href="r3c1.html">
                                <div class="box-img" style="background-image: url('photos/chalo_ishq.jpeg');"></div>
                            </a>
                        </div>
                    </div>

                    <div class="box2 box black">
                        <div class="boxcontent">
                            <a href="r3c2.html">
                                <div class="box-img" style="background-image: url('photos/bademiyan.jpeg');"></div>
                            </a>
                        </div>
                    </div>

                    <div class="box3 box black">
                        <div class="boxcontent">
                            <a href="r3c3.html">
                                <div class="box-img"
                                    style="background-image: url('photos/yeladki.jpg'); margin-left:14px;"></div>
                            </a>
                        </div>
                    </div>
                    <div class="box4 box black">
                        <div class="boxcontent">
                            <a href="r3c4.html">
                                <div class="box-img" style="background-image: url('photos/Sajan.jpeg');"></div>
                            </a>
                        </div>
                    </div>

                    <div class="box5 box black">
                        <div class="boxcontent">
                            <a href="r3c5.html">
                                <div class="box-img" style="background-image: url('photos/Akhiyo.jpeg');"></div>
                            </a>
                        </div>
                    </div>

                    <div class="box4 box black">
                        <div class="boxcontent">
                            <a href="r3c6.html">
                                <div class="box-img" style="background-image: url('photos/DDLJ.jpeg');"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- landscape 3 end -->

            <div class="content1 content2" style="background-color: black;">
                <div class="content_hd1" id="heading4" style="cursor: pointer; background-color: #53ce53;">
                    <h3>
                        Marathi Songs >
                    </h3>
                </div>

                <div class="box_content">
                    <div class="box1 box black">
                        <div class="boxcontent">
                            <a href="r4c1.html">
                                <div class="box-img" style="background-image: url('photos/duniyadari.jpeg');"></div>
                            </a>
                        </div>
                    </div>

                    <div class="box2 box black">
                        <div class="boxcontent">
                            <a href="r4c2.html">
                                <div class="box-img" style="background-image: url('photos/chandramukhi.jpeg');">
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="box3 box black">
                        <div class="boxcontent">
                            <a href="r4c3.html">
                                <div class="box-img" style="background-image: url('photos/ventilator.jpeg');"></div>
                            </a>
                        </div>
                    </div>
                    <div class="box4 box black">
                        <div class="boxcontent">
                            <a href="r4c4.html">
                                <div class="box-img" style="background-image: url('photos/pavankind.jpeg');"></div>
                            </a>
                        </div>
                    </div>

                    <div class="box5 box black">
                        <div class="boxcontent">
                            <a href="r4c5.html">
                                <div class="box-img" style="background-image: url('photos/tisadhyakaykarte.jpeg');">
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="box4 box black">
                        <div class="boxcontent">
                            <a href="r4c6.html">
                                <div class="box-img" style="background-image: url('photos/boyz.jpeg');"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- landscape 4 -->
            <div class="content1 content2" style="background-color: black;">
                <div class="content_hd1" id="heading4" style="cursor: pointer; background-color: #53ce53; ">
                    <h3>
                        Artist >
                    </h3>
                </div>

                <div class="box_content">
                    <div class="box1 box black">
                        <div class="boxcontent">
                            <a href="artist.html">
                                <div class="box-img" style="background-image: url('photos/sonu1.jpeg');"></div>
                            </a>
                        </div>
                    </div>

                    <div class="box2 box black">
                        <div class="boxcontent">
                            <a href="artist1.html">
                                <div class="box-img" style="background-image: url('photos/arijit1.jpeg');">
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="box3 box black">
                        <div class="boxcontent">
                            <a href="artist2.html">
                                <div class="box-img" style="background-image: url('photos/anirudh1.jpeg');"></div>
                            </a>
                        </div>
                    </div>
                    <div class="box4 box black">
                        <div class="boxcontent">
                            <a href="artist3.html">
                                <div class="box-img" style="background-image: url('photos/amit.jpg');"></div>
                            </a>
                        </div>
                    </div>

                    <div class="box5 box black">
                        <div class="boxcontent">
                            <a href="artist4.html">
                                <div class="box-img" style="background-image: url('photos/kishor_kumar.jpeg');"></div>
                            </a>
                        </div>
                    </div>

                    <div class="box4 box black">
                        <div class="boxcontent">
                            <a href="artist5.html">
                                <div class="box-img" style="background-image: url('photos/ajay_atul.jpeg');"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- landscape 4 end -->
        </div>
        <!-- content div end -->
    </div>
    <!-- main page end -->

    <footer class="footer">
        <div class="copyright">
            copyright @Spotify Clone
        </div>
    </footer>
    <!-- Footer end -->
    <script src="spotify.js"></script>
    <script>
        
// Internal Javascript


function gohome() {
    window.location.href = 'spotify.php';
}
function gohome1() {
    window.location.href = 'logout.php';
}

var isPlaying = false;
var audio = document.getElementById('music');

function togglePlayPause() {
    var playPauseBtn = document.getElementById('play-pause-btn');

    isPlaying = !isPlaying;

    if (isPlaying) {
        audio.play();
        playPauseBtn.textContent = '⏸︎';
        document.getElementById('music-title').innerHTML = "<marquee>1. शर हनमन चलस Shree Hanuman Chalisa Original</marquee>";
        

    } else {
        audio.pause();
        playPauseBtn.textContent = '▶';
        document.getElementById('music-title').innerHTML = "1. Hanuman Chalisa";
    }
}

function togglePlayPause1() {
    var playPauseBtn = document.getElementById('play-pause-btn1');
    var audio = document.getElementById('music1');
    isPlaying = !isPlaying;

    if (isPlaying) {
        audio.play();
        playPauseBtn.textContent = '⏸︎';
        document.getElementById('music-title1').innerHTML = "<marquee>2. Keejo Kesari Ke Laal Hanuman Janmotsav Special Remix l DJAnkurofficial x DJAshuIndore</marquee>";

    } else {
        audio.pause();
        playPauseBtn.textContent = '▶';
        document.getElementById('music-title1').innerHTML = "2. Keejo Kesari ke...";
    }
}

function togglePlayPause2() {
    var playPauseBtn = document.getElementById('play-pause-btn2');
    var audio = document.getElementById('music2');
    isPlaying = !isPlaying;

    if (isPlaying) {
        audio.play();
        playPauseBtn.textContent = '⏸︎';
        document.getElementById('music-title2').innerHTML = "<marquee>3. Shri Ram Janki Baithe Hai Mere Seene Me Dj Song DJ Rohit Mumbai 2023 Ram Navmi Dj</marquee>";

    } else {
        audio.pause();
        playPauseBtn.textContent = '▶';
        document.getElementById('music-title2').innerHTML = "3. Shri Ram Janki...";
    }
}

function togglePlayPause3() {
    var playPauseBtn = document.getElementById('play-pause-btn3');
    isPlaying = !isPlaying;
    var audio = document.getElementById('music3');

    if (isPlaying) {
        audio.play();
        playPauseBtn.textContent = '⏸︎';
        document.getElementById('music-title3').innerHTML = "<marquee>4. Har Ghar Me Ab ek hi naam ek hi Nara gunjega full DJ remix</marquee>";

    } else {
        audio.pause();
        playPauseBtn.textContent = '▶';
        document.getElementById('music-title3').innerHTML = "4. Har Ghar Me Aab Ek ";
    }
}

function togglePlayPause4() {
    var playPauseBtn = document.getElementById('play-pause-btn4');
    var audio = document.getElementById('music4');
    isPlaying = !isPlaying;

    if (isPlaying) {
        audio.play();
        playPauseBtn.textContent = '⏸︎';
        document.getElementById('music-title4').innerHTML = "<marquee>5. य भगव रग Ye Bhagwa Rang DJ Song</marquee>";

    } else {
        audio.pause();
        playPauseBtn.textContent = '▶';
        document.getElementById('music-title4').innerHTML = "5. Ye Bhagwa Rang. ";
    }
}


function togglePlayPause5() {
    var playPauseBtn = document.getElementById('play-pause-btn5');
    var audio = document.getElementById('music5');
    isPlaying = !isPlaying;

    if (isPlaying) {
        audio.play();
        playPauseBtn.textContent = '⏸︎';
        document.getElementById('music-title5').innerHTML = "<marquee>6. Gotilo(PaglaSongs).mp3</marquee>";

    } else {
        audio.pause();
        playPauseBtn.textContent = '▶';
        document.getElementById('music-title5').innerHTML = "6.Khalasi...";
    }
}


function download() {
    // Logic to trigger download
    alert('Downloading...');
}
    </script>
</body>

</html>