<div class="card">
    <div class="card-header">
        <h5 class="card-header-text">Thông tin cá nhân</h5>
        <button id="edit-btn" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right">
            <i class="icofont icofont-edit"></i>
        </button>
    </div>
    <div class="card-block">
        <div class="view-info">
            <div class="row">
                <div class="col-lg-12">
                    <div class="general-info">
                        <div class="row">
                            <div class="col-lg-12 col-xl-6">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Họ và tên</th>
                                                <td><?php echo $user['fullname'] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Giới tính</th>
                                                <td><?php echo GENDER[$user['gender']] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Ngày sinh</th>
                                                <td><?php echo date('d/m/Y', strtotime($user['created_at'])) ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Số điện thoại</th>
                                                <td><?php echo $user['phone'] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email</th>
                                                <td>
                                                    <?php echo $user['email'] ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Địa chỉ</th>
                                                <td>
                                                    <?php echo $user['address'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Phường/Xã</th>
                                                <td><?php echo $user['ward_name'] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Quận/Huyện</th>
                                                <td><?php echo $user['district_name'] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tỉnh/Thành phố</th>
                                                <td><?php echo $user['province_name'] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Ảnh đại diện</th>
                                                <td><a href="<?php echo $user['image'] ?>" target="_blank">Tại đây</a></td>
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
        <div class="edit-info">
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="" class="general-info">
                        <div class="row">
                            <div class="col-lg-6">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icofont icofont-user"></i></span>
                                                    <?php echo form_input('fullname', set_value('fullname', (isset($user['fullname'])) ? $user['fullname'] : ''), 'class="form-control '.(isset($validate['fullname']) ? 'border-danger' : '').'" id="fullname" autocomplete="on" ');?>
                                                </div>
                                                <div class="messages text-danger"><?php echo isset($validate['fullname']) ? $validate['fullname'] : '' ?></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php   
                                                    echo form_dropdown('gender', GENDER, set_value('gender', (isset($user['gender'])) ? $user['gender'] : -1),'class="form-control mr20 input-sm perpage filter" style="width:100%"');  
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icofont icofont-ui-calendar"></i></span>
                                                    <?php echo form_input('birthday', set_value('birthday', (isset($user['birthday'])) ? $user['birthday'] : ''), 'class="form-control " id="birthday" autocomplete="on"', 'date');?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icofont icofont-ui-cell-phone"></i></span>
                                                    <?php echo form_input('phone', set_value('phone', (isset($user['phone'])) ? $user['phone'] : ''), 'class="form-control " id="phone" autocomplete="on"');?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icofont icofont-email"></i></span>
                                                    <?php echo form_input('email', set_value('email', (isset($user['email'])) ? $user['email'] : ''), 'class="form-control '.(isset($validate['email']) ? 'border-danger' : '').'" id="email" autocomplete="on" '.(isset($user) ? 'readonly' : ''));?>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icofont icofont-location-pin"></i></span>
                                                    <?php echo form_input('address', set_value('address', (isset($user['address'])) ? $user['address'] : ''), 'class="form-control " id="address" autocomplete="on"');?>
                                                </div>
                                            </td>
                                        </tr>
                                        <script>
                                            var cityid = '<?php echo (isset($_POST['cityid'])) ? $_POST['cityid'] : ((isset($user['cityid'])) ? $user['cityid'] : ''); ?>';
                                            var districtid = '<?php echo (isset($_POST['districtid'])) ? $_POST['districtid'] : ((isset($user['districtid'])) ? $user['districtid'] : ''); ?>'
                                            var wardid = '<?php echo (isset($_POST['wardid'])) ? $_POST['wardid'] : ((isset($user['wardid'])) ? $user['wardid'] : ''); ?>'
                                        </script>
                                        <tr>
                                            <td>
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
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="districtid" id="districtid" class="form-control m-b location">
                                                    <option value="0">Chọn quận/huyện</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="wardid" id="wardid" class="form-control m-b location">
                                                    <option value="0">Chọn phường/xã</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icofont icofont-file-image"></i></span>
                                                    <?php echo form_input('image', set_value('image', (isset($user['image'])) ? $user['image'] : ''), 'class="form-control ckfinder-input" id="image" autocomplete="on"');?>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="update" value="update" class="btn btn-primary waves-effect waves-light m-r-20">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>