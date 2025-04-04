var tbl_users_group;
function ListUserGroup() {
  tbl_users_group = $("#list_group").DataTable({
    //buttons:['copy','csv','excel','pdf','print'],
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
      url: "controller/user_group/c_list_users_group.php",
      type: "POST",
    },
    columns: [
      { data: "group_id" },
      { data: "group_name" },
      { data: "slug" },
      {
        data: "status",
        render: function (data, type, row) {
          if (data == "1") {
            return "<span class='badge bg-success'>ACTIVO</span>";
          } else {
            return "<span class='badge bg-danger'>INACTIVO</span>";
          }
        },
      },
      { data: "created_at" },
      { data: "updated_at" },
      {
        defaultContent:
      "<button type='button' class='btn btn-sm btn-info dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Acciones </button>" +
      "<div class='dropdown-menu'>" +
      "<button class='btnEdit dropdown-item' type='button'><i class='fa fa-edit'></i> Editar</button>" +
      "<button class='btnActivate dropdown-item' type='button'><i class='far fa-check-circle'></i> Activar</button>" +
      "<button class='btnDesactivate dropdown-item' type='button'><i class='far fa-times-circle'></i> Desactivar</button>" +
      "<button class='btnPermissions dropdown-item' type='button'><i class='fas fa-code-branch'></i> Permisos</button>" +
      "<button class='btnDelet dropdown-item' type='button'><i class='fas fa-trash-alt'></i> Eliminar</button>" +
      "</div>",
      },
    ],
    language: {
      emptyTable: "No hay datos disponibles en la tabla",
      zeroRecords: "No se encontraron resultados coincidentes",
      info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
      infoEmpty: "Mostrando 0 a 0 de 0 registros",
      infoFiltered: "(filtrado de _MAX_ registros totales)",
      lengthMenu: "Mostrar _MENU_ registros por página",
      loadingRecords: "Cargando...",
      processing: "Procesando...",
      search: "Buscar:",
      paginate: {
        first: "Primero",
        last: "Último",
        next: "Siguiente",
        previous: "Anterior",
      },
    },

    select: false,
    // Otras opciones...
    headerCallback: function (thead, data, start, end, display) {
      $(thead).find("th").addClass("text-center");
    },
    fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
      $($(nRow).find("td")[0]).css("text-align", "center");
      $($(nRow).find("td")[3]).css("text-align", "center");
      $($(nRow).find("td")[4]).css("text-align", "center");
      $($(nRow).find("td")[5]).css("text-align", "center");
      $($(nRow).find("td")[6]).css("text-align", "center");
    },
  });

  tbl_users_group.on("draw.td", function () {
    var PageInfo = $("#list_group").DataTable().page.info();
    tbl_users_group
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

//selection id button / inputs
var btn_CreateGroup = document.getElementById("btnCreateRoleGroup");
var btn_Cancel = document.getElementById("btnCancelCreateGroup");
var btn_EditGroup = document.getElementById("btnEditCreateRoleGroup");

//Function add group
btn_CreateGroup.addEventListener("click", function () {
  let txtGroupName = document.getElementById("inputGroupName").value; //selection input value
  let txtSlug = document.getElementById("inputSlug").value;
  let txtStatus = document.getElementById("selectStatus").value;

  if (txtGroupName == 0) {
    //if input name empty, the operation does not proceed
    toastr["error"]("EL NOMBRE DEL GRUPO ESTA VACIO", "Error");
  } else {
    $.ajax({
      url: "controller/user_group/c_create_group.php",
      type: "POST",
      data: {
        groupName: txtGroupName,
        slug: txtSlug,
        status: txtStatus,
      },
    }).done(function (resp) {
      if (resp == 1) {
        //if 1 , insert table of database
        tbl_users_group.ajax.reload();
        cleanCreateGroup();
        toastr["success"]("GRUPO REGISTRADO EXITOSAMENTE", "Success");
        $("#add .btn.btn-tool[data-card-widget='collapse']").trigger("click");
      } else if (resp == 2) {
        //if 2, not insert, register is al ready register
        toastr["warning"]("EL GRUPO YA ESTA REGISTRADO", "Warning");
      } else if (resp == 0) {
        //if 0, error connexion database
        toastr["error"](
          "An error has occurred, please check your connection",
          "Error"
        );
      }
    });
  }
});

//Function cancel create group
btn_Cancel.addEventListener("click", function () {
  document.getElementById("inputGroupName").value = "";
  document.getElementById("inputSlug").value = "";
  $("#add .btn.btn-tool[data-card-widget='collapse']").trigger("click");
});

//configuration notification toastr
toastr.options = {
  closeButton: true,
  debug: false,
  newestOnTop: false,
  progressBar: true,
  positionClass: "toast-bottom-left",
  preventDuplicates: true,
  onclick: null,
  showDuration: "500",
  hideDuration: "1000",
  timeOut: "3000",
  extendedTimeOut: "1000",
  showEasing: "swing",
  hideEasing: "linear",
  showMethod: "fadeIn",
  hideMethod: "fadeOut",
};
//auto complete inputSlug
function renameSlug() {
  let Group = document.getElementById("inputGroupName").value;
  //does update in inputSlug
  document.getElementById("inputSlug").value = Group;
}
//auto complete inputSlugEdit
function renameSlugEdit() {
  let Group = document.getElementById("inputEditGroupName").value;
  //does update in inputEditSlug
  document.getElementById("inputEditSlug").value = Group;
}
//cleaning input create group
function cleanCreateGroup() {
  document.getElementById("inputGroupName").value = "";
  document.getElementById("inputSlug").value = "";
}

//function open modal edit group
$("#list_group").on("click", ".btnEdit", function () {
  var data = tbl_users_group.row($(this).parents("tr")).data();
  if (tbl_users_group.row(this).child.isShown()) {
    //modal responsivo para moviles
    var data = tbl_users_group.row(this).data();
  }
  $("#modalEditGroup").modal({ backdrop: "static", keyboard: false });
  $("#modalEditGroup").modal("show");
  $("#modalEditGroup").draggable({
    handle: ".modal-header" // Puedes arrastrar el modal desde la cabecera
  });

  $("#inputIdGroup").val(data.group_id);
  $("#inputEditGroupName").val(data.group_name);
  $("#inputEditSlug").val(data.slug);
});

//Function update group
btn_EditGroup.addEventListener("click", function () {
  let txtGroupName = document.getElementById("inputEditGroupName").value; //selection input value
  let txtSlug = document.getElementById("inputEditSlug").value;
  let txtID = document.getElementById("inputIdGroup").value;

  if (txtGroupName == 0) {
    //if input name empty, the operation does not proceed
    toastr["error"]("EL NOMBRE DEL GRUPO ESTA VACIO", "Error");
  } else {
    $.ajax({
      url: "controller/user_group/c_update_group.php",
      type: "POST",
      data: {
        id: txtID,
        groupName: txtGroupName,
        slug: txtSlug,
      },
    }).done(function (resp) {
      if (resp == 1) {
        //if 1 , insert table of database
        tbl_users_group.ajax.reload();
        $("#modalEditGroup").modal("hide");
        toastr["success"]("Grupo actualizado", "Success");
      } else if (resp == 2) {
        //if 2, not insert, register is al ready register
        toastr["warning"]("EL GRUPO YA ESTA REGISTRADO", "Warning");
      } else if (resp == 0) {
        //if 0, error connexion database
        toastr["error"](
          "Se ha producido un error, por favor compruebe su conexión",
          "Error"
        );
      }
    });
  }
});

//Function activate group
$("#list_group").on("click", ".btnActivate", function () {
  var data = tbl_users_group.row($(this).parents("tr")).data();
  let id = data.group_id;
  let  statusValue = data.status;
  let status = 1;
  if (statusValue == 1) {
    toastr["warning"]("EL Grupo ya se encuentra activado", "Warning");
    return;
  }
  Swal.fire({
    title: "Are you sure?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Activated!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "controller/user_group/c_update_status_group.php",
        type: "POST",
        data: {
          id: id,
          status: status,
        },
      }).done(function () {
        tbl_users_group.ajax.reload();
        toastr["success"]("Grupo activado correctamente", "Success");
      });
    }
  });
});

//Function Desactivate group
$("#list_group").on("click", ".btnDesactivate", function () {
  var data = tbl_users_group.row($(this).parents("tr")).data();
  let id = data.group_id;
  let statusValue = data.status;
  let status = 2;
  if (statusValue == 2) {
    toastr["warning"]("Grupo ya se encuentra desactivado", "Warning");
    return;
  }
  Swal.fire({
    title: "Are you sure?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Desactivated!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "controller/user_group/c_update_status_group.php",
        type: "POST",
        data: {
          id: id,
          status: status,
        },
      }).done(function () {
        tbl_users_group.ajax.reload();
        toastr["success"]("Grupo desactivado correctamente", "Success");
      });
    }
  });
});

//Function delete group
$("#list_group").on("click", ".btnDelet", function () {
  var data = tbl_users_group.row($(this).parents("tr")).data();
  if (tbl_users_group.row(this).child.isShown()) {
    //modal responsivo para moviles
    var data = tbl_users_group.row(this).data();
  }
  let id = data.group_id;

  Swal.fire({
    title: "Esta seguro?",
    text: "No podra revertir esto!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "controller/user_group/c_delet_group.php",
        type: "POST",
        data: { id: id },
        dataType: "json",
      })
        .done(function (response) {
          if (response.status === "success") {
            toastr["success"](response.message, "Success");
            tbl_users_group.ajax.reload();
          } else {
            toastr["error"](response.message, "Error");
          }
        })
        .fail(function () {
          toastr["error"]("Error en la solicitud", "Error");
        });      
    }
  });
});

//function open modal edit group
$("#list_group").on("click", ".btnPermissions", function () {
  var data = tbl_users_group.row($(this).parents("tr")).data();
  if (tbl_users_group.row(this).child.isShown()) {
    //modal responsivo para moviles
    var data = tbl_users_group.row(this).data();
  }
  $("#modalPermissionGroup").modal({ backdrop: "static", keyboard: false });
  $("#modalPermissionGroup").modal("show");
  $("#modalPermissionGroup").draggable({
    handle: ".modal-header" // Puedes arrastrar el modal desde la cabecera
  });

});