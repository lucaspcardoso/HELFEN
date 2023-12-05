const carousel = document.querySelector(".carousel");
const cardsContainer = carousel.querySelector(".cards-container");
const cards = cardsContainer.querySelectorAll(".card");
const arrowLeft = carousel.querySelector(".arrow-left");
const arrowRight = carousel.querySelector(".arrow-right");

const cardWidth =
    cards[0].offsetWidth + parseInt(getComputedStyle(cards[0]).marginRight);

let currentIndex = 0;

arrowLeft.addEventListener("click", () => {
    if (currentIndex > 0) {
        currentIndex--;
        cardsContainer.style.transform = `translateX(-${currentIndex * cardWidth
            }px)`;
    }
});

arrowRight.addEventListener("click", () => {
    if (currentIndex < cards.length - 3) {
        currentIndex++;
        cardsContainer.style.transform = `translateX(-${currentIndex * cardWidth
            }px)`;
    }
});
