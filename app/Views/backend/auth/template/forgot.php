<link rel="stylesheet" type="text/css" href="/public/backend/files/assets/css/login.css" />
<div class="limiter">
    <div class="container-login100 container-login-admin">
        <div id="particles-line"></div>
        <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
            <form class="login100-form validate-form flex-sb flex-w" action="" method="post">
                <span class="login100-form-title ">
                    <?php echo $title ?>
                </span>

                <div class="p-t-31 p-b-9">
                    <span class="txt1">
                        Tài khoản
                    </span>
                    <span class="form-bar text-danger "><?php echo isset($validate['email']) ? $validate['email'] : '' ?></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Username is required">
                    <input type="text" name="email" class="input100" required="" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" placeholder="Email " />
                    <span class="focus-input100"></span>
                </div>
                <div class="container-login100-form-btn m-t-17">
                    <button class="login100-form-btn" type="submit">
                        Gửi mã OTP
                    </button>
                </div>

                <div class="w-full text-center p-t-55">
                    <span class="txt2">
                        Bạn đã có tài khoản?
                    </span>

                    <a href="<?php echo base_url('admin') ?>" class="txt2 bo1">
                        Đăng nhập
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="/public/backend/files/assets/js/particles.min.js"></script>
