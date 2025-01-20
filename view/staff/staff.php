<?php
include_once '../../assets/dictionary.php';
?>

<!-- header view page -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <p><i class="fas fa-id-card-alt"></i> <?php echo $title['staff']; ?></p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"> <?php echo $title['staff']; ?></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- create staff-->
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card card-danger card-outline collapsed-card">
                    <div class="card-header" type="button" class="btn btn-tool" data-card-widget="collapse">
                        <h3 class="card-title">
                            <i class="fas fa-address-book"></i>
                            <?php echo $dictionary['add']; ?>
                        </h3>
                        <div class="card-tools" id="addStaff">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: none;">

                        <div class="d-flex justify-content-center">
                            <div class="form-row col-md-10">

                                <div class="form-group col-md-6">
                                    <label for="inputStaffName"><?php echo $dictionary['firstName']; ?><span style="color: red;">*</span></label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputStaffName">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputStaffLastName"><?php echo $dictionary['lastName']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputStaffLastName">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCodeStaff"><?php echo $dictionary['codeStaff']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputCodeStaff">
                                        <span class="input-group-append">
                                            <button id="openGenerateCodeStaff" type="button" class="btn btn-info"><i class="fas fa-random"></i> <?php echo $dictionary['generate']; ?></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail"><?php echo $dictionary['email']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input type="email" class="form-control" id="inputEmail">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputDNI"><?php echo $dictionary['dni']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-passport"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputDNI">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPhone"><?php echo $dictionary['phone']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="tel" class="form-control" id="inputPhone" placeholder="+50577882244">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputBIRTHDATE"><?php echo $dictionary['birthDate']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputBIRTHDATE" placeholder="yyyy/mm/dd">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputHIREDATE"><?php echo $dictionary['hireDate']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputHIREDATE" placeholder="yyyy/mm/dd">
                                    </div>
                                </div>
                                <!-- Pais -->
                                <div class="form-group col-md-6">
                                    <label for="inputCOUNTRY"><?php echo $dictionary['country']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                        </div>
                                        <select class="custom-select form-control" id="selectCountry"></select>
                                    </div>
                                </div>
                                <!-- Departamento -->
                                <div class="form-group col-md-6">
                                    <label for="inputDepartment"><?php echo $dictionary['department']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                                        </div>
                                        <select class="custom-select form-control" id="selectDepartment"></select>
                                    </div>
                                </div>
                                <!-- localidad -->
                                <div class="form-group col-md-6">
                                    <label for="inputCITY"><?php echo $dictionary['location']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                        </div>
                                        <select class="custom-select form-control" id="selectCity"></select>
                                    </div>
                                </div>
                                <!-- direccion -->
                                <div class="form-group col-md-6">
                                    <label for="inputADDRESS"><?php echo $dictionary['address']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputADDRESS">
                                    </div>
                                </div>
                                <!-- roles -->
                                <div class="form-group col-md-6">
                                    <label for="selectGroup"><?php echo $dictionary['rolGroup']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                                        </div>
                                        <select class="custom-select form-control" id="selectGroup"></select>
                                    </div>
                                </div>
                                <!-- Status -->
                                <div class="form-group col-md-6">
                                    <label for="selectStatus"><?php echo $dictionary['status']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-exclamation-circle"></i></span>
                                        </div>
                                        <select class="custom-select form-control" id="selectStatus"></select>
                                    </div>
                                </div>

                                <br>
                                <div>
                                    <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> <?php echo $dictionary['cancel']; ?></button>
                                    <button id="btnCreateStaff" type="button" class="btn btn-success btn-sm"><i class="fas fa-check"></i> <?php echo $dictionary['create']; ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- list staffin table -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-success card-outline">
            <div class="card-header">
                <h3 class="card-title" id="role_staff">
                    <i class="fas fa-users-cog"></i>
                    Role Group
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <table id="list_staff" class="display cell-border" style="width:100%">
                            <thead class="bg-navy">
                                <tr>
                                    <th>#</th>
                                    <th>Group</th>
                                    <th>Name</th>
                                    <th>DNI</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Birthdate</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

<!-- modal generar staff -->
<div class="modal fade" id="modalGenerateCodeStaff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="undefined" draggable="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b><i class="fas fa-filter"></i> <?php echo $dictionary['options']; ?></b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><b><i class="far fa-times-circle"></i></b></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="align-self-center">

                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="letters">
                            <label class="custom-control-label" for="letters"><?php echo $dictionary['addLatter']; ?></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" checked="" class="custom-control-input" id="numbers">
                            <label class="custom-control-label" for="numbers"><?php echo $dictionary['addNumber']; ?></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputlong"><?php echo $dictionary['lenghCode']; ?><span style="color: red;">*</span></label>
                        <input type="number" class="form-control" id="inputlong" placeholder="Enter the code size" value="7">

                    </div>

                </div>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-ban"></i> <?php echo $dictionary['cancel']; ?></button>
                <button id="btnGenerateCodeStaff" type="button" class="btn btn-success"><i class="fas fa-check"></i> <?php echo $dictionary['generate']; ?></button>
            </div>

            <div class="loaderRandonCodeStaff" id="loaderRandonCodeStaff" style="display: none;"></div>

        </div>
    </div>
</div>









<script src="js/staff.js"></script>
<script>
    $(document).ready(function() {
        listStaff();
        comboBox_Group();
        comboBox_Country();
    });
</script>