document.addEventListener("DOMContentLoaded", function () {
    const calendarContainer = document.getElementById("calendar-container");
    const weekdaysContainer = document.getElementById("weekdays");
    const calendar = document.getElementById("calendar");
    const submitBtn = document.getElementById("submitBtn");
    const prevMonthButton = document.getElementById("prevMonthBtn");
    const nextMonthButton = document.getElementById("nextMonthBtn");
    const monthYearDisplay = document.createElement("div");
    monthYearDisplay.classList.add("month-year-display");
    calendarContainer.insertBefore(monthYearDisplay, calendar);

    let currentDate = new Date();
    let selectedDays = [];

    function createWeekdays() {
        const weekdayNames = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
        for (const weekday of weekdayNames) {
            const weekdayElement = document.createElement("div");
            weekdayElement.textContent = weekday;
            weekdaysContainer.appendChild(weekdayElement);
        }
    }

    function createCalendar() {
        calendar.innerHTML = "";
        monthYearDisplay.textContent = `${getMonthName(
            currentDate.getMonth()
        )} ${currentDate.getFullYear()}`;

        const firstDayOfMonth = new Date(
            currentDate.getFullYear(),
            currentDate.getMonth(),
            1
        );
        const startDay = firstDayOfMonth.getDay();
        const daysInMonth = new Date(
            currentDate.getFullYear(),
            currentDate.getMonth() + 1,
            0
        ).getDate();
        const today = new Date();

        for (let day = 1; day <= daysInMonth + startDay; day++) {
            const dayDate = new Date(
                currentDate.getFullYear(),
                currentDate.getMonth(),
                day - startDay
            );
            const dayElement = document.createElement("div");
            dayElement.classList.add("day");

            if (day > startDay) {
                dayElement.textContent = day - startDay;

                if (dayDate.getDay() === 0 && !isToday(dayDate)) {
                    dayElement.classList.add("sunday");
                } else if (dayDate.getDay() === 6 && !isToday(dayDate)) {
                    dayElement.classList.add("saturday");
                } else if (isToday(dayDate)) {
                    dayElement.classList.add("today");
                }

                if (dayDate < today) {
                    dayElement.classList.add("past-day");
                } else {
                    const checkbox = document.createElement("input");
                    checkbox.type = "checkbox";
                    checkbox.id = `day${day - startDay}`;
                    checkbox.name = `dias[${day - startDay}]`;
                    checkbox.checked = isSelected(dayDate);

                    checkbox.addEventListener("change", function () {
                        toggleSelection(dayDate, checkbox);
                    });

                    dayElement.appendChild(checkbox);
                }
            }

            calendar.appendChild(dayElement);
        }
    }

    function toggleSelection(dayDate, checkbox) {
        const day = parseInt(checkbox.id.replace("day", ""));

        if (checkbox.checked) {
            selectedDays.push(dayDate);
        } else {
            const index = selectedDays.findIndex(
                (selectedDay) => selectedDay.getTime() === dayDate.getTime()
            );
            if (index !== -1) {
                selectedDays.splice(index, 1);
            }
        }
    }

    function isSelected(dayDate) {
        return selectedDays.some(
            (selectedDay) => selectedDay.getTime() === dayDate.getTime()
        );
    }

    function isToday(dayDate) {
        const today = new Date();
        return (
            dayDate.getDate() === today.getDate() &&
            dayDate.getMonth() === today.getMonth() &&
            dayDate.getFullYear() === today.getFullYear()
        );
    }

    function getMonthName(month) {
        const monthNames = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ];
        return monthNames[month];
    }

    prevMonthButton.addEventListener("click", function () {
        currentDate.setMonth(currentDate.getMonth() - 1);
        createCalendar();
    });

    nextMonthButton.addEventListener("click", function () {
        currentDate.setMonth(currentDate.getMonth() + 1);
        createCalendar();
    });

    submitBtn.addEventListener("click", function () {
        // Aqui você pode enviar os dados dos dias selecionados para o backend
        console.log(selectedDays);
    });

    createWeekdays();
    createCalendar();
});

// Modifique a função toggleSelection no seu script.js
function toggleSelection(dayDate, checkbox) {
    const day = dayDate.toISOString().split("T")[0];

    if (checkbox.checked) {
        selectedDays.push(day);
    } else {
        const index = selectedDays.findIndex(
            (selectedDay) => selectedDay === day
        );
        if (index !== -1) {
            selectedDays.splice(index, 1);
        }
    }

    updateHiddenInput(); // Adicione esta linha para atualizar o input hidden
}

// Adicione esta função no seu script.js
function updateHiddenInput() {
    const hiddenInput = document.querySelector('input[name="selected_days[]"]');
    hiddenInput.value = selectedDays.join(",");
}
