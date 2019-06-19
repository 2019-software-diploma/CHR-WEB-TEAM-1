$(document).ready(function() {
  $('#comment_form').on('submi', function(event) {
    event.preventDefault();
    var form_data = $(this).serialize();
    $.ajax({
      url: 'comment_insert.php',
      method: 'POST',
      data: form_data,
      dataType: 'JSON',
      success: function(data) {
        if (data.error != '') {
          $('#comment_form')[0].reset();
          $('comment_message').html(data.error);
        }
      }
    });
  });
});

$('#commentsModal').on('shown.bs.modal', function() {
  $('#commentsModal').trigger('focus');
});
