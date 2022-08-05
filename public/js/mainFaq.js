$(document).ready(function () {
    // Scroll Up ketika tombol FAQ's ditekan

    var accordionItems = document.querySelectorAll('#accordion');
    accordionItems.forEach(item => {
        item.addEventListener('click', (e) => {
            setTimeout(function() {
                let top = e.target.getBoundingClientRect().top + document.documentElement.scrollTop;
                window.scroll({
                    top: top - 100
                    , behavior: 'smooth'
                });
            }, 200);
        });
    });
    // Scroll Up ketika tombol FAQ page ditekan

    var faq = document.getElementsByClassName("faq-page");
    var i;

    for (i = 0; i < faq.length; i++) {
        faq[i].addEventListener("click", function() {
            /* Toggle between adding and removing the "active" class,
            to highlight the button that controls the panel */
            this.classList.toggle("active");

            /* Toggle between hiding and showing the active panel */
            var body = this.nextElementSibling;
            if (body.style.display === "block") {
                body.style.display = "none";
                console.log('klik kurang');
            } else {
                console.log('klik tambah');
                body.style.display = "block";
            }
        });
    }
});
