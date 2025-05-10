const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item => {
    const li = item.parentElement;

    item.addEventListener ('click', function() {
        allSideMenu.forEach(i => {
          i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});

//Toggle sidebar 
const menuBar = document.querySelector('#content nav .fa-solid.fa-bars');
const sideBar = document.getElementById('sidebar');
menuBar.addEventListener('click', function() {
    sideBar.classList.toggle('hide')
})

// RESPONSIVE 
if(window.innerWidth < 768) {
    sideBar.classList.add('hide');
}

const button = document.querySelector('#content nav form .form-input button')
const buttonIcon = document.querySelector('#content nav form .form-input button .fa-solid')
const search = document.querySelector('#content nav form')
search.addEventListener ('click', function(e){
    if (window.innerWidth < 576) {
        e.preventDefault();
        search.classList.toggle('show');
        if (search.classList.contains('show')) {
            buttonIcon.classList.replace('fa-magnifying-glass' , 'fa-x');
        }
        else {
            buttonIcon.classList.replace('fa-x' , 'fa-magnifying-glass');
        }
    }
})