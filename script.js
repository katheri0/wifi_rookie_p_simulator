
    function generateRandomNumber(ideml) {
    
    var randomNumber = Math.floor(Math.random() * 100) + 1;


    document.getElementById(ideml).innerText = randomNumber;
}

    generateRandomNumber('randomNumberDisplay');
    generateRandomNumber('randomNumberDisplay1');


    setInterval(function() {
        generateRandomNumber('randomNumberDisplay');
        generateRandomNumber('randomNumberDisplay1');}, 500);
