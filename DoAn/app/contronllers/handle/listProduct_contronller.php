<?php 
    include_once "../../models/handle/listProduct.php";
    include_once "../../models/tables/database.php";

    $listProductModel = new listProduct();
    
    $DataProduct = $listProductModel->getListProduct();

    if(isset($_POST["button_delete"])) {
        $id = $_POST["product_id_delete"];
        $listProductModel->deleteListProductById($id);
        header("location: listProduct_contronller.php");
    }

    include_once "../../views/html/DanhSachSanPham.php";
?>