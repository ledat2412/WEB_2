<?php 
    include_once "../../../app/model/handle/listProduct.php";
    include_once "../../../app/model/database.php";

    $listProductModel = new listProduct();
    
    // Sắp xếp theo id tăng dần
    $DataProduct = $listProductModel->getListProduct();
    usort($DataProduct, function($a, $b) {
        return $a['product_id'] <=> $b['product_id'];
    });

    if(isset($_POST["button_delete"])) {
        $id = $_POST["product_id_delete"];
        $listProductModel->deleteListProductById($id);
        header("location: listProduct_contronller.php");
    }

    include_once "../../view/html/DanhSachSanPham.php";
?>