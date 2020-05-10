async function songPlayer() {
  let apiResponse = await axios
    .get("https://kuet-radio-server.herokuapp.com/playing")
    .then((response) => {
      return response.data;
    })
    .catch((error) => {
      console.log(error);
    });

  console.log(apiResponse);
}
