<div id="product-list"></div>
<script>
fetch('/WEB_2/app/controller/api_product.php')
  .then(res => res.json())
  .then(products => {
    console.log(products); // Xem dữ liệu trả về
    let html = '';
    products.forEach(item => {
      html += `
        <div class="product-item">
          <h3>${item.product_name}</h3>
          <p>Giá: ${item.price}₫</p>
          <!-- Thêm các trường khác nếu muốn -->
        </div>
      `;
    });
    document.getElementById('product-list').innerHTML = html;
  })
  .catch(err => {
    console.error('Fetch error:', err);
  });
</script>
