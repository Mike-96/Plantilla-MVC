$(document).ready(function () {
    function loadPermissions() {
        $.ajax({
            url: 'controller/permissions/c_get_groups_and_permissions.php',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response && typeof response === "object") {
                    $('#permissionsContainer').empty();

                    // Recorrer los grupos directamente
                    Object.values(response).forEach(function (group) {
                        const groupCard = createPermissionCard(group);
                        $('#permissionsContainer').append(groupCard);
                    });
                } else {
                    console.error("La respuesta del servidor no es válida:", response);
                    toastr["error"]("Datos no válidos recibidos del servidor.", "Error");
                }
            },
            error: function (xhr, status, error) {
                console.error("Error al cargar los permisos:", status, error);
                toastr["error"](`Error del servidor: ${xhr.statusText}`, "Error");
            }
        });
    }

    // Función para crear tarjetas de permisos
    function createPermissionCard(group) {
        let groupCard = `<div class="col-md-4">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">${group.group_name}</h3>
                                </div>
                                <div class="card-body">
                                    <form class="permissionsForm" data-group-id="${group.group_id}">`;
    
        // Iterar sobre los permisos del grupo y asegurarnos de que cada check tenga un ID único
        group.permissions.forEach(function (permission, index) {
            const uniqueId = `${group.group_id}_${permission.permission_name}_${index}`; // Identificador único
    
            groupCard += `
                <div class="row">
                    <div class="col-sm-12">
                        <div class="clearfix">
                            <p>${permission.permission_name}</p>
                        </div>
                        <div class="form-group clearfix">
                            <div class="icheck-success d-inline">
                                <input type="radio" name="perm_${permission.permission_name}_${group.group_id}" value="true" id="check_${uniqueId}_1" ${permission.assigned ? 'checked' : ''}>
                                <label for="check_${uniqueId}_1">Permitir</label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" name="perm_${permission.permission_name}_${group.group_id}" value="false" id="check_${uniqueId}_2" ${!permission.assigned ? 'checked' : ''}>
                                <label for="check_${uniqueId}_2">Denegar</label>
                            </div>
                        </div>
                    </div>
                </div>`;
        });
    
        groupCard += `</form></div></div></div>`;
        return groupCard;
    }

    loadPermissions();
});