<?php
class AdminBaiViet
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllBaiViet()
    {
        try {
            $sql = 'SELECT * FROM bai_viets';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    public function insertBaiViet(
        $tieu_de,
        $noi_dung,
        $ngay_dang,
        $trang_thai
    ) {
        try {
            $sql = 'INSERT INTO bai_viets (tieu_de, noi_dung, ngay_dang, trang_thai)
                VALUES (:tieu_de, :noi_dung, :ngay_dang, :trang_thai)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':tieu_de' => $tieu_de,
                ':noi_dung' => $noi_dung,
                ':ngay_dang' => $ngay_dang,
                ':trang_thai' => $trang_thai,
            ]);

            return true;
        } catch (Exception $e) {
            echo 'Lỗi khi thêm bài viết: ' . $e->getMessage();
            return false;
        }
    }

    public function getDetailBaiViet($id)
    {
        try {
            $sql = 'SELECT * FROM bai_viets WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    public function updateBaiViet(
        $id,
        $tieu_de,
        $noi_dung,
        $ngay_dang,
        $trang_thai
    ) {
        try {
            $sql = 'UPDATE bai_viets 
                SET 
                    tieu_de = :tieu_de, 
                    noi_dung = :noi_dung,
                    ngay_dang = :ngay_dang, 
                    trang_thai = :trang_thai  
                WHERE id = :id';
            // var_dump($sql); die();

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':tieu_de' => $tieu_de,
                ':noi_dung' => $noi_dung,
                ':ngay_dang' => $ngay_dang,
                ':trang_thai' => $trang_thai,
                ':id' => $id

            ]);
            // var_dump($stmt); die();
            return true;
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    public function destroyBaiViet($id)
    {
        try {
            $sql = 'DELETE FROM bai_viets WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
}
