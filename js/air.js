$(document).ready(function () {
  console.log("ok");

  uri = window.location.href;
  e = uri.split("=");
  console.log("URI : ", uri + " Hasilnya : " + e[1]);

  if (e[1] == "user" || e[1] == "user_edit&nik") {
    if (e[1] == "user") {
      $("#summary, #chart, #user_add").hide();
    } else if (e[1] == "user_edit&nik") {
      $("#summary, #chart, #user_list").hide();
      $("#user_add").show();
      $("#user_form input[name='nik'], #user_form input[name='username']" ).prop( "disabled", true );
    }
  }

  $(".datatable-dropdown").append(
    '<button type=button class="btn btn-success float-start me-2"><i class="fa-solid fa-user-plus me-2"></i>Tambah Data</button>'
  );

  $(".datatable-dropdown button").click(function () {
    $("#user_list").hide();
    $("#user_add").show();
  });
});
