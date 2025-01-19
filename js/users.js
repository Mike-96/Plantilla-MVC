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
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
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
        data: "status",
        render: function (data, type, row) {
          if (data == "1") {
            return "<span class='badge bg-success'>ACTIVO</span>";
          } else {
            return "<span class='badge bg-danger'>INACTIVO</span>";
          }
        },
      },
      { data: "last_login" },
      { defaultContent: "<button type='button' class='btn btn-info btn-block btn-sm'><i class='fa fa-edit'></i></button>" },
      { defaultContent: "<button type='button' class='btn btn-success btn-block btn-sm'><i class='far fa-check-circle'></i></button>" },
      { defaultContent: "<button type='button' class='btn btn-danger btn-block btn-sm'><i class='far fa-times-circle'></i></button>" },
      { defaultContent: "<button type='button' class='btn btn-warning btn-block btn-sm'><i class='fa fa-key'></i></button>" },
    ],

    select: true,
    // Otras opciones...
    headerCallback: function(thead, data, start, end, display) {
      $(thead).find('th').addClass('text-center');
    },
    fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull){
      $($(nRow).find("td")[0]).css('text-align', 'center');
      $($(nRow).find("td")[1]).css('text-align', 'center');
      //$($(nRow).find("td")[2]).css('text-align', 'center');
      $($(nRow).find("td")[3]).css('text-align', 'center');
      $($(nRow).find("td")[4]).css('text-align', 'center');
      $($(nRow).find("td")[5]).css('text-align', 'center');
      $($(nRow).find("td")[6]).css('text-align', 'center');
      $($(nRow).find("td")[7]).css('text-align', 'center');
      $($(nRow).find("td")[8]).css('text-align', 'center');
      $($(nRow).find("td")[9]).css('text-align', 'center');
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
