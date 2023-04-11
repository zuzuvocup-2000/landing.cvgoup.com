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
                                        <a href="<?php echo base_url('backend/dashboard/dashboard/index') ?>"><i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><span>Quản lý tài khoản</span></li>
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('backend/user/user/index') ?>"><?php echo $title ?></a></li>
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
                                            <input type="text" class="form-control" name="search" placeholder="Nhập từ khóa để tìm kiếm...">
                                            <button type="submit" class="input-group-addon btn btn-primary" id="basic-addon10">
                                                <span class="">Tìm kiếm</span>
                                            </button>
                                        </div>
                                        <a href="<?php echo base_url('backend/user/user/create') ?>" class="btn btn-warning">Thêm mới<i class="fa fa-user-plus m-l-10"></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-styling">
                                    <thead>
                                        <tr class="table-primary">
                                            <th class="text-center">#</th>
                                            <th>Họ và tên</th>
                                            <th>Email</th>
                                            <th class="text-center">Số điện thoại</th>
                                            <th class="text-center">Ngày sinh</th>
                                            <th class="text-center">Trạng thái</th>
                                            <th class="text-center">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($userList['data']) && is_array($userList['data']) && count($userList['data'])){ 
                                            foreach ($userList['data'] as $key => $value) {
                                        ?>
                                            <tr id="post-<?php echo $value['id'] ?>" data-id="<?php echo $value['id'] ?>" data-module="<?php echo $module ?>">
                                                <th class="text-center">
                                                    <div class="checkbox-fade fade-in-primary m-r-0">
                                                        <label class="m-b-0">
                                                            <input type="checkbox" value="<?php echo $value['id'] ?>">
                                                            <span class="cr " style="margin-right: 0;">
                                                                <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </th>
                                                <td><?php echo $value['fullname'] ?></td>
                                                <td><?php echo $value['email'] ?></td>
                                                <td class="text-center"><?php echo $value['phone'] ?></td>
                                                <td class="text-center"><?php echo date('d/m/Y' , strtotime($value['birthday'])) ?></td>
                                                <td class="text-center"><?php echo $value['publish'] ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('backend/user/user/update/'.$value['id']) ?>" class="btn btn-success btn-icon">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button href="" class="btn btn-danger btn-icon delete-item" >
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <a href="" class="btn btn-info btn-icon">
                                                        <i class="fa fa-lock"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php }}else{ ?>
                                            <tr>
                                                <td colspan="100%" class="text-center"><span class="text-danger ">Không có dữ liệu phù hợp...</span></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php if(isset($userList['paginate'])){ ?>
                                    <div id="paginate">
                                        <?php echo $userList['paginate'] ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
