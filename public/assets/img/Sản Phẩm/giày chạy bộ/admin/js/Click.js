const buttonClick = document.querySelector('.Button'); 
const buttonInfo = document.querySelector('.button-infor');

buttonClick.addEventListener('click', function () {
    buttonInfo.classList.toggle('visible');
});

