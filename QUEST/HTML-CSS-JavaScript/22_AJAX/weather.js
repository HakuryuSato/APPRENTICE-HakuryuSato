const doc = document
const weatherForm = doc.getElementById("weatherForm")
const weatherResult = doc.getElementById("weatherResult")

doc.addEventListener("submit",function(event){
    event.preventDefault;
    const latitude = weatherForm.getElementById("latitude")
    const longitude = weatherForm.getElementById("longitude")

    
    console.log(latitude,longitude)
})