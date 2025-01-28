var tbl_staff;
function listStaff() {
  tbl_staff = $("#list_staff").DataTable({
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
      url: "controller/staff/c_list_staff.php",
      type: "POST",
    },
    columns: [
      { data: "staff_id" },
      { data: "group_name" },
      {
        data: null, // Combina `staff_name` y `dni`
        render: function (data) {
          return `${data.first_name} ${data.last_name}`;
        },
      },
      { data: "dni" },
      { data: "phone" },
      {
        data: "status",
        render: function (data) {
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
          "<button type='button' class='btnView btn btn-sm bg-warning'>Ver mas <i class='far fa-eye'></i></button>",
      },
      {
        defaultContent:
          "<button type='button' class='btn btn-sm btn-info dropdown-toggle' data-toggle='dropdown' aria-haspopup='undefined' aria-expanded='undefined'> Acciones </button>" +
          "<div class='dropdown-menu'>" +
          "<button class='btnEdit dropdown-item' type='button'><i class='fa fa-edit'></i> Editar</button>" +
          "<button class='btnActivate dropdown-item' type='button'><i class='far fa-check-circle'></i> Activar</button>" +
          "<button class='btnDesactivate dropdown-item' type='button'><i class='far fa-times-circle'></i> Desactivar</button>" +
          "<button class='btnDelet dropdown-item' type='button'><i class='fas fa-trash-alt'></i> Eliminar</button>" +
          "</div>",
      },
    ],

    select: false,
    // Otras opciones...
    headerCallback: function (thead, data, start, end, display) {
      $(thead).find("th").addClass("text-center");
    },
    fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
      $($(nRow).find("td")[0]).css("text-align", "center");
      //$($(nRow).find("td")[1]).css("text-align", "center");
      //$($(nRow).find("td")[2]).css("text-align", "center");
      $($(nRow).find("td")[3]).css("text-align", "center");
      $($(nRow).find("td")[4]).css("text-align", "center");
      $($(nRow).find("td")[5]).css("text-align", "center");
      $($(nRow).find("td")[6]).css("text-align", "center");
      $($(nRow).find("td")[7]).css("text-align", "center");
      $($(nRow).find("td")[8]).css("text-align", "center");
      $($(nRow).find("td")[9]).css("text-align", "center");
    },
  });

  tbl_staff.on("draw.td", function () {
    var PageInfo = $("#list_staff").DataTable().page.info();
    tbl_staff
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

//selection id button / inputs
var btn_CreateStaff = document.getElementById("btnCreateStaff");
var btn_OpenModalGenerate = document.getElementById("openGenerateCodeStaff");

//Function add Staff
btn_CreateStaff.addEventListener("click", function () {
  //selection input value
  let tGropupID = document.getElementById("selectGroup").value;
  let tCodeStaff = document.getElementById("inputCodeStaff").value;
  let tName = document.getElementById("inputStaffName").value;
  let tLastName = document.getElementById("inputStaffLastName").value;
  let tEmail = document.getElementById("inputEmail").value;
  let tDNI = document.getElementById("inputDNI").value;
  let tPhone = document.getElementById("inputPhone").value;
  let tDepartament = document.getElementById("selectDepartment").value;
  let tHireDate = document.getElementById("inputHIREDATE").value;
  let tAddress = document.getElementById("inputADDRESS").value;
  let tCity = document.getElementById("selectCity").value;
  let tCountry = document.getElementById("selectCountry").value;
  let tBirthDate = document.getElementById("inputBIRTHDATE").value;
  let tStatus = document.getElementById("selectStatus").value;

  if (
    tCodeStaff == 0 ||
    tName == 0 ||
    tLastName == 0 ||
    tEmail == 0 ||
    tDNI == 0 ||
    tPhone == 0 ||
    tAddress == 0 ||
    tHireDate == 0 ||
    tCity == 0 ||
    tCountry == 0 ||
    tBirthDate == 0
  ) {
    //if input name empty, the operation does not proceed
    toastr["error"]("Rellena los campos vacíos", "Error");
  } else {
    $.ajax({
      url: "controller/staff/c_create_staff.php",
      type: "POST",
      data: {
        rolGroup: tGropupID,
        codeStaff: tCodeStaff,
        name: tName,
        lastName: tLastName,
        email: tEmail,
        dni: tDNI,
        phone: tPhone,
        department: tDepartament,
        hireDate: tHireDate,
        address: tAddress,
        city: tCity,
        country: tCountry,
        birthDate: tBirthDate,
        status: tStatus,
      },
    }).done(function (resp) {
      if (resp == 1) {
        //if 1 , insert table of database
        tbl_staff.ajax.reload();
        cleanCreateStaff();
        toastr["success"]("Registro exitosamente", "Exito");
        $("#addStaff .btn.btn-tool[data-card-widget='collapse']").trigger(
          "click"
        );
      } else if (resp == 2) {
        //if 2, not insert, register is al ready register
        toastr["warning"]("El personal ya está registrado", "Alerta");
      } else if (resp == 0) {
        //if 0, error connexion database
        toastr["error"](
          "Se ha producido un error, comprueba tu conexión",
          "Error"
        );
      }
    });
  }
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

//cleaning input create staff
function cleanCreateStaff() {
  document.getElementById("inputStaffName").value = "";
  document.getElementById("inputStaffLastName").value = "";
  document.getElementById("inputCodeStaff").value = "";
  document.getElementById("inputEmail").value = "";
  document.getElementById("inputDNI").value = "";
  document.getElementById("inputPhone").value = "";
  document.getElementById("inputBIRTHDATE").value = "";
}

//open modal generate code staff
btn_OpenModalGenerate.addEventListener("click", function () {
  $("#modalGenerateCodeStaff").modal({ backdrop: "static", keyboard: false });
  $("#modalGenerateCodeStaff").modal("show");
  $("#modalGenerateCodeStaff").draggable({
    handle: ".modal-header", // Puedes arrastrar el modal desde la cabecera
  });
});

//generate code randon
function generateRandomCode(length, includeNumbers, includeLetters) {
  const numbers = "0123456789";
  const uppercaseLetters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  let code = "";

  // Validar que al menos se incluya una opción (letras o números)
  if (!includeNumbers && !includeLetters) {
    toastr["error"](
      "Seleccione al menos una opción (letras o números).",
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
  // Mostrar el loader antes de realizar la solicitud AJAX
  let loader = document.getElementById("loaderRandonCodeStaff");
  loader.style.display = "block";

  // Realizar una solicitud AJAX para verificar si el código existe en la base de datos
  $.ajax({
    url: "controller/staff/c_check_code.php",
    type: "POST",
    data: {
      code: code,
    },
  }).done(function (resp) {
    // Ocultar el loader después de recibir la respuesta del servidor
    loader.style.display = "none";

    // Verificar la respuesta del servidor
    if (resp === "exists") {
      // Si el código ya existe, llama a generateRandomCode nuevamente para generar uno nuevo
      generateRandomCode(length, includeNumbers, includeLetters);
      toastr["warning"]("Este código ya existe.", "Alerta");
    } else {
      // Si el código no existe, puedes proceder y retornar el código generado
      // Insertar el código generado en el campo de entrada
      document.getElementById("inputCodeStaff").value = code;
      // Cerrar el modal si es necesario
      $("#modalGenerateCodeStaff").modal("hide");
      toastr["success"]("Código está disponible.", "Exito");
    }
  });

  return code;
}

// Manejar el evento de clic en el botón "Generate"
document
  .getElementById("btnGenerateCodeStaff")
  .addEventListener("click", function () {
    const length = parseInt(document.getElementById("inputlong").value);
    const includeNumbers = document.getElementById("numbers").checked;
    const includeLetters = document.getElementById("letters").checked;

    // Validar longitud mínima
    if (length < 3 || length > 12) {
      toastr["error"](
        "La longitud debe tener entre 3 a 12 caracteres.",
        "Error"
      );
      return;
    }

    // Generar el código aleatorio
    const generatedCode = generateRandomCode(
      length,
      includeNumbers,
      includeLetters
    );

    if (generatedCode) {
      // Insertar el código generado en el campo de entrada
      document.getElementById("inputCodeStaff").value = generatedCode;

      // Cerrar el modal si es necesario
      $("#modalGenerateCodeStaff").modal("hide");
    }
  });

//configuration date, format yyyy-mm-dd
$(document).ready(function () {
  // Función para configurar cada datepicker
  function initializeDatePicker(inputId) {
    $("#" + inputId).daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      autoUpdateInput: false,
      locale: {
        format: "YYYY-MM-DD",
      },
    }).on("apply.daterangepicker", function (ev, picker) {
      $(this).val(picker.startDate.format("YYYY-MM-DD"));
    });
  }

  // Inicializa los datepickers
  initializeDatePicker("inputBIRTHDATE");
  initializeDatePicker("inputHIREDATE");
  initializeDatePicker("inputEditBIRTHDATE");
  initializeDatePicker("inputEditHIREDATE");
});

//listar combo box list group + estatus
function comboBox_Group() {
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
      $("#selectGroup").html(options);
      $("#selectEditGroup").html(options);

      // Inicializar selectDepartment con los departamentos del primer país
      let status = ["", "Activo", "Inactivo"];
      let statusOptions = "";
      for (let i = 1; i < status.length; i++) {
        statusOptions += "<option value='" + i + "'>" + status[i] + "</option>";
      }
      $("#selectStatus").html(statusOptions);
      $("#selectEditStatus").html(statusOptions);
    } else {
      $("#selectGroup").html("<option value=''>No records found</option>");
    }
  });
}

//listar combo box list country + department + city
function comboBox_Country() {
  $.ajax({
    url: "./assets/country.json",
    method: "GET",
    dataType: "json",
    success: function (data) {
      var countryOptions = ""; // Opciones para el select de países
      var countries = data.country; // Obtener la lista de países del JSON
      for (var i = 0; i < countries.length; i++) {
        countryOptions +=
          "<option value='" +
          countries[i].name +
          "'>" +
          countries[i].name +
          "</option>";
      }
      $("#selectCountry").html(countryOptions); // Poblar el select de países con las opciones generadas

      // Inicializar selectDepartment con los departamentos del primer país
      var firstCountryDepartments = countries[0].departments; // Obtener los departamentos del primer país
      var departmentOptions = ""; // Opciones para el select de departamentos
      for (var j = 0; j < firstCountryDepartments.length; j++) {
        departmentOptions +=
          "<option value='" +
          firstCountryDepartments[j].name +
          "'>" +
          firstCountryDepartments[j].name +
          "</option>";
      }
      $("#selectDepartment").html(departmentOptions); // Poblar el select de departamentos con las opciones del primer país

      // Inicializar selectCity con las municipalidades del primer departamento
      var firstDepartmentMunicipalities =
        firstCountryDepartments[0].municipalities; // Obtener las municipalidades del primer departamento
      var municipalityOptions = ""; // Opciones para el select de municipalidades
      for (var k = 0; k < firstDepartmentMunicipalities.length; k++) {
        municipalityOptions +=
          "<option value='" +
          firstDepartmentMunicipalities[k] +
          "'>" +
          firstDepartmentMunicipalities[k] +
          "</option>";
      }
      $("#selectCity").html(municipalityOptions); // Poblar el select de municipalidades con las opciones del primer departamento

      // Actualizar departamentos cuando se selecciona un país diferente
      $("#selectCountry").change(function () {
        var selectedCountry = $(this).val(); // Obtener el nombre del país seleccionado
        var departments = countries.filter(
          (country) => country.name === selectedCountry
        )[0].departments; // Encontrar los departamentos del país seleccionado
        var departmentOptions = "";
        for (var j = 0; j < departments.length; j++) {
          departmentOptions +=
            "<option value='" +
            departments[j].name +
            "'>" +
            departments[j].name +
            "</option>";
        }
        $("#selectDepartment").html(departmentOptions); // Poblar el select de departamentos con las opciones del país seleccionado

        // Actualizar selectCity con las municipalidades del primer departamento del nuevo país
        var firstDepartmentMunicipalities = departments[0].municipalities; // Obtener las municipalidades del primer departamento
        var municipalityOptions = ""; // Opciones para el select de municipalidades
        for (var k = 0; k < firstDepartmentMunicipalities.length; k++) {
          municipalityOptions +=
            "<option value='" +
            firstDepartmentMunicipalities[k] +
            "'>" +
            firstDepartmentMunicipalities[k] +
            "</option>";
        }
        $("#selectCity").html(municipalityOptions); // Poblar el select de municipalidades con las opciones del primer departamento del nuevo país
      });

      // Actualizar municipalidades cuando se selecciona un departamento diferente
      $("#selectDepartment").change(function () {
        var selectedCountry = $("#selectCountry").val(); // Obtener el nombre del país seleccionado
        var selectedDepartment = $(this).val(); // Obtener el nombre del departamento seleccionado
        var departments = countries.filter(
          (country) => country.name === selectedCountry
        )[0].departments; // Encontrar los departamentos del país seleccionado
        var municipalities = departments.filter(
          (department) => department.name === selectedDepartment
        )[0].municipalities; // Encontrar las municipalidades del departamento seleccionado
        var municipalityOptions = ""; // Opciones para el select de municipalidades
        for (var k = 0; k < municipalities.length; k++) {
          // Poblar el select de municipalidades con las opciones del departamento seleccionado
          municipalityOptions +=
            "<option value='" +
            municipalities[k] +
            "'>" +
            municipalities[k] +
            "</option>";
        }
        $("#selectCity").html(municipalityOptions); // Poblar el select de municipalidades con las opciones del departamento seleccionado
      });
    },
    error: function (xhr, status, error) {
      console.error("Error al cargar el JSON:", error); // Manejo de errores si la solicitud falla
    },
  });
}

//function open modal info staff
$("#list_staff").on("click", ".btnView", function () {
  var data = tbl_staff.row($(this).parents("tr")).data();
  if (tbl_staff.row(this).child.isShown()) {
    //modal responsivo para moviles
    var data = tbl_staff.row(this).data();
  }
  $("#modalInfoStaff").modal({ backdrop: "static", keyboard: false });
  $("#modalInfoStaff").modal("show");
  $("#modalInfoStaff").draggable({
    handle: ".modal-header",
  });

  $("#infoIdStaff").text(data.staff_id);
  $("#infoRolGroup").text(data.group_name);
  $("#infoNameStaff").text(data.first_name + " " + data.last_name);
  $("#infoCodeStaff").text(data.code_staff);
  $("#infoDniStaff").text(data.dni);
  $("#infoAddressStaff").text(
    data.country +
      ", " +
      data.department +
      ", " +
      data.city +
      ", " +
      data.address
  );
  $("#infoPhoneStaff").text(data.phone);
  $("#infoEmailStaff").text(data.email);
  $("#infoBirthDateStaff").text(data.birthdate);
  $("#infoHiredateStaff").text(data.hire_date);
  $("#infoCreateStaff").text(data.created_at);
});

//function open modal edit staff
$("#list_staff").on("click", ".btnEdit", function () {
  var data = tbl_staff.row($(this).parents("tr")).data();
  if (tbl_staff.row(this).child.isShown()) {
    //modal responsivo para moviles
    var data = tbl_staff.row(this).data();
  }
  $("#modalEditStaff").modal({ backdrop: "static", keyboard: false });
  $("#modalEditStaff").modal("show");
  $("#modalEditStaff").draggable({
    handle: ".modal-header",
  });

  $("#inputEditStaffId").val(data.staff_id);
  $("#selectEditGroup").val(data.group_id);
  $("#inputEditStaffName").val(data.first_name);
  $("#inputEditStaffLastName").val(data.last_name);
  $("#inputEditCodeStaff").val(data.code_staff);
  $("#inputEditDNI").val(data.dni);
  $("#inputEditPhone").val(data.phone);
  $("#inputEditEmail").val(data.email);
  $("#inputEditBIRTHDATE").val(data.birthdate);
  $("#inputEditHIREDATE").val(data.hire_date);
  $("#selectEditStatus").val(data.status);
  $("#inputEditADDRESS").val(data.address);
  $("#selectEditCity").val(data.city);
  $("#selectEditDepartment").val(data.department);
  $("#selectEditCountry").val(data.country);

  // actualizar el picker con la fecha pasada en el input desde la base de datos
  $('#inputEditBIRTHDATE').val(data.birthdate); // Asigna la fecha al input
  $('#inputEditBIRTHDATE').data('daterangepicker').setStartDate(data.birthdate); // Establece la fecha del picker

  // actualizar el picker con la fecha pasada en el input desde la base de datos
  $('#inputEditHIREDATE').val(data.hire_date); // Asigna la fecha al input
  $('#inputEditHIREDATE').data('daterangepicker').setStartDate(data.hire_date); // Establece la fecha del picker
});
