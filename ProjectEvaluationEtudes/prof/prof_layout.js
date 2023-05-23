$(document).ready(function() {
    $('#faculty').on('change', function() {
      var faculty_id = $(this).val();
      if(faculty_id != '') {
        $.ajax({
          url: 'gets/get_filieres.php',
          type: 'POST',
          data: {faculty_id: faculty_id},
          success: function(html) {
            $('#filieres').html(html);
          }
        });
      } else {
        $('#filieres').html('<option value="">Select a city</option>');
      }
    });
  });
  