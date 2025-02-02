<?php
include_once '../../assets/dictionary.php';
?>

<!-- header view page -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <p><i class="fas fa-id-card-alt"></i> <?php echo $routers['staff']; ?></p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"> <?php echo $title['staffLis']; ?></li>
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
                                <!-- name -->
                                <div class="form-group col-md-6">
                                    <label for="inputStaffName"><?php echo $dictionary['firstName']; ?><span style="color: red;">*</span></label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputStaffName">
                                    </div>
                                </div>
                                <!-- last name -->
                                <div class="form-group col-md-6">
                                    <label for="inputStaffLastName"><?php echo $dictionary['lastName']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputStaffLastName">
                                    </div>
                                </div>
                                <!-- code staff -->
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
                                <!-- email -->
                                <div class="form-group col-md-6">
                                    <label for="inputEmail"><?php echo $dictionary['email']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input type="email" class="form-control" id="inputEmail">
                                    </div>
                                </div>
                                <!-- dni -->
                                <div class="form-group col-md-6">
                                    <label for="inputDNI"><?php echo $dictionary['dni']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-passport"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputDNI">
                                    </div>
                                </div>
                                <!-- phone -->
                                <div class="form-group col-md-6">
                                    <label for="inputPhone"><?php echo $dictionary['phone']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="tel" class="form-control" id="inputPhone" placeholder="+50577882244">
                                    </div>
                                </div>
                                <!-- birthdate -->
                                <div class="form-group col-md-6">
                                    <label for="inputBIRTHDATE"><?php echo $dictionary['birthDate']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputBIRTHDATE" placeholder="<?php echo $dictionary['formatDate']; ?>">
                                    </div>
                                </div>
                                <!-- hiredate -->
                                <div class="form-group col-md-6">
                                    <label for="inputHIREDATE"><?php echo $dictionary['hireDate']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputHIREDATE" placeholder="<?php echo $dictionary['formatDate']; ?>">
                                    </div>
                                </div>
                                <!-- Pais -->
                                <div class="form-group col-md-6">
                                    <label for="selectCountry"><?php echo $dictionary['country']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                        </div>
                                        <select class="custom-select form-control" id="selectCountry"></select>
                                    </div>
                                </div>
                                <!-- Departamento -->
                                <div class="form-group col-md-6">
                                    <label for="selectDepartment"><?php echo $dictionary['department']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                                        </div>
                                        <select class="custom-select form-control" id="selectDepartment"></select>
                                    </div>
                                </div>
                                <!-- localidad -->
                                <div class="form-group col-md-6">
                                    <label for="selectCity"><?php echo $dictionary['location']; ?><span style="color: red;">*</span></label>
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

                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">

                            <div class="col-md-10">
                                <button id="btnCancelStaff" type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-ban"></i> <?php echo $dictionary['cancel']; ?></button>
                                <button id="btnCreateStaff" type="button" class="btn btn-success btn-sm"><i class="fas fa-check"></i> <?php echo $dictionary['create']; ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- list staff table -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-success card-outline">
            <div class="card-header">
                <h3 class="card-title" id="role_staff">
                    <i class="fas fa-clipboard-list"></i>
                    <?php echo $title['staffLis']; ?>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <table id="list_staff" class="display cell-border" style="width:100%">
                            <thead class="bg-secondary">
                                <tr>
                                    <th><?php echo $dictionary['number'] ?></th>
                                    <th><?php echo $dictionary['jobTitle'] ?></th>
                                    <th><?php echo $dictionary['nameStaff'] ?></th>
                                    <th><?php echo $dictionary['dni'] ?></th>
                                    <th><?php echo $dictionary['phone'] ?></th>
                                    <th><?php echo $dictionary['status'] ?></th>
                                    <th><?php echo $dictionary['createAt'] ?></th>
                                    <th><?php echo $dictionary['updateAt'] ?></th>
                                    <th><?php echo $dictionary['moreInfo'] ?></th>
                                    <th><?php echo $dictionary['actions'] ?></th>
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
<div class="modal fade" id="modalGenerateCodeStaff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="undefined" draggable="undefined">
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
                            <input type="checkbox" checked="" class="custom-control-input" id="letters">
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

<!-- modal view more info staff -->
<div class="modal fade" id="modalInfoStaff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="undefined" draggable="undefined">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b><i class="fas fa-info-circle"></i> <?php echo $dictionary['infoStaff']; ?></b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><b><i class="far fa-times-circle"></i></b></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="align-self-center">

                    <div class="col-12 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header border-bottom-0">
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-12">
                                        <span id="infoIdStaff" hidden></span>
                                        <ul class="ml-4 mb-0 fa-ul">
                                            <li class="small">
                                                <span class="fa-li"><i class="fas fa-user-tag text-muted"></i></span>
                                                <span style="font-weight:bold"><?php echo $dictionary['department']; ?>: </span>
                                                <p id="infoRolGroup"></p>
                                            </li>
                                            <li class="small">
                                                <span class="fa-li"><i class="fas fa-user text-muted"></i></span>
                                                <span style="font-weight:bold"><?php echo $dictionary['nameStaff']; ?>: </span>
                                                <p class="lead"><b id="infoNameStaff"></b></p>
                                            </li>
                                            <li class="small">
                                                <span class="fa-li"><i class="fas fa-fingerprint text-muted"></i></span>
                                                <span style="font-weight:bold"><?php echo $dictionary['codeStaff']; ?>: </span>
                                                <p id="infoCodeStaff"></p>
                                            </li>
                                            <li class="small">
                                                <span class="fa-li"><i class="fas fa-passport text-muted"></i></span>
                                                <span style="font-weight:bold"><?php echo $dictionary['dni']; ?>: </span>
                                                <p id="infoDniStaff"></p>
                                            </li>
                                            <li class="small">
                                                <span class="fa-li"><i class="fas fa-birthday-cake text-muted"></i></span>
                                                <span style="font-weight:bold"><?php echo $dictionary['birthDate']; ?>: </span>
                                                <p id="infoBirthDateStaff"></p>
                                            </li>
                                            <li class="small">
                                                <span class="fa-li"><i class="fas fa-phone-square-alt text-muted"></i></span>
                                                <span style="font-weight:bold"><?php echo $dictionary['phone']; ?>: </span>
                                                <p id="infoPhoneStaff"></p>
                                            </li>
                                            <li class="small">
                                                <span class="fa-li"><i class="fas fa-lg fa-building text-muted"></i></span>
                                                <span style="font-weight:bold"><?php echo $dictionary['address']; ?>: </span>
                                                <p id="infoAddressStaff"></p>
                                            </li>
                                            <li class="small">
                                                <span class="fa-li"><i class="far fa-envelope text-muted"></i></span>
                                                <span style="font-weight:bold"><?php echo $dictionary['email']; ?>: </span>
                                                <p id="infoEmailStaff"></p>
                                            </li>
                                            <li class="small">
                                                <span class="fa-li"><i class="fas fa-file-signature text-muted"></i></span>
                                                <span style="font-weight:bold"><?php echo $dictionary['hireDate']; ?>: </span>
                                                <p id="infoHiredateStaff"></p>
                                            </li>
                                            <li class="small">
                                                <span class="fa-li"><i class="fas fa-calendar-alt text-muted"></i></span>
                                                <span style="font-weight:bold"><?php echo $dictionary['createAt']; ?>: </span>
                                                <p id="infoCreateStaff"></p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- modal edit staff -->
<div class="modal fade" id="modalEditStaff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="undefined" draggable="undefined">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b><i class="far fa-edit"></i> <?php echo $dictionary['edit']; ?></b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><b><i class="far fa-times-circle"></i></b></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="align-self-center">

                    <div class="form-row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="inputEditStaffName"><?php echo $dictionary['firstName']; ?><span style="color: red;">*</span></label>
                            <!-- input name -->
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                </div>
                                <input type="text" class="form-control" id="inputEditStaffId" hidden>
                                <input type="text" class="form-control" id="inputEditStaffName">
                            </div>
                        </div>
                        <!-- input last name -->
                        <div class="form-group col-md-6">
                            <label for="inputEditStaffLastName"><?php echo $dictionary['lastName']; ?><span style="color: red;">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                </div>
                                <input type="text" class="form-control" id="inputEditStaffLastName">
                            </div>
                        </div>
                        <!-- input code staff -->
                        <div class="form-group col-md-6">
                            <label for="inputEditCodeStaff"><?php echo $dictionary['codeStaff']; ?><span style="color: red;">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
                                </div>
                                <input type="text" class="form-control" id="inputEditCodeStaff">
                            </div>
                        </div>
                        <!-- input email -->
                        <div class="form-group col-md-6">
                            <label for="inputEditEmail"><?php echo $dictionary['email']; ?><span style="color: red;">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                </div>
                                <input type="email" class="form-control" id="inputEditEmail">
                            </div>
                        </div>
                        <!-- input dni -->
                        <div class="form-group col-md-6">
                            <label for="inputEditDNI"><?php echo $dictionary['dni']; ?><span style="color: red;">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-passport"></i></span>
                                </div>
                                <input type="text" class="form-control" id="inputEditDNI">
                            </div>
                        </div>
                        <!-- input phone -->
                        <div class="form-group col-md-6">
                            <label for="inputEditPhone"><?php echo $dictionary['phone']; ?><span style="color: red;">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="tel" class="form-control" id="inputEditPhone" placeholder="+50577882244">
                            </div>
                        </div>
                        <!-- input birthdate -->
                        <div class="form-group col-md-6">
                            <label for="inputEditBIRTHDATE"><?php echo $dictionary['birthDate']; ?><span style="color: red;">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" id="inputEditBIRTHDATE" placeholder="<?php echo $dictionary['formatDate']; ?>">
                            </div>
                        </div>
                        <!-- input hiredate -->
                        <div class="form-group col-md-6">
                            <label for="inputEditHIREDATE"><?php echo $dictionary['hireDate']; ?><span style="color: red;">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" id="inputEditHIREDATE" placeholder="<?php echo $dictionary['formatDate']; ?>">
                            </div>
                        </div>
                        <!-- Pais -->
                        <div class="form-group col-md-6">
                            <label for="selectEditCountry"><?php echo $dictionary['country']; ?><span style="color: red;">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                </div>
                                <select class="custom-select form-control" id="selectEditCountry"></select>
                            </div>
                        </div>
                        <!-- Departamento -->
                        <div class="form-group col-md-6">
                            <label for="selectEditDepartment"><?php echo $dictionary['department']; ?><span style="color: red;">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-city"></i></span>
                                </div>
                                <select class="custom-select form-control" id="selectEditDepartment"></select>
                            </div>
                        </div>
                        <!-- localidad -->
                        <div class="form-group col-md-6">
                            <label for="selectEditCity"><?php echo $dictionary['location']; ?><span style="color: red;">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                </div>
                                <select class="custom-select form-control" id="selectEditCity"></select>
                            </div>
                        </div>
                        <!-- direccion -->
                        <div class="form-group col-md-6">
                            <label for="inputEditADDRESS"><?php echo $dictionary['address']; ?><span style="color: red;">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
                                </div>
                                <input type="text" class="form-control" id="inputEditADDRESS">
                            </div>
                        </div>
                        <!-- roles -->
                        <div class="form-group col-md-6">
                            <label for="selectEditGroup"><?php echo $dictionary['rolGroup']; ?><span style="color: red;">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                                </div>
                                <select class="custom-select form-control" id="selectEditGroup"></select>
                            </div>
                        </div>
                        <!-- Status -->
                        <div class="form-group col-md-6">
                            <label for="selectEditStatus"><?php echo $dictionary['status']; ?><span style="color: red;">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-exclamation-circle"></i></span>
                                </div>
                                <select class="custom-select form-control" id="selectEditStatus"></select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-ban"></i> <?php echo $dictionary['cancel']; ?></button>
                        <button id="btnEditStaff" type="button" class="btn btn-success btn-sm"><i class="fas fa-check"></i> <?php echo $dictionary['update']; ?></button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>









<script src="js/staff.js"></script>
<script src="js/address.js"></script>
<script>
    $(document).ready(function() {
        listStaff();
        comboBox_Group();
        comboBox_Country();
        comboBox_EditCountry();
    });
</script>