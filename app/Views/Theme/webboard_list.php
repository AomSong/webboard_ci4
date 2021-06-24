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
        <i class="fas fa-comment-medical"></i> ตั้งกระทู้</a>
    <a class="text-light ps-1 fw-light" style="text-decoration: none;">
        <i class='fas fa-angle-double-right'></i> เลือกหัวข้อ</a>
</div>

<div class="container mt-3 col-sm-8">
    <h4 class="ps-3 text-warning bg-dark mb-0 py-2 rounded-top border border-1 border-light">เลิอกหัวข้อ</h4>
    <div class="container ">
        <div class="row row-cols-auto">
            <?php foreach ($categorys as $category) : ?>
                <div class="col-sm-1 border border-1 border-light p-3 text-center category">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#modalEdit" id='btn-edit' data-id="<?php echo $category['category_id']; ?>" 
                    class="text-light fw-light" style="text-decoration: none;"><?php echo $category["category"]; ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>



<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div class="modal fade" id="modalEdit">
    <div class="modal-dialog modal-xl">
        <div class="modal-content text-white" style="background-color: #302c4c;">
            <div class="modal-header">
                <h3 class="modal-title text-warning ps-2" id="exampleModalLabel">ตั้งกระทู้</h3>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('webboard_add_db') ?>" method="post">
                    <input type="hidden" name="user_id" value="<?= session()->get('user_id') ?>" />
                    <input type="hidden" name="user_firstname" value="<?= session()->get('user_firstname') ?>" />
                    <input type="hidden" name="category_id" id="id-category">
                    <div class="form-group mb-0">
                        <label for="nisn" class="py-2"><b>หัวข้อกระทู้</b></label>
                        <br>
                        <input type="text" name="topic" placeholder="หัวข้อกระทู้" class="form-control" required>
                    </div>
                    <br>
                    <div class="form-group mb-0">
                        <label for="name" class="py-2"><b>รายละเอียด</b></label>
                        <br>
                        <textarea name="webboard"></textarea>
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



<script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('webboard');
</script>



<?php echo $this->include('Templates/footer'); ?>


<?= $this->endSection() ?>