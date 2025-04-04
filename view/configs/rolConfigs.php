<?php
require_once '../../assets/dictionary.php';
?>

<!-- header view page -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <p><i class="fas fa-code-branch"></i> <?php echo $title['configsRol']; ?></p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><?php echo $routers['configs']; ?></li>
                    <li class="breadcrumb-item active"><?php echo $routers['configsRol']; ?></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<div class="content">
    <div class="container-fluid">
        <div class="col-md-6">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Vistas</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-sm">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input custom-control-input-primary custom-control-input-outline" type="checkbox" id="customCheckbox1" checked="">
                                        <label for="customCheckbox1" class="custom-control-label">Custom Checkbox with custom color outline</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="checkbox" id="customCheckbox2" checked="">
                                        <label for="customCheckbox2" class="custom-control-label">Custom Checkbox with custom color outline</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>




<!-- Archivo JS para la generación dinámica -->
<!-- <script src="js/permissions.js"></script> -->
<!-- <script>
    $(document).ready(function() {
        $('#groupSelector').on('change', function() {
            const group_id = $(this).val(); // Obtener el ID del grupo seleccionado
            loadPermissions(group_id); // Cargar los permisos para ese grupo
        });

    });
</script> -->