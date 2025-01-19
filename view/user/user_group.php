<!-- header view page -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-users"></i> Group</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                    <li class="breadcrumb-item active">User Group</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- create group -->
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card card-danger card-outline collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-th-large"></i>
                            Add Group
                        </h3>
                        <div class="card-tools" id="add">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: none;">

                        <div class="d-flex justify-content-center">
                            <div class="align-self-center col-md-10">

                                <div class="form-group">
                                    <label for="inputGroupName">GROUP NAME <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="inputGroupName" placeholder="Enter Group Name" oninput="renameSlug()">
                                </div>
                                <div class="form-group">
                                    <label for="inputSlug">SLUG <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="inputSlug" placeholder="Slug" style="text-transform:lowercase;" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="selectStatus">STATUS <span style="color: red;">*</span></label>
                                    <select class="custom-select form-control" id="selectStatus">
                                        <option value="1">ACTIVE</option>
                                        <option value="0">INACTIVE</option>
                                    </select>
                                </div>
                                <button id="btnCancelCreateGroup" type="button" class="btn btn-danger"><i class="fas fa-ban"></i> Cancel</button>
                                <button id="btnCreateRoleGroup" type="button" class="btn btn-success"><i class="fas fa-check"></i> CREATE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- list group in table -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-success card-outline">
            <div class="card-header">
                <h3 class="card-title" id="role_group">
                    <i class="fas fa-users-cog"></i>
                    Role Group
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <table id="list_group" class="display cell-border" style="width:100%">
                            <thead class="bg-navy">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Edit</th>
                                    <th>Activate</th>
                                    <th>Desactivate</th>
                                    <th>Delete</th>
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

<!-- modal edit group -->
<div class="modal fade" id="modalEditGroup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" draggable="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b><i class="fas fa-edit"></i> Edit Group</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><b><i class="far fa-times-circle"></i></b></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="align-self-center">

                    <div class="form-group">
                        <input type="text" class="form-control" id="inputIdGroup" disabled hidden>
                    </div>
                    <div class="form-group">
                        <label for="inputEditGroupName">GROUP NAME <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="inputEditGroupName" placeholder="Enter Group Name" oninput="renameSlugEdit()">
                    </div>
                    <div class="form-group">
                        <label for="inputEditSlug">SLUG <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="inputEditSlug" placeholder="Slug" style="text-transform:lowercase;" disabled>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button id="btnEditCancelCreateGroup" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
                <button id="btnEditCreateRoleGroup" type="button" class="btn btn-success"><i class="fas fa-check"></i> Save changes</button>
            </div>
        </div>
    </div>
</div>

















<script src="js/user_group.js"></script>
<script>
    $(document).ready(function() {
        ListUserGroup();
    });
</script>