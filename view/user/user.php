<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-user"></i> Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                    <li class="breadcrumb-item active">User List</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger card-outline collapsed-card">
                    <!-- <a class="btn" data-card-widget="collapse" style="text-decoration:none;"> -->
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-user-plus"></i>
                            Add User
                        </h3>
                        <div class="card-tools">
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
                                    <label for="inputUserName">USERNAME <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="inputUserName" placeholder="Enter UserName" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">EMAIL <span style="color: red;">*</span></label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Enter email" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">PASSWORD <span style="color: red;">*</span></label>
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label for="repeatInputPassword">REPEAT PASSWORD <span style="color: red;">*</span></label>
                                    <input type="password" class="form-control" id="repeatInputPassword" placeholder="Repeat Password" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">GROUP <span style="color: red;">*</span></label>
                                    <select class="custom-select rounded-0" id="exampleSelectRounded0">
                                        <option>Value 1</option>
                                        <option>Value 2</option>
                                        <option>Value 3</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-danger"><i class="fas fa-ban"></i> Cancel</button>
                                <button type="button" class="btn btn-success"><i class="fas fa-check"></i> CREATE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-address-card"></i>
                            User
                        </h3>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#list-users" data-toggle="tab">User List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#box-users" data-toggle="tab">User Box</a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <!-- Morris chart - Sales -->
                            <div class="chart tab-pane active" id="list-users" style="position: relative;">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table id="table_user" class="display cell-border" style="width:100%">
                                            <thead class="bg-navy color-palette-set">
                                                <tr>
                                                    <th>#ID</th>
                                                    <th>User</th>
                                                    <th>Email</th>
                                                    <th>Rol Name</th>
                                                    <th>Relationship with staff</th>
                                                    <th>Status</th>
                                                    <th>Last Login</th>
                                                    <th>Edit</th>
                                                    <th>Activate</th>
                                                    <th>Desactivate</th>
                                                    <th>Reset Password</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <div class="chart tab-pane" id="box-users" style="position: relative; height: 300px;">
                                <h1>yea</h1>
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