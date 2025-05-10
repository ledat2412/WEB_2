const seeMore = document.getElementById('see-more');
const dropdown = document.getElementById('dropdown-content');
const closeBtn = document.getElementById('close-dropdown');

seeMore.onclick = function() {
    seeMore.style.display = 'none';
    dropdown.classList.remove('dropdown-hidden');
    dropdown.classList.add('dropdown-show');
};

closeBtn.onclick = function() {
    dropdown.classList.remove('dropdown-show');
    dropdown.classList.add('dropdown-hidden');
    setTimeout(() => {
        seeMore.style.display = 'inline-block';
    }, 400); // Đợi animation xong
};