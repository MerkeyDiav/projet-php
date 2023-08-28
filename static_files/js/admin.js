const boxes = document.querySelectorAll('.user_container');

const options = {
    root: null,
    threshold: 0,
    rootMargin: '0px'
};

const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
            observer.unobserve(entry.target);
        }
    });
}, options);

boxes.forEach(box => {
    observer.observe(box);
});
