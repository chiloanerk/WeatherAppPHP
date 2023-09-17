function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    console.log("Received location:", position);

    // Get the latitude and longitude
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    // Update the form fields with the captured values
    document.getElementById("latitude").value = latitude;
    document.getElementById("longitude").value = longitude;
    document.getElementById("city").value = '';

    // Submit the form programmatically
    document.getElementById("weatherForm").submit();
}
