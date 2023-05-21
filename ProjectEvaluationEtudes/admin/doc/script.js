$(document).ready(function () {
  $("#btncheck").click(function () {
    $(".subject").prop("checked", $(this).prop("checked"));
  });
  $("#btncheck1").change(function () {
    $(".questioncheck").prop("checked", $(this).prop("checked"));
  });

  // Charger les options de la branche en fonction de la faculté sélectionnée
  $("#faculty").change(function () {
    var faculty = $(this).val();
    console.log(faculty);
    if (faculty != "") {
      $("#branch").prop("disabled", false);
      $("#branch").empty();
      $.ajax({
        url: "../doc/Gets/get_branches.php",
        type: "POST",
        data: {
          faculty: faculty,
        },
        success: function (data) {
          $("#branch").append(data);
          $("#level").prop("disabled", true);
          $("#level").html("<option value=''>Select Branch first</option>");
          $("#subject-checkboxes").html("");
        },
      });
    } else {
      $("#branch").prop("disabled", true);
      $("#level").prop("disabled", true);
      $("#level").html("<option value=''>Select Branch first</option>");
      $("#subject-checkboxes").html("");
    }
  });

  // Charger les options du niveau en fonction de la branche sélectionnée
  $("#branch").change(function () {
    var branch = $(this).val();
    console.log(branch);
    if (branch != "") {
      $("#level").prop("disabled", false);
      $("#level").empty();
      $.ajax({
        url: "../doc/Gets/get_levels.php",
        type: "POST",
        data: {
          branch: branch,
        },
        success: function (data) {
          $("#level").append(data);
          $("#subject-checkboxes").html("");
          $("#submit-btn").hide();
        },
      });
    } else {
      $("#level").prop("disabled", true);
      $("#level").html("<option value=''>Select Branch first</option>");
      $("#subject-checkboxes").html("");
    }
  });

  // Charger les options des matières en fonction du niveau et du semestre sélectionnés
  $("#level, #semestre").change(function () {
    var level = $("#level").val();

    var semestre = $("#semestre input:checked").val();

    console.log(level);
    console.log(semestre);

    $("#subject-checkboxes").empty();
    $.ajax({
      url: "../doc/Gets/get_subjects.php",
      method: "POST",
      data: {
        level: level,
        semestre: semestre,
      },
      dataType: "json",
      success: function (data) {
        var subject_html = "";
        $.each(data, function (index, value) {
          subject_html += "<div class='form-check'>";
          subject_html +=
            "<input class='form-check-input subject' type='checkbox' name='subject' value='" +
            value.id_subject +
            "'>";
          subject_html +=
            "<label class='form-check-label' for='subject'>" +
            value.subject_name +
            "</label>";
          subject_html += "</div>";
        });
        $("#subject-checkboxes").append(subject_html);
        var selectedSubjects = [];
        $(document).on("change", "input[name='subject']", function () {
          if (this.checked) {
            selectedSubjects.push($(this).val());
          } else {
            selectedSubjects.splice(
              $.inArray($(this).val(), selectedSubjects),
              1
            );
          }
          console.log(selectedSubjects);
        });
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText);
      },
    });
  });
});
