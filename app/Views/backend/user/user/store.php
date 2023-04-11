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
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url('backend/dashboard/dashboard/index') ?>"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><span>Quản lý tài khoản</span></li>
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('backend/user/user/index') ?>"><?php echo $title ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <form class="row" method="post" action="" enctype="multipart/form-data">
                        <div class="col-9">
                            <div class="card">
                                <div class="card-block">
                                    <div class="form-group row">
                                        <div class="col-6 m-b-10">
                                            <label class="col-form-label">Họ và tên <strong class="text-danger">(*)</strong></label>
                                            <?php echo form_input('fullname', set_value('fullname', (isset($user['fullname'])) ? $user['fullname'] : ''), 'class="form-control '.(isset($validate['fullname']) ? 'border-danger' : '').'" id="fullname" autocomplete="on" ');?>
                                            <span class="messages text-danger"><?php echo isset($validate['fullname']) ? $validate['fullname'] : '' ?></span>
                                        </div>
                                        <div class="col-6 m-b-10">
                                            <label class="col-form-label">Số điện thoại</label>
                                            <?php echo form_input('phone', set_value('phone', (isset($user['phone'])) ? $user['phone'] : ''), 'class="form-control " id="phone" autocomplete="on"');?>
                                        </div>
                                        <div class="col-6 m-b-10">
                                            <label class="col-form-label">Email <strong class="text-danger">(*)</strong></label>
                                            <?php echo form_input('email', set_value('email', (isset($user['email'])) ? $user['email'] : ''), 'class="form-control '.(isset($validate['email']) ? 'border-danger' : '').'" id="email" autocomplete="on" '.(isset($user) ? 'readonly' : ''));?>
                                            <span class="messages text-danger"><?php echo isset($validate['email']) ? $validate['email'] : '' ?></span>
                                        </div>
                                        <?php if(!isset($user)){ ?>
                                            <div class="col-6 m-b-10">
                                                <label class="col-form-label">Mật khẩu <strong class="text-danger">(*)</strong></label>
                                                <?php echo form_password('password', '', 'class="form-control '.(isset($validate['password']) ? 'border-danger' : '').'" autocomplete="on" ');?>
                                                <span class="messages text-danger"><?php echo isset($validate['password']) ? $validate['password'] : '' ?></span>
                                            </div>
                                        <?php } ?>
                                        <div class="col-6 m-b-10">
                                            <label class="col-form-label">Giới tính</label>
                                            <?php   
                                                echo form_dropdown('gender', GENDER, set_value('gender', (isset($user['gender'])) ? $user['gender'] : -1),'class="form-control mr20 input-sm perpage filter" style="width:100%"');  
                                            ?>
                                        </div>
                                        <div class="col-6 m-b-10">
                                            <label class="col-form-label">Ngày sinh</label>
                                            <?php echo form_input('birthday', set_value('birthday', (isset($user['birthday'])) ? $user['birthday'] : ''), 'class="form-control " id="birthday" autocomplete="on"', 'date');?>
                                        </div>
                                        <div class="col-6 m-b-10">
                                            <label class="col-form-label">Địa chỉ</label>
                                            <?php echo form_input('address', set_value('address', (isset($user['address'])) ? $user['address'] : ''), 'class="form-control " id="address" autocomplete="on"');?>
                                        </div>
                                        <script>
                                            var cityid = '<?php echo (isset($_POST['cityid'])) ? $_POST['cityid'] : ((isset($user['cityid'])) ? $user['cityid'] : ''); ?>';
                                            var districtid = '<?php echo (isset($_POST['districtid'])) ? $_POST['districtid'] : ((isset($user['districtid'])) ? $user['districtid'] : ''); ?>'
                                            var wardid = '<?php echo (isset($_POST['wardid'])) ? $_POST['wardid'] : ((isset($user['wardid'])) ? $user['wardid'] : ''); ?>'
                                        </script>
                                        <div class="col-6 m-b-10">
                                            <label class="col-form-label">Tỉnh/Thành phố</label>
                                            <?php 
                                                $provinceRepo = new \App\Repositories\ProvinceRepository();
                                                $city = $provinceRepo->getAllProvince();
                                                $city = convert_array([
                                                    'data' => $city,
                                                    'field' => 'provinceid',
                                                    'value' => 'name',
                                                    'text' => 'tỉnh/thành phố',
                                                ]);
                                            ?>
                                            <?php echo form_dropdown('cityid', $city, set_value('cityid', (isset($user['cityid'])) ? $user['cityid'] : 0), 'class="form-control m-b"  id="cityid"');?>
                                        </div>
                                        <div class="col-6 m-b-10">
                                            <label class="col-form-label">Quận/Huyện</label>
                                            <select name="districtid" id="districtid" class="form-control m-b location">
                                                <option value="0">Chọn quận/huyện</option>
                                            </select>
                                        </div>
                                        <div class="col-6 m-b-10">
                                            <label class="col-form-label">Phường/Xã</label>
                                            <select name="wardid" id="wardid" class="form-control m-b location">
                                                <option value="0">Chọn phường/xã</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn-primary btn float-right">Lưu</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <h4 class="sub-title">Trạng thái hoạt động</h4>
                                            <div class="form-radio">
                                                <div class="radio radio-inline">
                                                    <label>
                                                        <?php echo form_radio('publish', 1, (isset($user['publish']) && $user['publish'] == 1 ? true : (isset($user['publish']) && $user['publish'] == 0 ? false : true)), ''); ?>
                                                        <i class="helper"></i>Hoạt động
                                                    </label>
                                                </div>
                                                <div class="radio radio-inline">
                                                    <label>
                                                        <?php echo form_radio('publish', 0, (isset($user['publish']) && $user['publish'] == 0 ? true : false), ''); ?>
                                                        <i class="helper"></i>Khóa tài khoản
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <h4 class="sub-title">Ảnh đại diện</h4>
                                            <div class="img-hover">
                                                <img class="img-fluid img-radius img-avatar-ckfinder" src="<?php echo isset($_POST['image']) ? $_POST['image'] : (isset($user['image']) ? $user['image'] : SELECT_IMAGE)  ?>" alt="round-img" style="width: 100%; object-fit: scale-down;">
                                                <?php echo form_input('image', set_value('image', (isset($user['image'])) ? $user['image'] : ''), ' class="input-hidden-ckfinder d-none"');?>
                                                <div class="img-overlay img-radius">
                                                    <span>
                                                        <a class="btn btn-sm btn-primary change-image-ckfinder" data-popup="lightbox"><i class="fa fa-upload"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>