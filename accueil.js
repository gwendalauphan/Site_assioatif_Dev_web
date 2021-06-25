var slideIndex = 1;
showSlides(slideIndex);

// slide suivante
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// fonction pour récupérer l'id de la slide actuelle
function currentSlide(n) {
    showSlides(slideIndex = n); 
}

//fonction pour afficher les slides
function showSlides(n) {
    var i;
    //récupération des éléments
    var slides = document.getElementsByClassName("photo");
    var dots = document.getElementsByClassName("dot");
    //attribution de l'index des slides suivant la longeur de ka variable slides
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }

    //désactivation de l'affichage
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }

    //affichage de la slide active (à la position slideIndex)
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}