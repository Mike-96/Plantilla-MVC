var tbl_users;
function list_user() {
  tbl_users = $("#table_user").DataTable({
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
      url: "controller/users/c_list_users.php",
      type: "POST",
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
          if (data == "1") {
            return "<span class='badge bg-success'>ACTIVO</span>";
          } else {
            return "<span class='badge bg-danger'>INACTIVO</span>";
          }
        },
      },
      { data: "last_login" },
      {
        defaultContent:
      "<button type='button' class='btn btn-sm btn-info dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Acciones </button>" +
      "<div class='dropdown-menu'>" +
      "<button class='btnEdit dropdown-item' type='button'><i class='fa fa-edit'></i> Editar</button>" +
      "<button class='btnActivate dropdown-item' type='button'><i class='far fa-check-circle'></i> Activar</button>" +
      "<button class='btnDesactivate dropdown-item' type='button'><i class='far fa-times-circle'></i> Desactivar</button>" +
      "<button class='btnDelet dropdown-item' type='button'><i class='fas fa-trash-alt'></i> Eliminar</button>" +
      "<button class='btnDesactivate dropdown-item' type='button'><i class='fas fa-key'></i> Cambiar Password</button>" +
      "</div>",
      },
    ],

    select: true,
    // Otras opciones...
    headerCallback: function(thead, data, start, end, display) {
      $(thead).find('th').addClass('text-center');
    },
    fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull){
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
