$(document).ready(function () {
  console.log("ok");
  const test = document.querySelector(".datatable-dropdown label");

  function hideEntries() {
    test.childNodes[2].nodeValue =
      window.innerWidth <= 576 ? "" : " entries per page";
  }

  window.addEventListener("resize", hideEntries);
  window.addEventListener("load", hideEntries);

  uri = window.location.href;
  e = uri.split("=");
  console.log("URI : ", uri + " Hasilnya : " + e[1]);

  if (e[1] == "user" || e[1] == "user_edit&nik") {
    $("#summary, #chart, #tarif_add, #tarif_list, #input_meter_add, #input_meter_list").hide();
    if (e[1] == "user") {
      $("#summary, #chart, #user_add").hide();
    } else {
      $("#summary, #chart, #user_list").hide();
      $("#user_add").show();
      $(
        "#user_form input[name='nik'], #user_form input[name='username'], #user_form input[name='password']"
      ).attr("disabled", true);
      $("#user_form button").val("user_edit");
      $("#user_form").append("<input type=hidden name=nik value=" + e[2] + ">");
    }

    if ($("#alert-user").hasClass("alert-danger")) {
      $("#user_list").hide();
      $("#user_add").show();
    } else if ($("#alert-user").hasClass("alert-success")) {
      $("#user_list").show();
      $("#user_add").hide();
    }

    const datatablesSimple = document.getElementById("datatablesSimple");
    if (datatablesSimple) {
      new simpleDatatables.DataTable(datatablesSimple);
    }

    $(".datatable-dropdown").append(
      '<button type=button class="btn btn-success tambah float-start me-2"><i class="fa-solid fa-user-plus me-2"></i><span class="add_tambah">Tambah Data</span></button>'
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
  } else if (e[1] == "tarif" || e[1] == "tarif_edit&id_tarif") {
    $("#summary, #chart, #user_add, #user_list, #input_meter_list, #input_meter_add").hide();
    if (e[1] == "tarif") {
      $("#tarif_add").hide();
      $("#tarif_list").show();
    } else {
      $("#summary, #chart, #tarif_list").hide();
      $("#tarif_add").show();
      $(
        "#tarif_form input[name='id_tarif']"
      ).attr("disabled", true);
      $("#tarif_form button").val("tarif_edit");
      $("#tarif_form").append(
        "<input type=hidden name=id_tarif value=" + e[2] + ">"
      );
    }

    if ($("#alert-tarif").hasClass("alert-danger")) {
      $("#tarif_list").hide();
      $("#tarif_add").show();
    } else if ($("#alert-tarif").hasClass("alert-success")) {
      $("#tarif_list").show();
      $("#tarif_add").hide();
    }

    const datatablesSimple = document.getElementById("tarif-table");
    if (datatablesSimple) {
      new simpleDatatables.DataTable(datatablesSimple);
    }

    $(".datatable-dropdown").append(
      '<button type=button class="btn btn-success tambah float-start me-2"><i class="fa-solid fa-user-plus me-2"></i><span class="add_tambah">Tambah Tarif</span></button>'
    );

    $(".datatable-dropdown button").click(function () {
      $("#tarif_list").hide();
      $("#tarif_add").show();
      $("#tarif_form input[type='text'], #tarif_form input[type='number'], #tarif_form select").val(""); // Mereset nilai input dan select menjadi kosong
      $("#tarif_form input[type='radio']").prop("checked", false);
      // $("#tarif_form input #tarif, #tarif_form input #id_tarif, #tarif_form select").val(""); //mereset isi elemen input, textarea & select
      $("#tarif_form button").val("tarif_add"); //mereset value elemen button menjadi user_add agar tombol bisa untuk nambah data
      $(
        "#tarif_form input[name='id_tarif']   "
      ).attr("disabled", false);
    });

    $("button[data-bs-toggle='modal']").click(function () {
      id_tarif = $(this).attr("data-id_tarif");
      $("#myModal .modal-body").text("Yakin hapus data ID Tarif " + id_tarif + "?");
      $(".modal-footer form").append(
        "<input type=hidden name=id_tarif value=" + id_tarif + ">"
      );
      $(".modal-footer button").val("tarif_hapus")
      $("#tarif_form input, #tarif_form select").val(""); //mereset isi elemen input, textarea & select
    });
  } else if (e[1] == "input_meter" || e[1] == "input_meter_edit&no") {
    $("#summary, #chart, #user_add, #user_list, #tarif_add, #tarif_list").hide();
    if (e[1] == "input_meter") {
      $("#input_meter_add").hide();
      $("#input_meter_list").show();
    } else {
      $("#summary, #chart, #input_meter_list").hide();
      $("#input_meter_add").show();
      // $(
      //   "#input_meter_form input[name='id_tarif']"
      // ).attr("disabled", true);
      $("#input_meter_form button").val("input_meter_edit");
      $("#input_meter_form").append(
        "<input type=hidden name=no value=" + e[2] + ">"
      );
    }

    if ($("#alert-input_meter").hasClass("alert-danger")) {
      $("#input_meter_list").hide();
      $("#input_meter_add").show();
    } else if ($("#alert-input_meter").hasClass("alert-success")) {
      $("#input_meter_list").show();
      $("#input_meter_add").hide();
    }

    const datatablesSimple = document.getElementById("input_meter-table");
    if (datatablesSimple) {
      new simpleDatatables.DataTable(datatablesSimple);
    }

    $(".datatable-dropdown").append(
      '<button type=button class="btn btn-success tambah float-start me-2"><i class="fa-solid fa-user-plus me-2"></i><span class="add_tambah">Input Meter</span></button>'
    );

    $(".datatable-dropdown button").click(function () {
      $("#input_meter_list").hide();
      $("#input_meter_add").show();
      $("#input_meter_form input[type='date'], #input_meter_form input[type='number'], #input_meter_form input[type='time'], #input_meter_form select").val(""); // Mereset nilai input dan select menjadi kosong
      // $("#tarif_form input[type='radio']").prop("checked", false);
      // $("#tarif_form input #tarif, #tarif_form input #id_tarif, #tarif_form select").val(""); //mereset isi elemen input, textarea & select
      $("#input_meter_form button").val("input_meter_add"); //mereset value elemen button menjadi user_add agar tombol bisa untuk nambah data
      $(
        "#input_meter_form input[name='no']   "
      ).attr("disabled", false);
    });

    $("button[data-bs-toggle='modal']").click(function () {
      no = $(this).attr("data-no");
      $("#myModal .modal-body").text("Yakin hapus data Meter " + no + "?");
      $(".modal-footer form").append(
        "<input type=hidden name=no value=" + no + ">"
      );
      $(".modal-footer button").val("input_meter_hapus")
      // $("#input_meter_form input, #input_meter select").val(""); //mereset isi elemen input, textarea & select
    });
  } else if (e[1] == "lihat_komplain") {
    $("#summary, #chart, #user_add").hide();
  } else if (e[1] == "lihat_pemakaian") {
    $("#summary, #chart, #user_add").hide();
  } else if (e[1] == "ubah_meter") {
    $("#summary, #chart, #user_add").hide();
  } else {
    $("#user_add, #user_list, #tarif_add, #tarif_list, #input_meter_add, #input_meter_list").hide();
  }
});
