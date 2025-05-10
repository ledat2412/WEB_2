<?php
// // Đảm bảo $products luôn tồn tại để tránh lỗi undefined variable
// if (!isset($products) || !is_array($products)) {
//     $products = [];
// }
// // Debug: Hiển thị dữ liệu truyền vào
// echo '<pre>'; print_r($products); echo '</pre>';
?>
<div class="product-search-container" style="max-width:400px; margin:auto; position:relative;">
    <input 
        type="text" 
        id="product-search-input" 
        class="form-control" 
        placeholder="Nhập tên sản phẩm hoặc mã giày..." 
        autocomplete="off"
        oninput="showProductSuggestions(this.value)"
    >
    <ul id="product-suggestions" class="list-group" style="position:absolute; z-index:1000; width:100%; display:none; background:#fff; border:1px solid #ccc; margin-top:2px; padding-left:0;"></ul>
</div>

<!-- Danh sách tất cả tên và mã sản phẩm -->
<div style="max-width:400px; margin:24px auto;">
    <table style="width:100%; border-collapse:collapse; font-size:15px;">
        <thead>
            <tr style="background:#f5f5f5;">
                <th style="border:1px solid #ddd; padding:6px;">Tên sản phẩm</th>
                <th style="border:1px solid #ddd; padding:6px;">Mã sản phẩm</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product): ?>
                <tr>
                    <td style="border:1px solid #ddd; padding:6px;"><?= htmlspecialchars($product['product_name']) ?></td>
                    <td style="border:1px solid #ddd; padding:6px;"><?= htmlspecialchars($product['shoe_code']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
.list-group-item {
    list-style: none;
    padding: 8px 12px;
    cursor: pointer;
    border-bottom: 1px solid #eee;
}
.list-group-item:last-child {
    border-bottom: none;
}
.list-group-item:hover {
    background: #f5f5f5;
    color: #ec2a2a;
}
.list-group-item strong {
    color: #333;
}
.list-group-item .code {
    color: #888;
    font-size: 90%;
    margin-left: 8px;
}
</style>
<script>
    // Lấy dữ liệu thực từ PHP
    const products = [
        <?php
        $arr = [];
        foreach($products as $product) {
            $arr[] = '{id: "' . addslashes($product['id_product']) . '", name: "' . addslashes(htmlspecialchars($product['product_name'], ENT_QUOTES)) . '", code: "' . addslashes(htmlspecialchars($product['shoe_code'], ENT_QUOTES)) . '"}';
        }
        echo implode(',', $arr);
        ?>
    ];
    console.log(products); // Kiểm tra dữ liệu

    function showProductSuggestions(query) {
        const input = document.getElementById('product-search-input');
        const suggestionBox = document.getElementById('product-suggestions');
        suggestionBox.innerHTML = '';
        if (!query.trim()) {
            suggestionBox.style.display = 'none';
            return;
        }
        const q = query.toLowerCase();
        // Kiểm tra cả tên sản phẩm và mã sản phẩm
        const matches = products.filter(p => 
            (p.name + ' ' + p.code).toLowerCase().includes(q)
        );
        if (matches.length === 0) {
            suggestionBox.style.display = 'none';
            return;
        }
        matches.forEach(p => {
            const li = document.createElement('li');
            li.className = 'list-group-item';
            li.innerHTML = `<strong>${p.name}</strong> <span class="code">(${p.code})</span>`;
            li.onclick = () => {
                // Chuyển hướng sang trang chi tiết sản phẩm với id
                // window.location.href = `main.php?act=products&action=product_detail&id=${encodeURIComponent(p.id)}`;
                window.location.href = `productdetail_controller.php?act=products&action=product_detail&id=${encodeURIComponent(p.id)}`;
            };
            suggestionBox.appendChild(li);
        });
        suggestionBox.style.display = 'block';
    }

    // Hide suggestions when clicking outside
    document.addEventListener('click', function(e) {
        if (!document.getElementById('product-search-input').contains(e.target)) {
            document.getElementById('product-suggestions').style.display = 'none';
        }
    });
</script>
