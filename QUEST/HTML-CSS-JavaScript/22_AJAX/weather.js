const apiKey = '' // 後で消すこと



const doc = document;
doc.getElementById('weatherForm').addEventListener('submit', function(e) {
    e.preventDefault();
  
    const latitude = doc.getElementById('latitude').value;
    const longitude = doc.getElementById('longitude').value;
    const url = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&units=metric&lang=ja&appid=${apiKey}`;

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('ネットワークエラー');
            }
            return response.json();
        })
        .then(data => {
            const temperature = data.main.temp;
            const description = data.weather[0].description;
    
            const tempElement = document.createElement('p');
            tempElement.textContent = `温度: ${temperature}°C`;
    
            const descElement = document.createElement('p');
            descElement.textContent = `天気: ${description}`;
    
            const weatherResult = document.getElementById('weatherResult');
            weatherResult.appendChild(tempElement);
            weatherResult.appendChild(descElement);
        })
        .catch(error => {
            document.getElementById('weatherResult').innerHTML = 
                `<p>エラー${error.message}</p>`;
        });
  });