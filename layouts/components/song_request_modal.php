<div id="request_a_song_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="content">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text_dark">Request a Song</h4>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          &times;
        </button>
      </div>
      <form id="request_a_song_form" method="POST" action="../backend/create_song_request.php">
        <div class="modal-body text-secondary">
          <div class="form-group">
            <label class="text_dark" for="song_name">Song Name</label>
            <input
              type="text"
              class="form-control"
              id="song_name"
              aria-describedby="songNameHelp"
              placeholder="Enter song name"
              name="song_name"
              required
            />
            <small id="songNameHelp" class="form-text text-muted"
              ></small
            >
          </div>
          <div class="form-group">
            <label class="text_dark" for="singer_name"
              >Singer Name <small><em>(Optional)</em></small></label
            >
            <input
              type="text"
              class="form-control"
              id="singer_name"
              aria-describedby="singerNameHelp"
              placeholder="Enter singer name"
              name="singer_name"
            />
            <small id="singerNameHelp" class="form-text text-muted"
              ></small
            >
          </div>
          <div class="form-group">
            <label class="text_dark" for="song_url"
              >Song Link/URL <small><em>(Optional)</em></small></label
            >
            <input
              type="text"
              class="form-control"
              id="song_url"
              aria-describedby="songURLHelp"
              placeholder="Enter song URL"
              name="song_url"
            />
            <small id="songURLHelp" class="form-text text-muted"
              ></small
            >
          </div>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-dismiss="modal"
          >
            Close
          </button>
          <button id="request_a_song_form_submit_btn" type="submit" class="btn btn-success">Send Request</button>
        </div>
      </form>
    </div>
  </div>
</div>