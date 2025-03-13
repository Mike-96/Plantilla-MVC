function listUser() {
  // Verifica si ya existe una instancia y destrúyela si es necesario
  if ($.fn.dataTable.isDataTable("#table_user")) {
    tbl_users.destroy(); // Destruye la instancia existente
    $("#table_user").empty(); // Limpia el contenido previo (opcional)
  }

  // Reutiliza la variable global para inicializar la tabla
  tbl_users = $("#table_user").DataTable({
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
    async: false,
    processing: true,
    ajax: {
      url: "controller/users/c_list_users.php", // Cambié la URL para usuarios
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
          return data == "1"
            ? "<span class='badge bg-success'>ACTIVO</span>"
            : "<span class='badge bg-danger'>INACTIVO</span>";
        },
      },
      { data: "last_login" },
      {
        defaultContent: `
          <button type='button' class='btn btn-sm btn-info dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Acciones </button>
          <div class='dropdown-menu'>
            <button class='btnChangeRol dropdown-item' type='button'><i class='fa fa-sync-alt'></i> Cambiar Roles</button>
            <button class='btnActivate dropdown-item' type='button'><i class='far fa-check-circle'></i> Activar</button>
            <button class='btnDeactivate dropdown-item' type='button'><i class='far fa-times-circle'></i> Desactivar</button>
            <button class='btnDelete dropdown-item' type='button'><i class='fas fa-trash-alt'></i> Eliminar</button>
            <button class='btnChangePassword dropdown-item' type='button'><i class='fas fa-key'></i> Cambiar Password</button>
          </div>`,
      },
    ],
    select: true,
    headerCallback: function (thead, data, start, end, display) {
      $(thead).find("th").addClass("text-center");
    },
    fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
      $($(nRow).find("td")[0]).css("text-align", "center");
      $($(nRow).find("td")[5]).css("text-align", "center");
      $($(nRow).find("td")[6]).css("text-align", "center");
      $($(nRow).find("td")[7]).css("text-align", "center");
    },
  });

  // Manejo de numeración de filas
  tbl_users.on("draw.td", function () {
    var PageInfo = tbl_users.page.info();
    tbl_users
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

function listViewStaff() {
  // Verifica si ya existe una instancia y destrúyela si es necesario
  if ($.fn.dataTable.isDataTable("#tblViewStaff")) {
    tblViewUserStaff.destroy(); // Destruye la instancia existente
    $("#tblViewStaff").empty(); // Limpia el contenido previo (opcional)
  }

  // Reutiliza la variable global para inicializar la tabla
  tblViewUserStaff = $("#tblViewStaff").DataTable({
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
    async: false,
    processing: true,
    ajax: {
      url: "controller/users/c_view_staff.php",
      type: "POST",
      error: function (xhr, error, code) {
        console.log("Error: ", error);
      },
    },
    columns: [
      { data: "staff_id" },
      { data: "code_staff" },
      {
        data: null,
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
    headerCallback: function (thead, data, start, end, display) {
      $(thead).find("th").addClass("text-center");
    },
    fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
      $($(nRow).find("td")[0]).css("text-align", "center");
      $($(nRow).find("td")[1]).css("text-align", "center");
      $($(nRow).find("td")[3]).css("text-align", "center");
      $($(nRow).find("td")[4]).css("text-align", "center");
    },
  });

  // Manejo de numeración de filas
  tblViewUserStaff.on("draw.td", function () {
    var PageInfo = tblViewUserStaff.page.info();
    tblViewUserStaff
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
    url: "controller/user_group/c_list_select_group.php",
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
var modalViewStaff = document.getElementById("openFindUserStaff");
modalViewStaff.addEventListener("click", function () {
  $("#modalViewStaff").modal({ backdrop: "static", keyboard: false });
  $("#modalViewStaff").modal("show");
  $("#modalViewStaff").draggable({
    handle: ".modal-header",
  });
});

//function open modal info staff y enviar datos al input personal , usuario y cuenta al agregar usuario
$("#tblViewStaff").off("click", ".btnSelect").on("click", ".btnSelect", function () {
  var data = tblViewUserStaff.row($(this).parents("tr")).data();
  if (tblViewUserStaff.row(this).child.isShown()) {
    data = tblViewUserStaff.row(this).data();
  }

  $("#inputUserIdStaff").val(data.staff_id);
  $("#inputUserStaff").val(data.first_name + " " + data.last_name);
  $("#inputUserName").val(data.first_name + " " + data.last_name);

  var firstInitial = data.first_name.charAt(0);
  var firstWord = data.last_name.split(" ")[0].toLowerCase();
  $("#inputUserAccount").val(firstInitial + firstWord);

  $("#modalViewStaff").modal("hide");
});


//validar input de password y confirmar password
$(document).ready(function () {
  // Función genérica para ver/ocultar contraseña
  function togglePasswordVisibility(toggleId, inputId) {
    if ($(toggleId).length && $(inputId).length) {
      $(toggleId).click(function () {
        var input = $(inputId);
        var icon = $(this).find("i");
        if (input.attr("type") === "password") {
          input.attr("type", "text");
          icon.removeClass("fas fa-eye").addClass("fas fa-eye-slash");
        } else {
          input.attr("type", "password");
          icon.removeClass("fas fa-eye-slash").addClass("fas fa-eye");
        }
      });
    }
  }

  // Función genérica para validar igualdad de contraseñas
  function validatePasswords(input1, input2) {
    if ($(input1).length && $(input2).length) {
      $(input1 + ", " + input2).on("input", function () {
        var password1 = $(input1).val();
        var password2 = $(input2).val();

        if (password1 === "" && password2 === "") {
          $(input1 + ", " + input2).removeClass("is-valid is-invalid");
        } else if (password1 === password2) {
          $(input1 + ", " + input2).removeClass("is-invalid").addClass("is-valid");
        } else {
          $(input1 + ", " + input2).removeClass("is-valid").addClass("is-invalid");
        }
      });
    }
  }

  // Aplicar funcionalidad para campos de creación (si existen)
  togglePasswordVisibility("#togglePassword", "#inputUserPassword");
  togglePasswordVisibility("#togglePassword2", "#inputUserRawPassword");
  validatePasswords("#inputUserPassword", "#inputUserRawPassword");

  // Aplicar funcionalidad para campos de edición (si existen)
  togglePasswordVisibility("#toggleEditPassword", "#inputEditUserPassword");
  togglePasswordVisibility("#toggleEditPassword2", "#inputEditUserRawPassword");
  validatePasswords("#inputEditUserPassword", "#inputEditUserRawPassword");
});


//Crear usuario
var btnCreateUser = document.getElementById("btnCreateUser");
btnCreateUser.addEventListener("click", function () {
  let txtUserStaff = document.getElementById("inputUserIdStaff").value;
  let txtUserName = document.getElementById("inputUserName").value;
  let txtUserAccount = document.getElementById("inputUserAccount").value;
  let txtUserPassword = document.getElementById("inputUserPassword").value;
  let txtUserRawPassword = document.getElementById(
    "inputUserRawPassword"
  ).value;
  let txtUserRol = document.getElementById("selectUserRol").value;
  let txtUserStatus = document.getElementById("selectUserStatus").value;

  // Usamos la ruta generada por Dropzone en el campo oculto
  let photoPath = document.getElementById("userPhotoPath").value;

  // Validar que los campos no estén vacíos (usa trim() para evitar espacios)
  if (
    txtUserStaff.trim() === "" ||
    txtUserName.trim() === "" ||
    txtUserAccount.trim() === "" ||
    txtUserRawPassword.trim() === "" ||
    txtUserPassword.trim() === ""
  ) {
    toastr["error"]("Verifique los campos Vacios", "Error");
    return; // Cortamos la ejecución si hay error
  }

  $.ajax({
    url: "controller/users/c_create_user.php",
    type: "POST",
    data: {
      staff: txtUserStaff,
      userName: txtUserName,
      account: txtUserAccount,
      password: txtUserPassword,
      rawPassword: txtUserRawPassword,
      rol: txtUserRol,
      status: txtUserStatus,
      photo: photoPath,
    },
  }).done(function (resp) {
    if (resp == 1) {
      tbl_users.ajax.reload();
      toastr["success"]("Registro exitosamente", "Éxito");
      clearUserFields();
      $("#addUser .btn.btn-tool[data-card-widget='collapse']").trigger(
        "click"
      );
    } else if (resp == 2) {
      toastr["warning"]("Usuario ya existe o este personal ya tiene un usuario creado.", "Alerta");
    } else if (resp == 0) {
      toastr["error"]("Error de conexión con la base de datos.", "Error");
    }
  });
});

function clearUserFields() {
  // Limpiamos los valores de los campos de entrada
  document.getElementById("inputUserIdStaff").value = "";
  document.getElementById("inputUserStaff").value = "";
  document.getElementById("inputUserName").value = "";
  document.getElementById("inputUserAccount").value = "";
  document.getElementById("inputUserPassword").value = "";
  document.getElementById("inputUserRawPassword").value = "";
  document.getElementById("selectUserRol").value = "";
  document.getElementById("selectUserStatus").value = "";
  document.getElementById("userPhotoPath").value = ""; // Reiniciar el campo de la ruta de la imagen

  // Reiniciamos Dropzone
  Dropzone.forElement("#inputUserImg").removeAllFiles(true); // true = también elimina archivos cargados correctamente
}

var btnCancelarAddUser = document.getElementById("btnCancelCreateUser");
//Function cancel create staff
btnCancelarAddUser.addEventListener("click", function () {
  clearUserFields();
  $("#addUser .btn.btn-tool[data-card-widget='collapse']").trigger("click");
});

//function open modal edit user
$("#table_user").on("click", ".btnChangePassword", function () {
  $("#modalEditPasswordUser").modal({ backdrop: "static", keyboard: false });
  $("#modalEditPasswordUser").modal("show");
  $("#modalEditPasswordUser").draggable({
    handle: ".modal-header",
  });

});

//function open cambio de rol
$("#table_user").on("click", ".btnChangeRol", function () {
  var data = tbl_users.row($(this).parents("tr")).data();
  if (tbl_users.row(this).child.isShown()) {
    //modal responsivo para moviles
    var data = tbl_users.row(this).data();
  }
  $("#modalCambiarRolUser").modal({ backdrop: "static", keyboard: false });
  $("#modalCambiarRolUser").modal("show");
  $("#modalCambiarRolUser").draggable({
    handle: ".modal-header",
  });

});

