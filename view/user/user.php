<?php
require_once '../../assets/dictionary.php';
?>


<!-- header view page -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <p><i class="fas fa-user"></i> <?php echo $title['users']; ?></p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><?php echo $routers['users']; ?></li>
                    <li class="breadcrumb-item active"><?php echo $routers['listUsers']; ?></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- card add user -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger card-outline collapsed-card">
                    <div class="card-header" type="button" class="btn btn-tool" data-card-widget="collapse">
                        <h3 class="card-title">
                            <i class="fas fa-user-plus"></i> <?php echo $dictionary['add']; ?>
                        </h3>
                        <div class="card-tools" id="addUser">
                            <button id="btnCollapse" type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- </a> -->
                    <div class="card-body" style="display: none;">
                        <!-- Solo inpunt img -->
                        <div class="d-flex justify-content-center">
                            <div class="form-row col-md-10">
                                <!-- user img -->
                                <div class="form-group col-md-6">
                                    <label for=""><?php echo $dictionary['img']; ?></label>
                                    <!-- Example of a form that Dropzone can take over -->
                                    <form id="inputUserImg" class="dropzone mx-auto p-0"></form>
                                    <input type="hidden" id="userPhotoPath" name="userPhotoPath" value="">
                                </div>
                            </div>
                        </div>
                        <!-- Resto de inpunts -->
                        <div class="d-flex justify-content-center">

                            <div class="form-row col-md-10">
                                <!-- staff -->
                                <div class="form-group col-md-6">
                                    <label for="inputUserStaff"><?php echo $dictionary['staff']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputUserIdStaff" disabled hidden>
                                        <input type="text" class="form-control" id="inputUserStaff" disabled>
                                        <span class="input-group-append">
                                            <button id="openFindUserStaff" type="button" class="btn btn-info"><i class="fas fa-search"></i> <?php echo $dictionary['find']; ?></button>
                                        </span>
                                    </div>
                                </div>
                                <!-- user name -->
                                <div class="form-group col-md-6">
                                    <label for="inputUserName"><?php echo $dictionary['userName']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputUserName">
                                    </div>
                                </div>
                                <!-- account -->
                                <div class="form-group col-md-6">
                                    <label for="inputUserAccount"><?php echo $dictionary['account']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sign-in-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputUserAccount">
                                    </div>
                                </div>
                                <!-- password -->
                                <div class="form-group col-md-6">
                                    <label for="inputUserPassword"><?php echo $dictionary['password']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" class="form-control" id="inputUserPassword">
                                        <div class="input-group-append">
                                            <button id="togglePassword" type="button" class="input-group-text btn btn-sm"><i class="fas fa-eye"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- raw password -->
                                <div class="form-group col-md-6">
                                    <label for="inputUserRawPassword"><?php echo $dictionary['repeatPassword']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" class="form-control" id="inputUserRawPassword">
                                        <div class="input-group-append">
                                            <button id="togglePassword2" type="button" class="input-group-text btn btn-sm"><i class="fas fa-eye"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- roles -->
                                <div class="form-group col-md-6">
                                    <label for="selectUserRol"><?php echo $dictionary['rolGroup']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                                        </div>
                                        <select class="custom-select form-control" id="selectUserRol"></select>
                                    </div>
                                </div>
                                <!-- Status -->
                                <div class="form-group col-md-6">
                                    <label for="selectUserStatus"><?php echo $dictionary['status']; ?><span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-exclamation-circle"></i></span>
                                        </div>
                                        <select class="custom-select form-control" id="selectUserStatus"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <div class="col-md-10">
                                <button id="btnCancelCreateUser" type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-ban"></i> <?php echo $dictionary['cancel']; ?></button>
                                <button id="btnCreateUser" type="button" class="btn btn-success btn-sm"><i class="fas fa-check"></i> <?php echo $dictionary['create']; ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>

<!-- modal view staff -->
<div class="modal fade" id="modalViewStaff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="undefined" draggable="undefined">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b><i class="fas fa-info-circle"></i> <?php echo $title['staffLis']; ?></b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="undefined"><b><i class="far fa-times-circle"></i></b></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="align-self-center">

                    <div class="col-12 d-flex align-items-stretch flex-column">
                        <div class="col-lg-12 table-responsive">

                            <table id="tblViewStaff" class="display responsive" style="width:100%">
                                <thead class="bg-secondary">
                                    <tr>
                                        <th><?php echo $dictionary['number'] ?></th>
                                        <th><?php echo $dictionary['code'] ?></th>
                                        <th><?php echo $dictionary['staff'] ?></th>
                                        <th><?php echo $dictionary['jobTitle'] ?></th>
                                        <th><?php echo $dictionary['select'] ?></th>
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
    </div>
</div>

<!-- modal edit password-->
<div class="modal fade" id="modalEditPasswordUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="undefined" draggable="undefined">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b><i class="fas fa-exchange-alt"></i> <?php echo $dictionary['changePassword']; ?></b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="undefined"><b><i class="far fa-times-circle"></i></b></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="align-self-center">

                    <div class="form-row col-md-12">
                        <!-- password -->
                        <div class="form-group col-md-12">
                            <label for="inputEditUserPassword"><?php echo $dictionary['newPassword']; ?><span style="color: red;">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="text" id="inputEditUserIdPassword" hidden>
                                <input type="password" class="form-control" id="inputEditUserPassword">
                                <div class="input-group-append">
                                    <button id="toggleEditPassword" type="button" class="input-group-text btn btn-sm"><i class="fas fa-eye"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- raw password -->
                        <div class="form-group col-md-12">
                            <label for="inputEditUserRawPassword"><?php echo $dictionary['repeatPassword']; ?><span style="color: red;">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" id="inputEditUserRawPassword">
                                <div class="input-group-append">
                                    <button id="toggleEditPassword2" type="button" class="input-group-text btn btn-sm"><i class="fas fa-eye"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button id="btnCancelChangePassword" type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-ban"></i> <?php echo $dictionary['cancel']; ?></button>
                        <button id="btnEditPasswordUser" type="button" class="btn btn-success btn-sm"><i class="fas fa-check"></i> <?php echo $dictionary['update']; ?></button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- modal cambiar rol -->
<div class="modal fade" id="modalCambiarRolUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="undefined" draggable="undefined">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b><i class="fas fa-exchange-alt"></i> <?php echo $dictionary['changeRol']; ?></b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="undefined"><b><i class="far fa-times-circle"></i></b></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="align-self-center">

                    <div class="form-row col-md-12">
                        <!-- roles -->
                        <div class="form-group col-md-12">
                            <label for="selectEditUserRol"><?php echo $dictionary['rolGroup']; ?><span style="color: red;">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                                </div>
                                <input type="text" id="inputEditUserIdSelectRol" hidden>
                                <select class="custom-select form-control" id="selectEditUserRol"></select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-ban"></i> <?php echo $dictionary['cancel']; ?></button>
                        <button id="btnEditRolUser" type="button" class="btn btn-success btn-sm"><i class="fas fa-check"></i> <?php echo $dictionary['update']; ?></button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>




<!-- card list user -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-address-card"></i>
                            <?php echo $title['listUsers']; ?>
                        </h3>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link active btn-sm" href="#list-users" data-toggle="tab"><?php echo $dictionary['list'] ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn-sm" href="#box-users" data-toggle="tab"><?php echo $dictionary['card'] ?></a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <!-- Morris chart - Sales -->
                            <div class="tab-pane active" id="list-users" style="position: relative;">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table id="table_user" class="display cell-border" style="width:100%">
                                            <thead class="bg-secondary color-palette-set">
                                                <tr>
                                                    <th><?php echo $dictionary['number'] ?></th>
                                                    <th><?php echo $dictionary['userName'] ?></th>
                                                    <th><?php echo $dictionary['account'] ?></th>
                                                    <th><?php echo $dictionary['rolGroup'] ?></th>
                                                    <th><?php echo $dictionary['relatedStaff'] ?></th>
                                                    <th><?php echo $dictionary['status'] ?></th>
                                                    <th><?php echo $dictionary['lastLogin'] ?></th>
                                                    <th><?php echo $dictionary['actions'] ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <div class="chart tab-pane" id="box-users" style="position: relative; height: 300px;">
                                <h1>Papiriiiiinnnn </h1>
                            </div>
                        </div>
                    </div><!-- /.card-body -->
                </div>

            </div>

        </div>
    </div>
</section>

<script src="js/users.js"></script>
<script src="js/dropzone.js"></script>
<script>
    $(document).ready(function() {
        listUser();
        listViewStaff();
        listComboBox();
        comboBox_Rol();
    });
</script>