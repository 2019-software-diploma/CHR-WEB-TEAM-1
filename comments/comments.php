<div class="modal right fade" id="commentsModal" tabindex="-1" role="dialog" aria-labelledby="commentsModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commentsModal">Comments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" novalidate>
                    <div class="form-group">
                        <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <textarea name="comment_content" id="comment_content"
                            cols="30" rows="4" class="form-control" placeholder="Share your thoughts."></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="submit" class="btn btn-info btn-sm" value="Submit">
                    </div>
                </form>
                <span id="comment_message"></span>
                <div id="display_comment"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="commentsModal">Close</button>
            </div>
        </div>
    </div>
</div>	
