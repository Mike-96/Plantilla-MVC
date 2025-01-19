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

