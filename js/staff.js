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
      { data: "staff_name" },
      { data: "dni" },
      { data: "phone" },
      { data: "email" },
      { data: "address" },
      { data: "city" },
      { data: "country" },
      { data: "birthdate" },
      { data: "status" },
      { data: "created_at" },
      { data: "updated_at" },
      {
        defaultContent:
          "<button type='button' class='btnDelet btn bg-maroon btn-block btn-sm'><i class='fas fa-trash-alt'></i></button>",
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
  let txtFirstName = document.getElementById("inputStaffName").value;
  let txtLastName = document.getElementById("inputStaffLastName").value;
  let txtCodeSatff = document.getElementById("inputCodeStaff").value;
  let txtEmail = document.getElementById("inputEmail").value;
  let txtDNI = document.getElementById("inputDNI").value;
  let txtPhone = document.getElementById("inputPhone").value;
  let txtBirthdate = document.getElementById("inputBIRTHDATE").value;
  let txtAddress = document.getElementById("inputADDRESS").value;
  let txtCity = document.getElementById("inputCITY").value;
  let txtCountry = document.getElementById("inputCOUNTRY").value;
  let txtGroup = document.getElementById("selectGroup").value;
  let txtHiredate = document.getElementById("inputHIREDATE").value;

  if (
    txtFirstName == 0 ||
    txtLastName == 0 ||
    txtCodeSatff == 0 ||
    txtEmail == 0 ||
    txtDNI == 0 ||
    txtPhone == 0 ||
    txtBirthdate == 0 ||
    txtAddress == 0 ||
    txtCity == 0 ||
    txtCountry == 0 ||
    txtGroup == 0 ||
    txtHiredate == 0
  ) {
    //if input name empty, the operation does not proceed
    toastr["error"]("Fill in the empty fields", "Error");
  } else {
    $.ajax({
      url: "controller/user_group/c_create_staff.php",
      type: "POST",
      data: {
        firstName: txtFirstName,
        lastName: txtLastName,
        code: txtCodeSatff,
        email: txtEmail,
        dni: txtDNI,
        phone: txtPhone,
        birthdate: txtBirthdate,
        address: txtAddress,
        city: txtCity,
        country: txtCountry,
        group: txtGroup,
        hiredate: txtHiredate,
      },
    }).done(function (resp) {
      if (resp == 1) {
        //if 1 , insert table of database
        tbl_staff.ajax.reload();
        cleanCreateStaff();
        toastr["success"]("Staff successfully register", "Success");
        $("#addStaff .btn.btn-tool[data-card-widget='collapse']").trigger(
          "click"
        );
      } else if (resp == 2) {
        //if 2, not insert, register is al ready register
        toastr["warning"]("The Staff is already registered", "Warning");
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

//open modal generate code staff
btn_OpenModalGenerate.addEventListener("click", function () {
  $("#modalGenerateCodeStaff").modal({ backdrop: "static", keyboard: false });
  $("#modalGenerateCodeStaff").modal("show");
  $("#modalGenerateCodeStaff").draggable({
    handle: ".modal-header", // Puedes arrastrar el modal desde la cabecera
  });
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
  document.getElementById("inputADDRESS").value = "";
  document.getElementById("inputCITY").value = "";
  document.getElementById("inputCOUNTRY").value = "";
  document.getElementById("inputHIREDATE").value = "";
}

//generate code randon
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
  // Mostrar el loader antes de realizar la solicitud AJAX
  let loader = document.getElementById('loaderRandonCodeStaff');
  loader.style.display = "block";

  // Realizar una solicitud AJAX para verificar si el código existe en la base de datos
  $.ajax({
    url: "controller/staff/c_check_code.php",
    type: "POST",
    data: {
      code: code
    }
  }).done(function (resp) {
    // Ocultar el loader después de recibir la respuesta del servidor
    loader.style.display = "none";

    // Verificar la respuesta del servidor
    if (resp === "exists") {
      // Si el código ya existe, llama a generateRandomCode nuevamente para generar uno nuevo
      generateRandomCode(length, includeNumbers, includeLetters);
      toastr["warning"]("This code already exists.", "Warning");
    } else {
      // Si el código no existe, puedes proceder y retornar el código generado
      // Insertar el código generado en el campo de entrada
      document.getElementById("inputCodeStaff").value = code;
      // Cerrar el modal si es necesario
      $('#modalGenerateCodeStaff').modal('hide');
      toastr["success"]("This code is available.", "Success");
    }
  });

  return code;
}

// Manejar el evento de clic en el botón "Generate"
document.getElementById("btnGenerateCodeStaff").addEventListener("click", function () {
  const length = parseInt(document.getElementById("inputlong").value);
  const includeNumbers = document.getElementById("numbers").checked;
  const includeLetters = document.getElementById("letters").checked;

  // Validar longitud mínima
  if (length < 3 || length > 12) {
      toastr["warning"]("Length must be at least 3.", "Warning");
      return;
  }

  // Generar el código aleatorio
  const generatedCode = generateRandomCode(length, includeNumbers, includeLetters);

  if (generatedCode) {
      // Insertar el código generado en el campo de entrada
      document.getElementById("inputCodeStaff").value = generatedCode;
      
      // Cerrar el modal si es necesario
      $('#modalGenerateCodeStaff').modal('hide');
  }

});

//configuration date, format yyyy/mm/dd
$(document).ready(function() {
  $('#inputBIRTHDATE').daterangepicker({
      singleDatePicker: true, // Para una sola fecha
      showDropdowns: true, // Mostrar menús desplegables para seleccionar el año y el mes
      autoUpdateInput: false, // Para evitar que la fecha se actualice automáticamente
      locale: {
          format: 'YYYY/MM/DD', // Define el formato deseado aquí
      },
  });

  // Establece el valor del campo de entrada cuando se selecciona una fecha
  $('#inputBIRTHDATE').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY/MM/DD'));
  });

  $('#inputHIREDATE').daterangepicker({
    singleDatePicker: true, // Para una sola fecha
    showDropdowns: true, // Mostrar menús desplegables para seleccionar el año y el mes
    autoUpdateInput: false, // Para evitar que la fecha se actualice automáticamente
    locale: {
        format: 'YYYY/MM/DD', // Define el formato deseado aquí
    },
});

// Establece el valor del campo de entrada cuando se selecciona una fecha
$('#inputHIREDATE').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('YYYY/MM/DD'));
});
});

//listar combo box list group 
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
    } else {
      $("#selectGroup").html("<option value=''>No records found</option>");
    }
  });
}


