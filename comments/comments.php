<form action="" method="post">
    <div class="form-group">
        <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter your name">
    </div>
    <div class="form-group">
        <textarea name="comment_content" id="comment_content" cols="30" rows="10" class="form-control" placeholder="Comment" rows="5"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="submit" id="submit" class="btn btn-info" value="Submit">
    </div>
</form>
<span id="comment_message"></span>
<br>
<div id="display_comment"></div>

<script>
    $(document).ready(function(){
        $('#comment_form').on('submit', function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url:"comment_insert.php",
                method:"POST",
                data:form_data,
                dataType:"JSON",
                success:function(data){
                    if(data.error != ''){
                        $('#comment_form')[0].reset();
                        $('comment_message').html(data.error);
                    }
                }
            })
        });
    });
</script>