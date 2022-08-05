$(document).ready(function () {
    // carousel ketika layar mobile
    let lebarPonsel = window.innerWidth;
    let myCarousel = document.getElementById('myCarousel')
    if (lebarPonsel <= 480) {
        accordionItems.forEach(item => {
            item.addEventListener('click', (e) => {
                setTimeout(function () {
                    let top = e.target.getBoundingClientRect().top + document.documentElement.scrollTop;
                    window.scroll({
                        top: top - 5
                        , behavior: 'smooth'
                    });
                }, 200);
            });
        });
    }
});
