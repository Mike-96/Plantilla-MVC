
var tbl_users_group;
function ListUserGroup() {
  let name_table = "Role Group";
  const store = "Plantilla MVC"

  tbl_users_group = $("#list_group").DataTable({
    //buttons:['copy','csv','excel','pdf','print'],
    ordering: true,
    bLengthChange: true,
    responsive: true,
    searching: { regex: false },
    dom: "flBtip",
    //dom: 'flipt',
    lengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
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
      {defaultContent:
          "<button type='button' class='btn btn-info btn-block btn-sm'><i class='fa fa-edit'></i></button>",
      },
      {defaultContent:
          "<button type='button' class='btn btn-success btn-block btn-sm'><i class='far fa-check-circle'></i></button>",
      },
      {defaultContent:
          "<button type='button' class='btn btn-danger btn-block btn-sm'><i class='far fa-times-circle'></i></button>",
      },
      {defaultContent:
          "<button type='button' class='btn btn-warning btn-block btn-sm'><i class='fa fa-key'></i></button>",
      },
    ],
    buttons: [
      {
        extend: "excelHtml5",
        text: '<i class="fas fa-file-excel"></i>',
        titleAttr: "Export to Excel",
        style: 'margin: 0 auto; display: block;',
        title: store + " > " + name_table,
        exportOptions: {
          columns: [ 0, 1, 2, 3, 4, 5 ]
        },
      },
      {
        extend:    "csvHtml5",
        text:      '<i class="fas fa-file-csv"></i>',
        titleAttr: "Export to CSV",
        style: 'margin: 0 auto; display: block;',
        title: store + " > " + name_table,
        exportOptions: {
            columns: [ 0, 1, 2, 3, 4, 5 ]
        }
    },
      {
        extend: "pdfHtml5",
        text: '<i class="fas fa-file-pdf"></i> ',
        titleAttr: "Export to PDF",
        download: "open",
        title:  store + " > " + name_table,
        exportOptions: {
            columns: [ 0, 1, 2, 3, 4, 5 ]
        },
        customize: function (doc) {
            doc.content[1].table.widths =  Array(doc.content[1].table.body[0].length + 1).join('*').split('');
            doc.pageMargins = [10,10,10,10];
            doc.defaultStyle.fontSize = 8;
            doc.styles.tableHeader.fontSize = 8;doc.styles.tableHeader.alignment = "left";
            doc.styles.title.fontSize = 10;
            // Remove spaces around page title
            doc.content[0].text = doc.content[0].text.trim();
            // Header
            doc.content.splice( 1, 0, {
                margin: [ 0, 0, 0, 12 ],
                alignment: 'center',
                fontSize: 8,
                text: 'Printed on: '+window.Date(new Date()),
            });
            // Create a footer
            doc['footer']=(function(page, pages) {
                return {
                    columns: [
                        'Powered by '+ store +' ',
                        {
                            // This is the right column
                            alignment: 'right',
                            text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                        }
                    ],
                    margin: [10, 0]
                };
            });
            // Styling the table: create style object
            var objLayout = {};
            // Horizontal line thickness
            objLayout['hLineWidth'] = function(i) { return 0.5; };
            // Vertikal line thickness
            objLayout['vLineWidth'] = function(i) { return 0.5; };
            // Horizontal line color
            objLayout['hLineColor'] = function(i) { return '#aaa'; };
            // Vertical line color
            objLayout['vLineColor'] = function(i) { return '#aaa'; };
            // Left padding of the cell
            objLayout['paddingLeft'] = function(i) { return 4; };
            // Right padding of the cell
            objLayout['paddingRight'] = function(i) { return 4; };
            // Inject the object in the document
            doc.content[1].layout = objLayout;
        }
      },
      {
        extend: "print",
        footer: "true",
        text: '<i class="fa fa-print"></i>',
        titleAttr: "Print",
        style: 'margin: 0 auto; display: block;',
        title: name_table,
        customize: function (win) {
          $(win.document.body)
            .css("font-size", "10pt")
            .append("<div><b><i>Powered by: "+ store +"</i></b></div>")
            .prepend(
              '<div class="dt-print-heading"><img class="logo" src=""/><h2 class="title"> '+ store +' </h2><p>Printed on: ' +
                window.Date(new Date()) +
                "</p></div>"
            );

          $(win.document.body)
            .find("table")
            .addClass("compact")
            .css("font-size", "inherit");
        },
        exportOptions: {
          columns: [ 0, 1, 2, 3, 4, 5 ]
        },
      },
      {
        extend: "copyHtml5",
        text: '<i class="fas fa-copy"></i>',
        titleAttr: "Copy",
        style: 'margin: 0 auto; display: block;',
        title:  store + " > " + name_table,
        exportOptions: {
          columns: [ 0, 1, 2, 3, 4, 5 ]
        },
      },
    ],

    select: true,
    // Otras opciones...
    headerCallback: function (thead, data, start, end, display) {
      $(thead).find("th").addClass("text-center");
    },
    fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull){
      $($(nRow).find("td")[0]).css('text-align', 'center');
      $($(nRow).find("td")[1]).css('text-align', 'center');
      $($(nRow).find("td")[2]).css('text-align', 'center');
      $($(nRow).find("td")[3]).css('text-align', 'center');
      $($(nRow).find("td")[4]).css('text-align', 'center');
      $($(nRow).find("td")[5]).css('text-align', 'center');
      $($(nRow).find("td")[6]).css('text-align', 'center');
      $($(nRow).find("td")[7]).css('text-align', 'center');
      $($(nRow).find("td")[8]).css('text-align', 'center');
      $($(nRow).find("td")[9]).css('text-align', 'center');
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


function generateRandomCode(length, includeNumbers, includeLetters) {
  const numbers = "0123456789";
  const uppercaseLetters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  let code = "";

  // Validar que al menos se incluya una opción (letras o números)
  if (!includeNumbers && !includeLetters) {
    toastr["error"](
      "Select at least one option (letters or numbers).",
      "Error"
    );
    return null;
  }

  // Agregar la letra al principio si se seleccionó
  if (includeLetters) {
    code += uppercaseLetters.charAt(
      Math.floor(Math.random() * uppercaseLetters.length)
    );
    length--; // Restar 1 a la longitud si se incluyen letras
  }

  // Generar números para el resto del código
  const characters = includeNumbers ? numbers : "";
  for (let i = 0; i < length; i++) {
    code += characters.charAt(Math.floor(Math.random() * characters.length));
  }

  // Realizar una solicitud AJAX para verificar si el código existe en la base de datos
  $.ajax({
    url: "controller/staff/c_check_code.php",
    type: "POST",
    data: {
      code: code
    }
  }).done(function (resp) {
    // Verificar la respuesta del servidor
    if (resp === "exists") {
      // Si el código ya existe, llama a generateRandomCode nuevamente para generar uno nuevo
      generateRandomCode(length, includeNumbers, includeLetters);
    } else {
      // Si el código no existe, puedes proceder y retornar el código generado
      // Insertar el código generado en el campo de entrada
      document.getElementById("inputCodeStaff").value = code;
      // Cerrar el modal si es necesario
      $('#modalGenerateCodeStaff').modal('hide');
    }
  });

  return code;
}
