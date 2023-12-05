document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll(".star");
    const ratingValue = document.getElementById("selected-rating");
    const ratingInput = document.getElementById("rating-input");

    stars.forEach((star) => {
        star.addEventListener("click", () => {
            const value = star.getAttribute("data-value");
            ratingValue.textContent = value;
            ratingInput.value = value;
            resetStars();
            star.classList.add("active");
        });

        star.addEventListener("mouseover", () => {
            resetStars();
            const value = star.getAttribute("data-value");
            highlightStars(value);
        });

        star.addEventListener("mouseout", () => {
            resetStars();
            const activeRating = ratingValue.textContent;
            highlightStars(activeRating);
        });
    });

    function resetStars() {
        stars.forEach((star) => {
            star.classList.remove("active");
        });
    }

    function highlightStars(endIndex) {
        stars.forEach((star, index) => {
            if (index + 1 <= endIndex) {
                star.classList.add("active");
            }
        });
    }
});
