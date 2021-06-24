<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>webboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="dropify/dist/css/dropify.min.css">


<body style="background-color: #403c64;">
    <?php if (session()->get('user_id')) { ?>
        <!-- Fixed-Top -->
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
            <!-- Content -->
            <div class="container">
                <!-- Brand -->
                <a href="#" class="navbar-brand">webboard</a>
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarToggle">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Menu -->
                <div class="collapse navbar-collapse " id="navbarToggle">
                    <ul class="navbar-nav ms-auto ">
                        <li class="nav-item me-2">
                            <a href="<?= base_url('mainpage') ?>" class="nav-link">
                                <i class="fas fa-home"></i> หน้าแรก</a>
                        </li>
                        <li class="nav-item me-2">
                            <a href="<?= base_url('webboard_list') ?>" class="nav-link">
                                <i class="fas fa-comment-medical"></i> ตั้งกระทู้</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> <?= session()->get('user_firstname') ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= site_url('profile') ?>">จัดการข้อมูลส่วนตัว</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('logout') ?>">ออกจากระบบ</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>




    <?php } else { ?>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
            <!-- Content -->
            <div class="container">
                <!-- Brand -->
                <a href="#" class="navbar-brand">webboard</a>
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarToggle">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Menu -->
                <div class="collapse navbar-collapse " id="navbarToggle">
                    <ul class="navbar-nav ms-auto ">
                        <li class="nav-item me-2">
                            <a href="<?= base_url('index') ?>" class="nav-link">
                                <i class="fas fa-home"></i> หน้าแรก</a>
                        </li>
                        <li class="nav-item me-2">
                            <a href="<?= base_url('login') ?>" class="nav-link">
                                <i class="fas fa-comment-medical"></i> ตั้งกระทู้</a>
                        </li>
                        <li class="nav-item me-2">
                            <a href="<?= base_url('login') ?>" class="btn btn-outline-warning">เข้าสู่ระบบ / สมัครสมาชิก</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    <?php } ?>


    <?= $this->renderSection("body") ?>