<!-- <head> -->
<?php include './views/layout/header.php'; ?>
<!-- </head> -->

<!-- navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- navbar -->

<!-- sidebar -->
<?php include './views/layout/sidebar.php'; ?>
<!-- sidebar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý bài viết</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa bài viết</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-bai-viet' ?>" method="post">
                        <input type="text" name="id" id="" value="<?= $baiViet['id'] ?>" hidden>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tiêu đề bài viết</label>
                                    <input type="text" class="form-control" name="tieu_de" placeholder="Nhập tiêu đề bài viết" value="<?= $baiViet['tieu_de'] ?>">

                                    <?php if (isset($_SESSION['errors']['tieu_de'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['tieu_de']; ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea class="form-control" name="noi_dung" placeholder="Nhập nội dung"><?= $baiViet['noi_dung'] ?></textarea>

                                    <?php if (isset($_SESSION['errors']['noi_dung'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['noi_dung']; ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>ngày đăng</label>
                                    <input type="date" class="form-control" name="ngay_dang" value="<?= $baiViet['ngay_dang'] ?>">

                                    <?php if (isset($_SESSION['errors']['ngay_dang'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['ngay_dang']; ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="form-control" name="trang_thai" id="exampleFormControlSelectl">
                                        <option selected disabled>Chọn trạng thái bài viết</option>
                                        <option <?= $baiViet['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Hiện</option>
                                        <option <?= $baiViet['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Ẩn</option>
                                    </select>

                                    <?php if (isset($_SESSION['errors']['trang_thai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['trang_thai']; ?></p>
                                    <?php } ?>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                        </form>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- <footer> -->
<?php include './views/layout/footer.php'; ?>
<!-- End</footer>  -->

</body>

</html>