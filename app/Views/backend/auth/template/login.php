<section class="login-block">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <form class="md-float-material form-material" action="" method="post">
                    <div class="text-center">
                        <img src="/public/backend/img/logo.png" alt="logo.png" style="width: 200px;" />
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center"><?php echo $title ?></h3>
                                </div>
                            </div>
                            <div class="form-group form-primary">
                                <input type="text" name="email" class="form-control <?php echo isset($validate['email']) ? 'border-danger' : '' ?>" required="" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" placeholder="Email " />
                                <div class="form-bar text-danger m-t-10"><?php echo isset($validate['email']) ? $validate['email'] : '' ?></div>
                            </div>
                            <div class="form-group form-primary">
                                <input type="password" name="password" autocomplete="off" class="form-control <?php echo isset($validate['password']) ? 'border-danger' : '' ?>" required="" placeholder="Mật khẩu " />
                                <div class="form-bar text-danger m-t-10"><?php echo isset($validate['password']) ? $validate['password'] : '' ?></div>
                            </div>
                            <div class="row m-t-25 text-left">
                                <div class="col-12">
                                    <div class="checkbox-fade fade-in-primary d-">
                                        <label>
                                            <input type="checkbox" name="remember" value="1" />
                                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            <span class="text-inverse">Lưu đăng nhập</span>
                                        </label>
                                    </div>
                                    <div class="forgot-phone text-right f-right">
                                        <a href="<?php echo base_url('admin/forgot-password') ?>" class="text-right f-w-600"> Quên mật khẩu?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Đăng nhập</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>