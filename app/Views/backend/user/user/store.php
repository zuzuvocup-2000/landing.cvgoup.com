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
                    <form class="row" method="post" action="/">
                        <div class="col-9">
                            <div class="card">
                                <div class="card-block">
                                    <div class="form-group row">
                                        <div class="col-6 m-b-10">
                                            <label class="col-form-label">Họ và tên</label>
                                            <?php echo form_input('fullname', set_value('fullname', (isset($user['fullname'])) ? $user['fullname'] : ''), 'class="form-control " id="fullname" autocomplete="on"');?>
                                            <span class="messages"></span>
                                        </div>
                                        <div class="col-6 m-b-10">
                                            <label class="col-form-label">Số điện thoại</label>
                                            <?php echo form_input('phone', set_value('phone', (isset($user['phone'])) ? $user['phone'] : ''), 'class="form-control " id="phone" autocomplete="on"');?>
                                            <span class="messages"></span>
                                        </div>
                                        <div class="col-6 m-b-10">
                                            <label class="col-form-label">Email</label>
                                            <?php echo form_input('email', set_value('email', (isset($user['email'])) ? $user['email'] : ''), 'class="form-control " id="email" autocomplete="on"');?>
                                            <span class="messages"></span>
                                        </div>
                                        <div class="col-6 m-b-10">
                                            <label class="col-form-label">Mật khẩu</label>
                                            <?php echo form_password('password', set_value('password', (isset($user['password'])) ? $user['password'] : ''), 'class="form-control " id="password" autocomplete="on"');?>
                                            <span class="messages"></span>
                                        </div>
                                        <div class="col-6 m-b-10">
                                            <label class="col-form-label">Giới tính</label>
                                            <?php   
                                                $gender = [
                                                    -1 => 'Chọn giới tính',
                                                    0 => 'Nam',
                                                    1 => 'Nữ',
                                                    2 => 'Khác',
                                                ];
                                                echo form_dropdown('gender', $gender, set_value('gender', (isset($user['gender'])) ? $user['gender'] : -1),'class="form-control mr20 input-sm perpage filter" style="width:100%"');  
                                            ?>
                                            <span class="messages"></span>
                                        </div>
                                        <div class="col-6 m-b-10">
                                            <label class="col-form-label">Ngày sinh</label>
                                            <?php echo form_input('birthday', set_value('birthday', (isset($user['birthday'])) ? $user['birthday'] : ''), 'class="form-control " id="birthday" autocomplete="on"', 'date');?>
                                            <span class="messages"></span>
                                        </div>
                                        <div class="col-6 m-b-10">
                                            <label class="col-form-label">Địa chỉ</label>
                                            <?php echo form_input('address', set_value('address', (isset($user['address'])) ? $user['address'] : ''), 'class="form-control " id="address" autocomplete="on"');?>
                                            <span class="messages"></span>
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
                                            <span class="messages"></span>
                                        </div>
                                        <div class="col-6 m-b-10">
                                            <label class="col-form-label">Quận/Huyện</label>
                                            <select name="districtid" id="districtid" class="form-control m-b location">
                                                <option value="0">Chọn quận/huyện</option>
                                            </select>
                                            <span class="messages"></span>
                                        </div>
                                        <div class="col-6 m-b-10">
                                            <label class="col-form-label">Phường/Xã</label>
                                            <select name="wardid" id="wardid" class="form-control m-b location">
                                                <option value="0">Chọn phường/xã</option>
                                            </select>
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-block">
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>