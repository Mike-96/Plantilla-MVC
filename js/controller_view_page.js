// Obtén la referencia al botón por su ID
const btnViewUser = document.getElementById("btnViewUser");
const btnRolUser = document.getElementById("btnRolUser");
const btnWhatsapp = document.getElementById("btnWhatsapp");
const btnStaff = document.getElementById("btnStaff");

function load_mainContainer(id, view) {
    $("#" + id).load(view);
}

//mostrar vista lista de usuarios
btnWhatsapp.addEventListener("click", function() {
    load_mainContainer("main_container", "./view/whatsapp/whatsapp.php");
});
//mostrar vista lista de usuarios
btnViewUser.addEventListener("click", function() {
    load_mainContainer("main_container", "./view/user/user.php");
});

//mostrar vista roles de usuarios
btnRolUser.addEventListener("click", function() {
    load_mainContainer("main_container", "./view/user/user_group.php");
});

//mostrar vista staff
btnStaff.addEventListener("click", function() {
    load_mainContainer("main_container", "./view/staff/staff.php");
});

function clearPreviousView() {
    // Limpia eventos asociados al contenedor principal
    $("#main_container").off(); // Remueve todos los eventos del contenedor

    // Limpia instancias de DataTables si existen
    if ($.fn.dataTable && $.fn.dataTable.isDataTable("#tblViewStaff")) {
        $("#tblViewStaff").DataTable().destroy();
    }

    if ($.fn.dataTable && $.fn.dataTable.isDataTable("#tbl_staff")) {
        $("#tbl_staff").DataTable().destroy();
    }

    // Remueve modales o elementos dinámicos
    $("#modalViewStaff").remove();
    //$("#modalViewUser").remove();

    // Resetea variables globales si las usas
    window.tblViewUserStaff = null;
    window.tbl_staff = null;
}

