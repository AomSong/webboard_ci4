<?php $this->extend('Templates/head'); ?>


<?= $this->section("body") ?>
<br><br>
<div class="container col-lg-4 ">

    <div class="card text-white" style="background-color: #302c4c;">
        <div class="card-body ">
            <form class="row g-3" action="<?= base_url('register_db') ?>" method="post">
                <h4 class="text-warning text-center"><b>สมัคร webboard</b></h4>
                <br>
                <br>
                <?php if (isset($validation)) : ?>
                    <div class="py-1 rounded alert-danger">
                        <h5 class="text-center">
                            <?= $validation->listErrors() ?>
                        </h5>
                    </div>
                <?php endif; ?>

                <div class="col-sm-6">
                    <label class="form-label">Firstname</label>
                    <input type="text" class="form-control" name="user_firstname" id="user_firstname" placeholder="Firstname" autocomplete="off" required>
                </div>
                <div class="col-sm-6">
                    <label class="form-label">Lastname</label>
                    <input type="text" class="form-control" name="user_lastname" id="user_lastname" placeholder="Lastname" autocomplete="off" required>
                </div>
                <div class="col-sm-12">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email address" autocomplete="off" required>
                </div>
                <div class="col-sm-12">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="user_username" id="user_username" placeholder="Username" autocomplete="off" required>
                </div>
                <div class="col-sm-12">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="user_password" id="user_password" placeholder="Password" required>
                </div>
                <div class="col-sm-12">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="user_password_Confirm" id="user_password" placeholder="Password" required>
                </div>
                <br><br><br><br>
                <div class="d-grid gap-2">
                    <button type="submit" name="reg_user" class="btn btn-success"><b>ยืนยันการสมัคร</b></button>
                </div>
            </form>
            <hr>
            <div class="d-grid gap-2">
                <div id="emailHelp" class="form-text text-light">เข้าใช้งานระบบ
                    <a href="login.php" class="text-light fw-light">login?</a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php echo $this->include('Templates/footer'); ?>

<?= $this->endSection() ?>