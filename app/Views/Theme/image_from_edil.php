<?php $this->extend('Templates/head'); ?>


<?= $this->section("body") ?>
<section id="slider">
    <div class="carousel slide" data-bs-ride="carousel" id="mySlider">
        <ol class="carousel-indicators">
            <button data-bs-target="#mySlider" data-bs-slide-to="0" class="active"></button>
            <button data-bs-target="#mySlider" data-bs-slide-to="1"></button>
            <button data-bs-target="#mySlider" data-bs-slide-to="2"></button>
        </ol>
        <div class="carousel-inner ">
            <div class="carousel-item carousel-image-1 active sm" style="height: 200px; ">
                <img src="/uploads/pic1.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item carousel-image-2 " style="height: 200px;;">
                <img src="/uploads/pic2.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item carousel-image-3 " style="height: 200px;">
                <img src="/uploads/pic3.jpg" class="d-block w-100">
            </div>
            <button class="carousel-control-prev" data-bs-target="#mySlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" data-bs-target="#mySlider" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>

<div class="bg-dark ps-5 mb-0 py-2">>
    <a href="manageuser.php" class="text-light ps-5 ps-5 fw-light" style="text-decoration: none;">
        <i class="fas fa-user"></i> ข้อมูลส่วนตัว</a>
    <a class="text-light ps-1 fw-light" style="text-decoration: none;">
        <i class='fas fa-angle-double-right'></i> แก้ไขรูปภาพ</a>
</div>
<br>
<br>
<div class="container col-lg-4 ">

    <div class="card text-white" style="background-color: #302c4c;">
        <div class="card-body ">
            <form class="row g-3" action="<?= base_url('/user_edit_db') ?>" method="post">
                <input type="hidden" name="user_id" value="<?php echo $user_edit["user_id"]; ?>" />
                <h4 class="text-warning text-center"><b>แก้ไขรูปภาพ</b></h4>
                <br>
                <br>

                <div class="col-sm-6">
                    <label class="form-label">Firstname</label>
                    <input type="text" class="form-control" name="user_firstname" id="user_firstname" placeholder="Firstname" value="<?php echo $user_edit['user_firstname']; ?>" autocomplete="off" required>
                </div>
                <div class="col-sm-6">
                    <label class="form-label">Lastname</label>
                    <input type="text" class="form-control" name="user_lastname" id="user_lastname" placeholder="Lastname" value="<?php echo $user_edit["user_lastname"]; ?>" autocomplete="off" required>
                </div>
                <div class="col-sm-12">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email address" value="<?php echo $user_edit["email"]; ?>" autocomplete="off" required>
                </div>
                <div class="col-sm-12">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="user_username" id="user_username" placeholder="Username" value="<?php echo $user_edit["user_username"]; ?>" autocomplete="off" required>
                </div>
                <br><br><br><br>
                <div class="d-grid gap-2">
                    <button type="submit" name="reg_user" class="btn btn-success"><b>บันทึก</b></button>
                </div>
            </form>
        </div>
    </div>
</div>


<br><br><br><br><br><br><br>



<?php echo $this->include('Templates/footer'); ?>


<?= $this->endSection() ?>