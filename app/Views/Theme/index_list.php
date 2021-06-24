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
<?php foreach ($category as $category) : ?>
<div class="bg-dark ps-5 mb-0 py-2">>
    <a href="index.php" class="text-light ps-5 ps-5 fw-light" style="text-decoration: none;">
        <i class="fas fa-home"></i> หน้าแรก</a>
    <a class="text-light ps-1 fw-light" style="text-decoration: none;">
        <i class='fas fa-angle-double-right'></i> <?php echo $category['category']; ?> </a>
</div>
<?php endforeach; ?>

<br>
<div class="container mt-3 col-sm-8">
    <?php if ($webboards) { ?>
        <h4 class="ps-3 text-warning mb-0 py-2 bg-dark rounded-top border border-1 border-light" ">กระทู้ล่าสุด</h4>
        
        <div class=" row-col-1">

            <?php foreach ($webboards as $webboard) : ?>
                <div class="clearfix visible border border-1 border-light">
                    <a href="<?php echo base_url('index_view/' . $webboard['webboard_id']); ?>" class="float-start text-light fw-light ps-2 pt-2 mt-1 fs-4" style="text-decoration: none;"><b><?php echo $webboard["topic"]; ?></b></a>

                    <br><br><br>

                    <p class="float-start pe-2 mb-0 ms-1 mb-1"><?php echo $webboard["category"]; ?></p>
                    <p style="font-size:50%" class="float-start fw-light pe-2 mb-0 ms-1 mb-1 pt-2"> <?php echo $webboard["user_firstname"]; ?></p>
                    <p style="font-size:40%" class="float-start fw-light pe-2 mb-0 ms-1 mb-1 pt-2"> <?php echo $webboard["time_webboard"]; ?></p>
                    <?php if ($webboard['num_comment']) { ?>
                        <p class="float-end pe-2 mb-0 mb-1"><i class="fas fa-comment"></i> <?php echo $webboard['num_comment']; ?></p>
                    <?php } else { ?>
                        <p class="float-end pe-2 mb-0 mb-1"><i class="fas fa-comment"></i> 0</p>
                    <?php } ?>
                </div>
            <?php endforeach; ?>
        <?php } else { ?>
            <h4 class="ps-3 text-warning mb-0 py-2 bg-dark rounded-top border border-1 border-light" ">ไม่พบข้อมูล</h4>
            <br><br><br><br><br><br><br><br><br><br><br>
        <?php } ?>
</div>
</div>
<br><br><br><br><br><br><br>

<?php echo $this->include('Templates/footer'); ?>


<?= $this->endSection() ?>