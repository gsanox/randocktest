    <!-- 
        Simple container for the new user form and the datatable for view inserted users, 
        datatables created for testing purposes.
    -->
    
    <div class="row">
        <div class="center-div">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">New user</h3>
                    </div>
                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control" id="firstname" placeholder="Firstame" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control" id="lastname" placeholder="Lastname" required>
                            </div>
                            <button class="btn btn-default" id="newUser">Submit</button>
                        </form>
                    </div>
                    <div class="panel-footer" id="panelFooter"></div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="center-div">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">User list</h3>
                    </div>
                    <div class="panel-body">
                        <table id="example" class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Hash</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Hash</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    