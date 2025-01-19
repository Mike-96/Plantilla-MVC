<!-- header view page -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-sitemap"></i> Staff</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Administrations</li>
                    <li class="breadcrumb-item active">Staff</li>
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
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-th-large"></i>
                            Add Staff
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
                                    <label for="inputStaffName">FIRTS NAME <span style="color: red;">*</span></label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputStaffName" placeholder="Enter Firts Name">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputStaffLastName">LAST NAME <span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputStaffLastName" placeholder="Enter Last Name">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCodeStaff">CODE STAFF <span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputCodeStaff" placeholder="Enter Code">
                                        <span class="input-group-append">
                                            <button id="openGenerateCodeStaff" type="button" class="btn btn-info"><i class="fas fa-random"></i> Generate</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail">EMAIL <span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputDNI">DNI <span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputDNI" placeholder="Enter DNI">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPhone">PHONE <span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="tel" class="form-control" id="inputPhone" placeholder="+50577882244">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputBIRTHDATE">BIRTHDATE <span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputBIRTHDATE" placeholder="yyyy/mm/dd">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputADDRESS">ADDRESS <span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputADDRESS" placeholder="Enter Code">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCITY">CITY <span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputCITY" placeholder="Enter City">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCOUNTRY">COUNTRY <span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputCOUNTRY" placeholder="Enter Country">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="selectGroup">GROUP <span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                                        </div>
                                        <select class="custom-select form-control" id="selectGroup"></select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputHIREDATE">HIRE DATE <span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputHIREDATE" placeholder="yyyy/mm/dd">
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <button type="button" class="btn btn-danger"><i class="fas fa-ban"></i> Cancel</button>
                                    <button id="btnCreateStaff" type="button" class="btn btn-success"><i class="fas fa-check"></i> CREATE</button>
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
<div class="modal fade" id="modalGenerateCodeStaff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" draggable="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b><i class="fas fa-filter"></i> Options</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><b><i class="far fa-times-circle"></i></b></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="align-self-center">

                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="letters">
                            <label class="custom-control-label" for="letters">Add a letter at the beginning of the code?</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" checked="" class="custom-control-input" id="numbers">
                            <label class="custom-control-label" for="numbers">Include numbers</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputlong">Code length <span style="color: red;">*</span></label>
                        <input type="number" class="form-control" id="inputlong" placeholder="Enter the code size" value="7">

                    </div>

                </div>
            </div>

            <div class="modal-footer justify-content-between">  
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
                <button id="btnGenerateCodeStaff" type="button" class="btn btn-success"><i class="fas fa-check"></i> Generate</button>
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
    });
</script>