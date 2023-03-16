<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4><?php echo $title ?></h4>
                                    <span>Thông tin danh sách tài khoản đăng nhập vào hệ thống.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="/backend/dashboard/dashboard/index"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><span>Quản lý tài khoản</span></li>
                                    <li class="breadcrumb-item"><a href="/backend/user/user/index"><?php echo $title ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="card">
                        <div class="card-block">
                            <form class="row" method="get">
                                <div class="col-sm-6">
                                    <div class="d-flex">
                                        <select name="perpage" style="width: 150px;" class="form-control input-sm perpage filter mr10">
                                            <option value="20">20 bản ghi</option>
                                            <option value="30">30 bản ghi</option>
                                            <option value="40">40 bản ghi</option>
                                            <option value="50">50 bản ghi</option>
                                            <option value="60">60 bản ghi</option>
                                            <option value="70">70 bản ghi</option>
                                            <option value="80">80 bản ghi</option>
                                            <option value="90">90 bản ghi</option>
                                            <option value="100">100 bản ghi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex">
                                        <div class="input-group input-group-button m-r-15">
                                            <input type="text" class="form-control" placeholder="Nhập từ khóa để tìm kiếm...">
                                            <span class="input-group-addon btn btn-primary" id="basic-addon10">
                                                <span class="">Tìm kiếm</span>
                                            </span>
                                        </div>
                                        <a href="/backend/user/user/create" class="btn btn-warning">Thêm mới<i class="fa fa-user-plus m-l-10"></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-styling">
                                    <thead>
                                        <tr class="table-primary">
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
