const wrapper = document.querySelector(".wrapper"),
mainList = document.querySelector(".music-list")
musicImg = wrapper.querySelector(".img-area img"),
musicName = wrapper.querySelector(".song-details .name"),
musicArtist = wrapper.querySelector(".song-details .artist"),
mainAudio = wrapper.querySelector("#main-audio"),
mainAudioId = wrapper.querySelector("#songid");
playPauseBtn = wrapper.querySelector(".play-pause"),
prevBtn = wrapper.querySelector("#prev"),
nextBtn = wrapper.querySelector("#next"),
progressArea = wrapper.querySelector(".progress-area"),
progressBar = wrapper.querySelector(".progress-bar"),
favTick = wrapper.querySelector(".favorite");

let musicIndex = 1;

window.addEventListener("load", ()=>{
    loadMusic(musicIndex);
    playingNow();
})

function loadMusic(indexNumb){
    musicName.innerText = allMusic[indexNumb - 1].sname;
    musicArtist.innerText = allMusic[indexNumb - 1].sartist;
    musicImg.src = `image/${allMusic[indexNumb -1].simage}.jpg`;
    mainAudioId.value = `${allMusic[indexNumb -1].sid}`;
    mainAudio.src = `Tracks/${allMusic[indexNumb -1].ssong}.mp3`;
}

//play
function playMusic(){
    wrapper.classList.add("paused");
    playPauseBtn.querySelector("i").innerText = "pause";
    mainAudio.play();
}

//pause
function pausedMusic(){
    wrapper.classList.remove("paused");
    playPauseBtn.querySelector("i").innerText = "play_arrow";
    mainAudio.pause();
}

//next song
function nextSong(){
    musicIndex++;
    musicIndex > allMusic.length ? musicIndex = 1 : musicIndex = musicIndex;
    loadMusic(musicIndex);
    playMusic();
}

//previous song
function prevSong(){
    musicIndex--;
    musicIndex < 1 ? musicIndex = allMusic.length : musicIndex = musicIndex;
    loadMusic(musicIndex);
    playMusic();
}

function musicFav(){
    wrapper.classList.add("like");
    favTick.querySelector("i").innerText = "favorite";
}
function musicNFav(){
    wrapper.classList.remove("like");
    favTick.querySelector("i").innerText = "favorite_border";
}

favTick.addEventListener("click", ()=>{
    const favoritTicked = wrapper.classList.contains("like");
    favoritTicked ? musicNFav() : musicFav();
});

playPauseBtn.addEventListener("click", ()=>{
    const isMusicPaused = wrapper.classList.contains("paused");
    isMusicPaused ? pausedMusic() : playMusic();
});

$(window).keypress(function(e) {
    if (e.which == 32) {
        const isMusicPaused = wrapper.classList.contains("paused");
        isMusicPaused ? pausedMusic() : playMusic();
        e.preventDefault();
}});
  

//next button
nextBtn.addEventListener("click", ()=>{
    nextSong(); //calling next song function
    playingNow();
});

//previous button
prevBtn.addEventListener("click", ()=>{
    prevSong(); //calling previous song function
    playingNow();
});

//progress bar
mainAudio.addEventListener("timeupdate", (e)=>{
    console.log(e);
    const currentTime = e.target.currentTime; // getting current time
    const duration = e.target.duration; // getting total song duration
    let progressWidth = (currentTime / duration) *100;
    progressBar.style.width = `${progressWidth}%`;

    let musicCurrentTime = wrapper.querySelector(".current"),
    musicDuration = wrapper.querySelector(".duration");


    mainAudio.addEventListener("loadeddata", ()=>{
       //total song duration updating
       let songduration = mainAudio.duration;
       let totalminutes = Math.floor(songduration / 60);
       let totalseconds = Math.floor(songduration % 60);
       if(totalseconds < 10)
       {
           totalseconds =`0${totalseconds}`;
       }
       musicDuration.innerText = `${totalminutes}:${totalseconds}`;
    });

        //current song timing updating
        let currminutes = Math.floor(currentTime / 60);
        let currseconds = Math.floor(currentTime % 60);
        if(currseconds < 10)
        {
            currseconds =`0${currseconds}`;
        }
        musicCurrentTime.innerText = `${currminutes}:${currseconds}`;
});

progressArea.addEventListener("click", (e)=>{
    let progressWidthvalue = progressArea.clientWidth; //getting width og progress-bar
    let clickedOffSetX = e.offsetX; //get offset x value
    let songDuration = mainAudio.duration;

    mainAudio.currentTime = (clickedOffSetX / progressWidthvalue) * songDuration;
    playMusic();
});

//repeat, shuffel
const repeatBtn = wrapper.querySelector("#repeat-plist");
repeatBtn.addEventListener("click", ()=>{
    let getText =repeatBtn.innerText;

    switch(getText){
        case "repeat":
            repeatBtn.innerText = "repeat_one";
            repeatBtn.setAttribute("title","Song looped");
            break;
        case "repeat_one":
            repeatBtn.innerText = "shuffle";
            repeatBtn.setAttribute("title","Playback shuffle");
            break;
        case "shuffle":
            repeatBtn.innerText = "repeat";
            repeatBtn.setAttribute("title","Playlist looped");
            break;
    }
});

mainAudio.addEventListener("ended", ()=>{
    let getText = repeatBtn.innerText;

    switch(getText){
        case "repeat":
            nextSong();
            playingNow();
            break;
        case "repeat_one":
            mainAudio.currentTime = 0;
            loadMusic(musicIndex);
            playMusic();
            playingNow();
            break;
        case "shuffle":
            if(allMusic.length > 1){
                let randomIndex = Math.floor((Math.random() * allMusic.length) + 1);
                do{
                    randomIndex = Math.floor((Math.random() * allMusic.length) + 1);
                }while(musicIndex == randomIndex);
                musicIndex = randomIndex;
                loadMusic(musicIndex);
                playMusic();
                playingNow();
                break;
            }
    }
})

const ulTag = mainList.querySelector("ul");

for (let i = 0; i < allMusic.length; i++) {
    let liTag = `<li li-index="${i + 1}">
                <div class="c-row">
                <span>${allMusic[i].sname}</span>
                <p>${allMusic[i].sartist}</p>
                </div>
                <audio class="${allMusic[i].ssong}" src="Tracks/${allMusic[i].ssong}.mp3"></audio>
                <span id="${allMusic[i].ssong}" class="audio-duration">3:40</span>
            </li>`;
            ulTag.insertAdjacentHTML("beforeend",liTag);

            let liAudioTagDuration = ulTag.querySelector(`#${allMusic[i].ssong}`);
            let liAudioTag = ulTag.querySelector(`.${allMusic[i].ssong}`);

            liAudioTag.addEventListener("loadeddata", ()=>{
                let songduration = liAudioTag.duration;
                let totalminutes = Math.floor(songduration / 60);
                let totalseconds = Math.floor(songduration % 60);
                if(totalseconds < 10)
                {
                    totalseconds =`0${totalseconds}`;
                }
                liAudioTagDuration.innerText = `${totalminutes}:${totalseconds}`;
                liAudioTagDuration.setAttribute("t-duration", `${totalminutes}:${totalseconds}`);
            });
}


//play from list on click

const allLiTags = ulTag.querySelectorAll("li");
function playingNow(){
    for (let j = 0; j < allLiTags.length; j++) {

        let audioTag = allLiTags[j].querySelector(".audio-duration");

        allLiTags[j].classList.add("playing");
        audioTag.innerText = "Playing...";
        if(allLiTags[j].classList.contains("playing")) {
            allLiTags[j].classList.remove("playing");
            let adDuration = audioTag.getAttribute("t-duration");
            audioTag.innerText = adDuration;
        }

        if(allLiTags[j].getAttribute("li-index") == musicIndex) {
            allLiTags[j].classList.add("playing");
            audioTag.innerText = "Playing...";
        }
    
        allLiTags[j].setAttribute("onclick", "clicked(this)");
    }
}

function clicked(element){ 
    let getLiIndex = element.getAttribute("li-index");
    musicIndex = getLiIndex;
    loadMusic(musicIndex);
    playMusic();
    playingNow();
}