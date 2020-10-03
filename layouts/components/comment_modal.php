<div id="comment_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="content">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text_dark">Leave a Comment</h4>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          &times;
        </button>
      </div>
      <form method="POST" action="../backend/create_comment.php">
        <div class="modal-body text-secondary">
          <div class="form-row">
            <div class="col-12 col-sm-6 mb-3">
              <label class="text_dark" for="your_name">Name</label>
              <input
                type="text"
                class="form-control"
                id="your_name"
                aria-describedby="yourNameHelp"
                name="commentator_name"
                placeholder="Enter your name"
                required
              />
              <small id="yourNameHelp" class="form-text text-muted"
                >Please fill up this field</small
              >
            </div>
            <div class="col-12 col-sm-6 mb-3">
              <label class="text_dark" for="your_batch">Batch</label>
              <input
                type="text"
                class="form-control"
                id="your_batch"
                name="commentator_batch"  
                aria-describedby="yourBatchHelp"
                placeholder="Enter your batch"
              />
              <small id="yourBatchHelp" class="form-text text-muted"
                >Please fill up this field</small
              >
            </div>
          </div>
          <div class="form-group">
            <label class="text_dark" for="your_comment">Comment</label>
            <textarea
              class="form-control"
              id="your_comment"
              name="comment"
              rows="4"
              required
            ></textarea>
            <small id="your_comment" class="form-text text-muted"
              >Please fill up this field</small
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
          <button type="submit" class="btn btn-success">Comment</button>
        </div>
      </form>
    </div>
  </div>
</div>