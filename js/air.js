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
      $(
        "#user_form input[name='nik'], #user_form input[name='username'], #user_form input[name='password']"
      ).attr("disabled", true);
      $("#user_form button").val("user_edit");
      $("#user_form").append("<input type=hidden name=nik value=" + e[2] + ">");
    }

    if ($("#alert-user").hasClass("alert-danger")) { // alert
      $("#user_list").hide();
      $("#user_add").show();
    } else if ($("#alert-user").hasClass("#alert-success")) {
      $("#user_list").show();
      $("#user_add").hide();
    }
  } else if (e[1] == "lihat_komplain") {
    $("#summary, #chart, #user_add").hide();
  } else if (e[1] == "lihat_pemakaian") {
    $("#summary, #chart, #user_add").hide();
  } else if (e[1] == "ubah_meter") {
    $("#summary, #chart, #user_add").hide();
  } else {
    $("#summary, #chart, #user_add, #user_list").hide();
  }

  $(".datatable-dropdown").append(
    '<button type=button class="btn btn-success tambah float-start me-2"><i class="fa-solid fa-user-plus me-2"></i>Tambah Data</button>'
  );

  $(".datatable-dropdown button").click(function () {
    $("#user_list").hide();
    $("#user_add").show();
    $("#user_form input,#user_form textarea,#user_form select").val(""); //mereset isi elemen input, textarea & select
    $("#user_form button").val("user_add"); //mereset value elemen button menjadi user_add agar tombol bisa untuk nambah data
    $(
      "#user_form input[name='nik'],#user_form input[name='username'],#user_form input[name='password']"
    ).attr("disabled", false);
  });

  $("button[data-bs-toggle='modal']").click(function () {
    nik = $(this).attr("data-nik");
    $("#myModal .modal-body").text("Yakin hapus data NIK " + nik + "?");
    $(".modal-footer form").append(
      "<input type=hidden name=nik value=" + nik + ">"
    );
  });


});