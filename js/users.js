var tbl_users;
function listUser() {
  tbl_users = $("#table_user").DataTable({
    // buttons:['copy','csv','excel','pdf','print'],
    ordering: true,
    bLengthChange: true,
    responsive: true,
    searching: { regex: false },
    dom: "fltip",
    lengthMenu: [
      [2, 5, 10, 25, 50, 100, -1],
      [2, 5, 10, 25, 50, 100, "All"],
    ],
    pageLength: 10,
    destroy: true,
    async: false,
    processing: true,
    ajax: {
      url: "controller/users/c_list_users.php",
      type: "POST",
      error: function (xhr, error, code) {
        console.log("Error: ", error);
      },
    },
    columns: [
      { data: "user_id" },
      { data: "user_name" },
      { data: "email" },
      { data: "group_name" },
      { data: "data_staff" },
      {
        data: "id_status",
        render: function (data) {
          return data == "1" ? "<span class='badge bg-success'>ACTIVO</span>" : "<span class='badge bg-danger'>INACTIVO</span>";
        },
      },
      { data: "last_login" },
      {
        defaultContent: `
          <button type='button' class='btn btn-sm btn-info dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Acciones </button>
          <div class='dropdown-menu'>
            <button class='btnEdit dropdown-item' type='button'><i class='fa fa-edit'></i> Editar</button>
            <button class='btnActivate dropdown-item' type='button'><i class='far fa-check-circle'></i> Activar</button>
            <button class='btnDeactivate dropdown-item' type='button'><i class='far fa-times-circle'></i> Desactivar</button>
            <button class='btnDelete dropdown-item' type='button'><i class='fas fa-trash-alt'></i> Eliminar</button>
            <button class='btnChangePassword dropdown-item' type='button'><i class='fas fa-key'></i> Cambiar Password</button>
          </div>`,
      },
    ],
    select: true,
    // Otras opciones...
    headerCallback: function (thead, data, start, end, display) {
      $(thead).find('th').addClass('text-center');
    },
    fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
      $($(nRow).find("td")[0]).css('text-align', 'center');
      $($(nRow).find("td")[1]).css('text-align', 'center');
      $($(nRow).find("td")[3]).css('text-align', 'center');
      $($(nRow).find("td")[4]).css('text-align', 'center');
      $($(nRow).find("td")[5]).css('text-align', 'center');
      $($(nRow).find("td")[6]).css('text-align', 'center');
      $($(nRow).find("td")[7]).css('text-align', 'center');
    },
  });

  tbl_users.on("draw.td", function () {
    var PageInfo = $("#table_user").DataTable().page.info();
    tbl_users
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

let tblStaff
function listStaff() {
  tblStaff = $("#tblViewStaff").DataTable({
    // buttons:['copy','csv','excel','pdf','print'],
    ordering: true,
    bLengthChange: true,
    responsive: true,
    searching: { regex: false },
    dom: "fltip",
    lengthMenu: [
      [2, 5, 10, 25, 50, 100, -1],
      [2, 5, 10, 25, 50, 100, "All"],
    ],
    pageLength: 10,
    destroy: true,
    async: false,
    processing: true,
    ajax: {
      url: "controller/staff/c_list_staff.php",
      type: "POST",
      error: function (xhr, error, code) {
        console.log("Error: ", error);
      },
    },
    columns: [
      { data: "staff_id" },
      { data: "code_staff" },
      {
        data: null, // Combina `staff_name` y `last_name` en una sola columna
        render: function (data) {
          return `${data.first_name} ${data.last_name}`;
        },
      },
      { data: "group_name" },
      { 
        defaultContent:
          "<button type='button' class='btnSelect btn btn-sm bg-warning'><i class='fas fa-paper-plane'></i></button>",
        },
    ],
    select: true,
    // Otras opciones...
    headerCallback: function (thead, data, start, end, display) {
      $(thead).find('th').addClass('text-center');
    },
    fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
      $($(nRow).find("td")[0]).css('text-align', 'center');
      $($(nRow).find("td")[1]).css('text-align', 'center');
      $($(nRow).find("td")[3]).css('text-align', 'center');
      $($(nRow).find("td")[4]).css('text-align', 'center');
    },
  });

  tblStaff.on("draw.td", function () {
    var PageInfo = $("#tblViewStaff").DataTable().page.info();
    tblStaff
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

//listar combo box list group + estatus
function listComboBox() {
  $.ajax({
    url: "controller/user_group/c_list_users_group.php",
    type: "POST",
  }).done(function (resp) {
    var data = JSON.parse(resp);
    // Verifica que data.data sea un array
    if (data.data.length > 0) {
      var options = "";
      for (var i = 0; i < data.data.length; i++) {
        options +=
          "<option value='" +
          data.data[i].group_id +
          "'>" +
          data.data[i].group_name +
          "</option>";
      }
      $("#selectUserRol").html(options);
      //$("#selectEditGroup").html(options);

      // Inicializar selectDepartment con los departamentos del primer país
      let status = ["", "Activo", "Inactivo"];
      let statusOptions = "";
      for (let i = 1; i < status.length; i++) {
        statusOptions += "<option value='" + i + "'>" + status[i] + "</option>";
      }
      $("#selectUserStatus").html(statusOptions);
      //$("#selectEditStatus").html(statusOptions);
    } else {
      $("#selectUserRol").html("<option value=''>No records found</option>");
      $("#selectUserStatus").html("<option value=''>No records found</option>");
    }
  });
}

//Function open modal Staff
let modalViewStaff = document.getElementById('openFindUserStaff');
modalViewStaff.addEventListener("click", function () {
  $("#modalViewStaff").modal({ backdrop: "static", keyboard: false });
  $("#modalViewStaff").modal("show");
  $("#modalViewStaff").draggable({
    handle: ".modal-header",
  });
 
});

//function open modal info staff y enviar datos al input personal , usuario y cuenta
$("#tblViewStaff").on("click", ".btnSelect", function () {
  var data = tblStaff.row($(this).parents("tr")).data();
  if (tblStaff.row(this).child.isShown()) {
    //modal responsivo para moviles
    var data = tblStaff.row(this).data();
  }

  $("#inputUserIdStaff").val(data.staff_id);
  $("#inputUserStaff").val(data.first_name + " " + data.last_name);
  $("#inputUserName").val(data.first_name + " " + data.last_name);

  $("#modalViewStaff").modal("hide");

});