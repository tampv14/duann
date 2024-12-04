<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chi tiết bài viết</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin bài viết</h3>
                        </div>
                        <div class="card-body">
                            <div class="article-detail">
                                <div class="row">
                                    <!-- Cột ảnh bên trái -->
                                    <div class="col-md-4">
                                        <div class="image-section">
                                            <?php if (!empty($baiViet['anh'])): ?>
                                                <div class="main-image">
                                                    <img src="<?= BASE_URL . $baiViet['anh'] ?>" 
                                                         alt="<?= htmlspecialchars($baiViet['tieu_de']) ?>"
                                                         id="mainImage">
                                                </div>
                                                <div class="image-actions">
                                                    <button type="button" class="btn btn-tool" onclick="rotateImage(-90)">
                                                        <i class="fas fa-undo"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" onclick="zoomImage()">
                                                        <i class="fas fa-search-plus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" onclick="rotateImage(90)">
                                                        <i class="fas fa-redo"></i>
                                                    </button>
                                                </div>
                                            <?php else: ?>
                                                <div class="no-image">
                                                    <i class="fas fa-image"></i>
                                                    <p>Chưa có ảnh</p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <!-- Cột thông tin bên phải -->
                                    <div class="col-md-8">
                                        <div class="article-info">
                                            <div class="info-group">
                                                <label><i class="fas fa-heading"></i> Tiêu đề</label>
                                                <div class="info-content"><?= htmlspecialchars($baiViet['tieu_de']) ?></div>
                                            </div>

                                            <div class="info-group">
                                                <label><i class="far fa-calendar-alt"></i> Ngày đăng</label>
                                                <div class="info-content"><?= formatDate($baiViet['ngay_dang']) ?></div>
                                            </div>

                                            <div class="info-group">
                                                <label><i class="fas fa-toggle-on"></i> Trạng thái</label>
                                                <div class="info-content">
                                                    <span class="status-badge <?= $baiViet['trang_thai'] == 1 ? 'active' : 'inactive' ?>">
                                                        <?= $baiViet['trang_thai'] == 1 ? 'Hiện' : 'Ẩn' ?>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="info-group full-width">
                                                <label><i class="fas fa-file-alt"></i> Nội dung</label>
                                                <div class="content-box">
                                                    <?= nl2br(htmlspecialchars($baiViet['noi_dung'])) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Nút thao tác -->
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal xem ảnh lớn -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <img src="" id="modalImage" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<?php include './views/layout/footer.php'; ?>

<style>
.image-section {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    text-align: center;
}

.main-image {
    position: relative;
    margin-bottom: 15px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.main-image img {
    max-width: 100%;
    height: auto;
    display: block;
    transition: transform 0.3s ease;
    cursor: pointer;
}

.image-actions {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 15px;
}

.btn-tool {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #fff;
    border: 1px solid #ddd;
    color: #666;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.btn-tool:hover {
    background: #c29958;
    color: #fff;
    border-color: #c29958;
}

.no-image {
    padding: 40px;
    background: #f8f9fa;
    border-radius: 8px;
    color: #666;
}

.no-image i {
    font-size: 48px;
    margin-bottom: 10px;
    color: #ddd;
}

/* Các style khác giữ nguyên */
.article-info {
    display: grid;
    gap: 20px;
}

.info-group {
    margin-bottom: 20px;
}

.info-group label {
    display: block;
    font-weight: 600;
    color: #666;
    margin-bottom: 8px;
}

.info-content {
    padding: 12px;
    background: #f8f9fa;
    border-radius: 6px;
}

.status-badge {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 500;
}

.status-badge.active {
    background: #28a745;
    color: white;
}

.status-badge.inactive {
    background: #dc3545;
    color: white;
}

/* Responsive */
@media (max-width: 768px) {
    .image-section {
        margin-bottom: 20px;
    }
}
</style>

<script>
// Xử lý xoay ảnh
let currentRotation = 0;
function rotateImage(degree) {
    currentRotation += degree;
    const image = document.getElementById('mainImage');
    image.style.transform = `rotate(${currentRotation}deg)`;
}

// Xử lý zoom ảnh
function zoomImage() {
    const modalImage = document.getElementById('modalImage');
    const mainImage = document.getElementById('mainImage');
    modalImage.src = mainImage.src;
    $('#imageModal').modal('show');
}

// Click vào ảnh để zoom
document.getElementById('mainImage')?.addEventListener('click', zoomImage);
</script>