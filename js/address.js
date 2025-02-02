
//listar combo box list country + department + city en add staff
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

  function comboBox_EditCountry() {
    $.ajax({
      url: "./assets/country.json",
      method: "GET",
      dataType: "json",
      success: function (data) {
        populateSelect("#selectEditCountry", data.country.map(c => c.name));
        
        // Inicializar selectores con el primer país y su primer departamento
        updateDepartments(data.country[0].departments);
        updateMunicipalities(data.country[0].departments[0].municipalities);
  
        $("#selectEditCountry").change(function () {
          const selectedCountry = $(this).val();
          const departments = data.country.find(country => country.name === selectedCountry).departments;
          updateDepartments(departments);
          updateMunicipalities(departments[0].municipalities);
        });
  
        $("#selectEditDepartment").change(function () {
          const selectedCountry = $("#selectEditCountry").val();
          const selectedDepartment = $(this).val();
          const departments = data.country.find(country => country.name === selectedCountry).departments;
          const municipalities = departments.find(department => department.name === selectedDepartment).municipalities;
          updateMunicipalities(municipalities);
        });
      },
      error: function (xhr, status, error) {
        console.error("Error al cargar el JSON:", error); 
      },
    });
  }
  
  function populateSelect(selector, options) {
    const optionElements = options.map(option => `<option value='${option}'>${option}</option>`).join('');
    $(selector).html(optionElements);
  }
  
  function updateDepartments(departments) {
    populateSelect("#selectEditDepartment", departments.map(d => d.name));
  }
  
  function updateMunicipalities(municipalities) {
    populateSelect("#selectEditCity", municipalities);
  }
  
  