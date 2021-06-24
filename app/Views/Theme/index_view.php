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
    <a href="index.php" class="text-light ps-5 ps-5 fw-light" style="text-decoration: none;">
        <i class="fas fa-home"></i> หน้าแรก</a>
    <a class="text-light ps-1 fw-light" style="text-decoration: none;">
        <i class='fas fa-angle-double-right'></i> <?php echo $webboard_view['category']; ?> </a>
    <a class="text-light ps-1 fw-light" style="text-decoration: none;">
        <i class='fas fa-angle-double-right'></i> <?php echo $webboard_view['topic']; ?> </a>
</div>


<br>


<div class="container mt-3 col-sm-8">

    <div class=" row-col-1 text-white" style="background-color: #193366;">

        <div class="clearfix visible border border-1 border-light">
            <a href="#" class="float-start text-warning fw-light ps-4 pt-2 mt-1 fs-3" style="text-decoration: none;"><b><?php echo $webboard_view['topic']; ?></b></a>

            <br><br><br>
            <a href="#" class="float-start text-white fw-light ps-4 pt-2 mt-1 fs-6" style="text-decoration: none;"><b><?php echo $webboard_view['webboard']; ?></b></a>
            <br><br><br>
            <p class="float-start pe-2 pt-1 mb-0 ms-1 mb-1"> <?php echo $webboard_view['category']; ?> </p>
            <p style="font-size:75%" class="float-start fw-light pe-2 mb-0 ms-1 mb-1 pt-2"> <?php echo $webboard_view['user_firstname']; ?> </p>
            <p style="font-size:75%" class="float-start fw-light pe-2 mb-0 ms-1 mb-1 pt-2"> <?php echo $webboard_view['time_webboard']; ?> </p>
            <p class="float-end pe-2 mb-0 mb-1"><i class="fas fa-eye"></i> 11</p>
        </div>

    </div>


    <br>
    <br>

    <?php foreach ($comment_ids as $comment_id) : ?>
        <p style="font-size:75%" class="float-start pe-2 pt-1 mb-0 ms-5 mb-1 text-white"> <i class="fas fa-comments"></i> <?php echo $comment_id["comment_id"]; ?> ความคิดเห็น</p>
        <hr class="bg-white">
    <?php endforeach; ?>
    <br>
    <?php foreach ($comment_views as $comment_view) : ?>
        <div class=" row-col-1">

            <div class="clearfix visible border border-1 border-light text-white" style="background-color: #383454;">
                <p style="font-size:75%" class="pe-2 pt-1 mb-0 ms-5 mb-1 mt-2 text-white">ความคิดเห็น 1</p>
                <a href="#" class="float-start text-white fw-light ps-4 pt-2 mt-1 fs-6" style="text-decoration: none;"><b> <?php echo $comment_view["comment"]; ?> </b></a>

                <br><br><br>


                <p style="font-size:75%" class="float-start fw-light pe-2 mb-0 ms-1 mb-1 pt-2"> <?php echo $comment_view["user_firstname"]; ?> </p>
                <p style="font-size:75%" class="float-start fw-light pe-2 mb-0 ms-1 mb-1 pt-2"> <?php echo $comment_view["time_comment"]; ?> </p>
            </div>

        </div>

        <br>
        <br>
    <?php endforeach; ?>
    <p style="font-size:75%" class="float-start pe-2 pt-1 mb-0 ms-5 mb-1 text-white"> <i class="fas fa-comment-dots"></i> แสดงความคิดเห็น</p>
    <hr class="bg-white">

    <div class="card text-white border border-1 border-light " style="background-color: #103c44;">
        <div class="card-body ">
            <form action="" method="post">
                <input type="hidden" name="" value="" />
                <input type="hidden" name="" value="" />
                <div class="container col-sm-12">

                    <textarea name="webboard"></textarea>

                    <br>
                    <div class="col-sm-12">
                        <a href="<?= base_url('login') ?>" class="btn btn-success">บันทึก</a>
                    </div>

                </div>

            </form>
        </div>
    </div>

</div>

<br><br><br><br><br><br><br>


<script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('webboard');
</script>

<?php echo $this->include('Templates/footer'); ?>


<?= $this->endSection() ?>