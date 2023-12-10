
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
        document.getElementById('music-title').innerHTML = "<marquee>1. Hanuman Chalisa</marquee>";

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
        document.getElementById('music-title5').innerHTML = "<marquee>6. Vardaan - Carryminati X Wily Frenzy</marquee>";

    } else {
        audio.pause();
        playPauseBtn.textContent = '▶';
        document.getElementById('music-title5').innerHTML = "6. Vardaan - Carry...";
    }
}

function togglePlayPause() {
    var playPauseBtn = document.getElementById('play-pause-btn');
    isPlaying = !isPlaying;

    if (isPlaying) {
        audio.play();
        playPauseBtn.textContent = '⏸︎';
        document.getElementById('music-title').innerHTML = "<marquee>1. Hanuman Chalisa</marquee>";

    } else {
        audio.pause();
        playPauseBtn.textContent = '▶';
        document.getElementById('music-title').innerHTML = "1. Hanuman Chalisa";
    }
}

function download() {
    // Logic to trigger download
    alert('Downloading...');
}