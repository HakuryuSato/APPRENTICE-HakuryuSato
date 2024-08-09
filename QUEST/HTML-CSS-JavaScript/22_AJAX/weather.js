require("dotenv").config();
const apiKey = process.env.API_KEY;

const doc = document;
const weatherForm = doc.getElementById("weatherForm");
const weatherResult = doc.getElementById("weatherResult");

doc.addEventListener("submit", function (event) {
    event.preventDefault;
    const latitude = weatherForm.getElementById("latitude");
    const longitude = weatherForm.getElementById("longitude");
    const url =
        `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&units=metric&lang=ja&appid=${apiKey}`;

    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            const temperature = data.main.temp;
            const weatherDescription = data.weather[0].description;
            document.getElementById("weatherResult").innerHTML = `
            <p>気温: ${temperature} °C</p>
            <p>天気: ${weatherDescription}</p>
        `;
        })
        .catch((error) => {
            document.getElementById("weatherResult").innerHTML =
                `<p>天気情報の取得に失敗しました。</p>`;
            console.error("Error:", error);
        });
});
