document.addEventListener("DOMContentLoaded", function () {
    const sliderTrack = document.getElementById("slider-track");
    const prevButton = document.getElementById("prev");
    const nextButton = document.getElementById("next");
    let currentIndex = 0;

    const updateSliderPosition = () => {
        const slideWidth = sliderTrack.firstElementChild.offsetWidth;
        sliderTrack.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
    };

    nextButton.addEventListener("click", () => {
        if (currentIndex < sliderTrack.children.length - 1) {
            currentIndex++;
            updateSliderPosition();
        }
    });

    prevButton.addEventListener("click", () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateSliderPosition();
        }
    });
});
