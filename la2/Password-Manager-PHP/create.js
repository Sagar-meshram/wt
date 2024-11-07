function create() {
    var password = "";
    var pool = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*-_+=~:.?";

    // Random Number Function
    function getRndInteger(min, max) {
        return Math.floor(Math.random() * (max - min)) + min; // Generates a random integer between min (inclusive) and max (exclusive)
    }

    // Password Create Function
    for (var i = 0; i < 15; i++) { 
        var num = getRndInteger(0, pool.length); // Dynamically use pool length to avoid hardcoding the number 78
        password += pool[num]; 
    }

    // Set the generated password in the input field
    document.getElementById('password').value = password;
}
