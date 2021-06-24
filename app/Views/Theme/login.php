<?php $this->extend('Templates/head'); ?>


<?= $this->section("body") ?>

<br><br>
<div class="container col-lg-4 ">

    <div class="card text-white" style="background-color: #302c4c;">
        <div class="card-body ">
            <form action="<?= base_url('login_db') ?>" method="post">
                <h4 class="text-warning text-center"><b>ยินดีต้อนรับเข้าสู่ webboard</b></h4>
                <br>
                <?php if (isset($validation)) : ?>
                    <div class="py-1 rounded alert-danger">
                        <h5 class="text-center">
                            <?= $validation->listErrors() ?>
                        </h5>
                    </div>
                <?php endif; ?>

                <?php if (session("success")) : ?>
                    <div class="py-1 rounded alert-danger">
                        <h5 class="text-center">
                            <?php echo session("success"); ?>
                        </h5>
                    </div>
                <?php endif; ?>

                
                <br>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" id="user_username" value="" name="user_username" placeholder="username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" id="user_password" value="" name="user_password" placeholder="Password" required>
                </div>
                <br>
                <div class="d-grid gap-2">
                    <button type="submit" name="login_user" class="btn btn-warning"><b>เข้าใช้งาน</b></button>
                </div>
            </form>

            <br>
            <hr>
            <div class="d-grid gap-2">
                <div id="emailHelp" class="form-text text-light">ฉันต้องการเป็นสมาชิก webboard</div>
                <a href="<?= base_url('register') ?>" class="btn btn-success"><b>สมัครเลย</b></a>
            </div>

        </div>
    </div>
</div>

<br><br><br><br><br><br>
<?php echo $this->include('Templates/footer'); ?>

<?= $this->endSection() ?>