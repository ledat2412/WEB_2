var imageUrls = JSON.parse(document.getElementById('imageModal').getAttribute('data-images'));
// var imageUrls = <?php echo json_encode($image_urls); ?>;
var currentIndex = 0;


function changeMainImage(src, thumbnail) {
    document.getElementById('mainImage').src = src;
    // Remove active class from all thumbnails
    document.querySelectorAll('.thumbnail').forEach(thumb => {
        thumb.classList.remove('active');
    });
    // Add active class to clicked thumbnail
    thumbnail.classList.add('active');
}

function selectSize(button) {
    document.querySelectorAll('.size-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    button.classList.add('active');
}

function openModal(src) {
    currentIndex = imageUrls.indexOf(src);
    if (currentIndex === -1) currentIndex = 0;
    document.getElementById('modalImage').src = imageUrls[currentIndex];
    document.getElementById('imageModal').style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    document.getElementById('imageModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

document.getElementById('prevBtn').onclick = function(event) {
    event.stopPropagation();
    currentIndex = (currentIndex - 1 + imageUrls.length) % imageUrls.length;
    document.getElementById('modalImage').src = imageUrls[currentIndex];
};
document.getElementById('nextBtn').onclick = function(event) {
    event.stopPropagation();
    currentIndex = (currentIndex + 1) % imageUrls.length;
    document.getElementById('modalImage').src = imageUrls[currentIndex];
};

window.onclick = function(event) {
    var modal = document.getElementById("imageModal");
    if (event.target == modal) {
        closeModal();
    }
}