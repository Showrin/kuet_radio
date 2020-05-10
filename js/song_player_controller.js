let playForFirstTime = true;

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

  $("#song-player-2").prop(
    "src",
    `${relativeSongFolderPath}${songlist[getSongIndex()].song_url}`
  );

  $("#song-player-1").on("ended", function () {
    $("#song-player-1").prop(
      "src",
      `${relativeSongFolderPath}${songlist[getSongIndex()].song_url}`
    );
    $("#song-player-1")[0].pause();
    $("#song-player-1")[0].load();
    $("#song-player-2")[0].play();
  });

  $("#song-player-2").on("ended", function () {
    $("#song-player-2").prop(
      "src",
      `${relativeSongFolderPath}${songlist[getSongIndex()].song_url}`
    );
    $("#song-player-2")[0].pause();
    $("#song-player-2")[0].load();
    $("#song-player-1")[0].play();
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
