<div class="card">
    <div class="card-header">
        <h5 class="card-header-text">Đổi mật khẩu</h5>
    </div>
    <div class="card-block">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="" class="general-info">
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <label for="">Mật khẩu cũ</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icofont icofont-lock"></i></span>
                                                <?php echo form_password('old-password', '', 'class="form-control '.(isset($validate['old-password']) ? 'border-danger' : '').'" id="old-password" autocomplete="on" ');?>
                                            </div>
                                            <div class="messages text-danger"><?php echo isset($validate['old-password']) ? $validate['old-password'] : '' ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Mật khẩu mới</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icofont icofont-lock"></i></span>
                                                <?php echo form_password('re_password', '', 'class="form-control '.(isset($validate['re_password']) ? 'border-danger' : '').'" id="re_password" autocomplete="on" ');?>
                                            </div>
                                            <div class="messages text-danger"><?php echo isset($validate['re_password']) ? $validate['re_password'] : '' ?></div>
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
                                            <label for="">Nhập lại mật khẩu</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icofont icofont-lock"></i></span>
                                                <?php echo form_password('password', '', 'class="form-control '.(isset($validate['password']) ? 'border-danger' : '').'" id="password" autocomplete="on" ');?>
                                            </div>
                                            <div class="messages text-danger"><?php echo isset($validate['password']) ? $validate['password'] : '' ?></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="reset" value="reset" class="btn btn-primary waves-effect waves-light m-r-20">Đổi mật khẩu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>