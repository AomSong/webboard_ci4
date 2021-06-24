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
                <img src="uploads/pic1.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item carousel-image-2 " style="height: 200px;;">
                <img src="uploads/pic2.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item carousel-image-3 " style="height: 200px;">
                <img src="uploads/pic3.jpg" class="d-block w-100">
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
    <a class="text-light ps-5 ps-5 fw-light" style="text-decoration: none;">
        <i class="fas fa-user"></i> ข้อมูลส่วนตัว</a>
</div>

<div class="swal_success" data-success="<?php echo session("success") ?>"></div>

<div class="swal_edit" data-edit="<?php echo session("edit") ?>"></div>

<div class="container mt-3 col-sm-7">
    <a class="btn btn-sm me-2 mb-2 mt-2 float-end" type="button" data-bs-toggle="modal" data-bs-target="#modalEditpassword">
        <i class="fas fa-key"></i> เปลี่ยนรหัสผ่าน</a>
    <a class="btn btn-sm me-2 mb-2 mt-2 float-end" type="button" data-bs-toggle="modal" data-bs-target="#modalEditwebboard" id='btn-editProfile' data-user_id="<?php echo $user['user_id']; ?>" data-user_firstname="<?php echo $user['user_firstname']; ?>" data-user_lastname="<?php echo $user['user_lastname']; ?>" data-email="<?php echo $user['email']; ?>" data-user_username="<?php echo $user['user_username']; ?>">
        <i class="fas fa-edit"></i> แก้ไขข้อมูล</a>
    <h4 class="ps-3 text-warning mb-0 py-2 bg-dark rounded-top">ข้อมูลส่วนตัว</h4>

    <div class=" row-col-1">


        <div class="clearfix visible text-light" style="background-color: #302c4c;">
            <br>
            <img src="<?php echo base_url("user/" . $user['user_image']) ?>" class="rounded float-end d-block w-25" alt="...">
            <div class="mb-3">
                <a class="text-light fw-light ps-3 pt-2 mt-1 fs-5" style="text-decoration: none;"><b>ชื่อ :</b></a>
                <a class="text-light fw-light ps-3 pt-2 mt-1 fs-6" style="text-decoration: none;"><?= $user['user_firstname'] ?></a>
                <a class="text-light fw-light ps-3 pt-2 mt-1 fs-6" style="text-decoration: none;"><?= $user['user_lastname'] ?></a>
            </div>
            <div class="mb-3">
                <a class="text-light fw-light ps-3 pt-2 mt-1 fs-5" style="text-decoration: none;"><b>Email :</b></a>
                <a class="text-light fw-light ps-3 pt-2 mt-1 fs-6" style="text-decoration: none;"><?= $user['email'] ?></a>
            </div>
            <div class="mb-3">
                <a class="text-light fw-light ps-3 pt-2 mt-1 fs-5" style="text-decoration: none;"><b>Username :</b></a>
                <a class="text-light fw-light ps-3 pt-2 mt-1 fs-6" style="text-decoration: none;"><?= $user['user_username'] ?></a>
            </div>
            <br><br><br> <br>
            <a  class="btn btn-sm me-2 mb-2 float-end" type="button" data-bs-toggle="modal" data-bs-target="#modalEditimage" >
                <i class="fas fa-image"></i> แก้ไขรูปภาพ</a>
            <br>
        </div>
    </div>
</div>

<div class="container mt-3 col-sm-7">
    <div class="card text-center " style="background-color: #302c4c;">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link text-warning" style="background-color: #302c4c;" aria-current="true" href="#">กระทู้ที่ฉันตั้ง</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light bg-dark" href="#">กระทู้ที่ตอบกลับ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light bg-dark" href="#" tabindex="-1" aria-disabled="true">กระทู้โปรด</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <?php foreach ($webboards as $webboard) : ?>
                <div class="clearfix visible text-light">
                    <a href="#" class="float-start text-warning fw-light ps-2 pt-2 mt-1 fs-5" style="text-decoration: none;"><b><i class="fas fa-question"></i>
                            <?php echo $webboard["topic"]; ?></b></a>

                    <br><br><br>

                    <p class="float-start pe-2 mb-0 ms-1 mb-1 pt-2"> <?php echo $webboard["category"]; ?></p>
                    <p style="font-size:40%" class="float-start fw-light pe-2 mb-0 ms-1 mb-1 pt-3"> <?php echo $webboard["time_webboard"]; ?></p>
                    <a href="<?php echo base_url('webboard_delete/' . $webboard['webboard_id']); ?>" class=" btn btn-sm pe-2 me-2 ms-1 mb-1 pt-2 float-end  btn-delete">
                        <i class="fas fa-trash-alt"></i> ลบข้อมูล</a>
                    <a class=" btn btn-sm pe-2 me-2 ms-1 mb-1 pt-2 float-end" type="button" data-bs-toggle="modal" data-bs-target="#modalEditWebboard" id='btn-editWebboard' data-webboard_id="<?php echo $webboard['webboard_id']; ?>" data-category_id="<?php echo $webboard['category_id']; ?>" data-topic="<?php echo $webboard['topic']; ?>" data-webboard="<?php echo $webboard['webboard']; ?>">
                        <i class="fas fa-edit"></i> แก้ไขข้อมูล</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditwebboard">
    <div class="modal-dialog modal-lg">
        <div class="modal-content text-white" style="background-color: #302c4c;">
            <div class="modal-header">
                <h3 class="modal-title text-warning ps-2" id="exampleModalLabel">แก้ไขข้อมูลส่วนตัว</h3>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/user_edit_db') ?>" method="post">
                    <input type="hidden" name="user_id" id="user_id" />
                    <div class="form-group mb-0">
                        <label class="py-2">Firstname</label>
                        <input type="text" class="form-control" name="user_firstname" id="user_firstname" placeholder="Firstname" autocomplete="off" required>
                    </div>
                    <div class="form-group mb-0">
                        <label class="py-2">Lastname</label>
                        <input type="text" class="form-control" name="user_lastname" id="user_lastname" placeholder="Lastname" autocomplete="off" required>
                    </div>
                    <div class="form-group mb-0">
                        <label class="py-2">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email address" autocomplete="off" required>
                    </div>
                    <div class="form-group mb-0">
                        <label class="py-2">Username</label>
                        <input type="text" class="form-control" name="user_username" id="user_username" placeholder="Username" autocomplete="off" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                <button type="submit" name="edit" class="btn btn-success">บันทึก</button>
            </div>
            </form>
        </div>

    </div>
</div>

<div class="modal fade" id="modalEditWebboard">
    <div class="modal-dialog modal-xl">
        <div class="modal-content text-white" style="background-color: #302c4c;">
            <div class="modal-header">
                <h3 class="modal-title text-warning ps-2" id="exampleModalLabel">ตั้งกระทู้</h3>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/webboard_edil_db') ?>" method="post">
                    <input type="hidden" name="category_id" id="category_id" />
                    <input type="hidden" name="user_id" value="<?= session()->get('user_id') ?>" />
                    <input type="hidden" name="user_firstname" value="<?= session()->get('user_firstname') ?>" />
                    <input type="hidden" name="webboard_id" id="webboard_id" />
                    <div class="form-group mb-0">
                        <label for="nisn" class="py-2"><b>หัวข้อกระทู้</b></label>
                        <br>
                        <input type="text" class="form-control" id="topic" name="topic" placeholder="หัวข้อกระทู้" required>
                    </div>
                    <br>
                    <div class="form-group mb-0">
                        <label for="name" class="py-2"><b>รายละเอียด</b></label>
                        <br>
                        <textarea id="webboard" name="webboard"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                <button type="submit" name="edit" class="btn btn-success">บันทึก</button>
            </div>
            </form>
        </div>

    </div>
</div>

<div class="modal fade" id="modalEditpassword">
    <div class="modal-dialog modal-md">
        <div class="modal-content text-white" style="background-color: #302c4c;">
            <div class="modal-header">
                <h3 class="modal-title text-warning ps-2" id="exampleModalLabel">แก้ไขPassword</h3>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="<?= base_url('/password_edit_db') ?>" method="post">
                    <input type="hidden" name="user_id" value="<?= session()->get('user_id') ?>" />
                    <br>
                    <div class="col-sm-12">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="user_password" id="user_password" placeholder="Password" required>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="user_password_Confirm" id="user_password" placeholder="Password" required>
                    </div>
                    <br><br><br><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="submit" name="reg_user" class="btn btn-success">บันทึก</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modalEditimage">
    <div class="modal-dialog modal-md">
        <div class="modal-content text-white" style="background-color: #302c4c;">
            <div class="modal-header">
                <h3 class="modal-title text-warning ps-2" id="exampleModalLabel">แก้ไขรูปภาพ</h3>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="<?= base_url('image_edil_db') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="user_id" value="<?= session()->get('user_id') ?>" />
                    <br>
                    <div class="col-sm-12">
                        <label class="form-label">ใส่รูปภาพ</label>
                        <input type="file" name="user_image" class="dropify">
                    </div>
                    <br><br><br><br>
                    <div class="modal-footer">
                        <button type="button" id="btn-Close" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="submit" name="reg_user" class="btn btn-success">บันทึก</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('webboard');
</script>


<style>
    .btn-sm {
        background-color: #483c64;
        color: white;
    }

    .btn-sm:hover {
        background-color: #383454;
        color: white;
    }
</style>



<?php echo $this->include('Templates/footer'); ?>


<?= $this->endSection() ?>