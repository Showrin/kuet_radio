let playForFirstTime = true;
let wasPlaying = $("#song-player-1")[0];

async function songPlayer(relativeSongFolderPath) {
  let { playingSong, songlist } = await axios
    .get("https://kuet-radio-server.herokuapp.com/playing")
    .then((response) => {
      return response.data;
    })
    .catch((error) => {
      console.log(error);
    });

  let indexOfwhichSongToLoad = playingSong.songIndex;

  console.log(playingSong, songlist);

  $("#song-player-1").prop(
    "src",
    `${relativeSongFolderPath}${playingSong.song_url}`
  );
  $("#song-player-1").prop("currentTime", `${playingSong.played / 1000}`);
  $("#song-player-1").attr("data-name", `${playingSong.name}`);
  $("#song-player-1").attr("data-singer", `${playingSong.singer}`);
  $("#playing_title").text(`${$("#song-player-1").attr("data-name")}`);
  $("#playing_author").text(`${$("#song-player-1").attr("data-singer")}`);

  {
    let index = getSongIndex();
    $("#song-player-2").prop(
      "src",
      `${relativeSongFolderPath}${songlist[index].song_url}`
    );
    $("#song-player-2").attr("data-name", `${songlist[index].name}`);
    $("#song-player-2").attr("data-singer", `${songlist[index].singer}`);
  }

  $("#song-player-1").on("ended", function () {
    let index = getSongIndex();
    $("#song-player-1")[0].pause();
    $("#song-player-1").prop(
      "src",
      `${relativeSongFolderPath}${songlist[index].song_url}`
    );
    $("#song-player-1").attr("data-name", `${songlist[index].name}`);
    $("#song-player-1").attr("data-singer", `${songlist[index].singer}`);
    $("#song-player-1")[0].load();
    $("#song-player-2")[0].play();
    $("#playing_title").text(`${$("#song-player-2").attr("data-name")}`);
    $("#playing_author").text(`${$("#song-player-2").attr("data-singer")}`);
  });

  $("#song-player-2").on("ended", function () {
    let index = getSongIndex();
    $("#song-player-2")[0].pause();
    $("#song-player-2").prop(
      "src",
      `${relativeSongFolderPath}${songlist[index].song_url}`
    );
    $("#song-player-2").attr("data-name", `${songlist[index].name}`);
    $("#song-player-2").attr("data-singer", `${songlist[index].singer}`);
    $("#song-player-2")[0].load();
    $("#song-player-1")[0].play();
    $("#playing_title").text(`${$("#song-player-1").attr("data-name")}`);
    $("#playing_author").text(`${$("#song-player-1").attr("data-singer")}`);
  });

  function getSongIndex() {
    if (indexOfwhichSongToLoad === songlist.length - 1)
      indexOfwhichSongToLoad = 0;
    else ++indexOfwhichSongToLoad;

    return indexOfwhichSongToLoad;
  }
}

function startMusicPlayer(folderPath) {
  $("#song-player-1").on("play", function () {
    if (playForFirstTime) {
      playForFirstTime = false;
      songPlayer(folderPath);
    }
  });
}

function musicPlayerPause() {
  if ($("#song-player-1")[0].paused) {
    $("#song-player-2")[0].pause();
    wasPlaying = $("#song-player-2")[0];
  } else {
    $("#song-player-1")[0].pause();
    wasPlaying = $("#song-player-1")[0];
  }
}

function musicPlayerPlay() {
  wasPlaying.play();
}
