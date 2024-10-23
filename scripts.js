function isElementInViewport(element) {
    const rect = element.getBoundingClientRect();
    const height = rect.height;
    return (
        rect.top <= (window.innerHeight || document.documentElement.clientHeight) - height / 4 &&
        rect.bottom >= height / 2
    );
};

function checkIfAboutUsInView() {
    const aboutus = document.querySelector(".about");
    if (aboutus && isElementInViewport(aboutus)) {
        const aubox = document.querySelector(".about-box")
        aubox.classList.add("on-start-3");
        window.removeEventListener("scroll", checkIfAboutUsInView);
    };
};

function checkIfFooterInView() {
    const footer = document.querySelector("footer");
    if (footer && isElementInViewport(footer)) {
        const f1 = document.querySelector(".footer-box1")
        const f2 = document.querySelector(".footer-box2")
        f1.classList.add("on-start-3");
        f2.classList.add("on-start-3");
        window.removeEventListener("scroll", checkIfFooterInView);
    };
}

document.addEventListener("DOMContentLoaded", function() {
    checkIfAboutUsInView();
    checkIfFooterInView();
    window.addEventListener("scroll", checkIfAboutUsInView);
    window.addEventListener("scroll", checkIfFooterInView);
});