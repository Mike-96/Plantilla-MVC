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
                        <div class="d-flex justify-content-center">
                            <div class="align-self-center col-md-10">

                                <div class="form-group">
                                    <label for="inputUserName"><?php echo $dictionary['userName']; ?><span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="inputUserName" placeholder="Enter UserName" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail"><?php echo $dictionary['account']; ?><span style="color: red;">*</span></label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Enter email" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword"><?php echo $dictionary['password']; ?><span style="color: red;">*</span></label>
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label for="repeatInputPassword"><?php echo $dictionary['repeatPassword']; ?><span style="color: red;">*</span></label>
                                    <input type="password" class="form-control" id="repeatInputPassword" placeholder="Repeat Password" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile"><?php echo $dictionary['rolGroup']; ?><span style="color: red;">*</span></label>
                                    <select class="custom-select rounded-0" id="exampleSelectRounded0">
                                        <option>Value 1</option>
                                        <option>Value 2</option>
                                        <option>Value 3</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> <?php echo $dictionary['cancel']; ?></button>
                                <button type="button" class="btn btn-success btn-sm"><i class="fas fa-check"></i> <?php echo $dictionary['create']; ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

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
<script>
    $(document).ready(function() {
        list_user();
    });
</script>