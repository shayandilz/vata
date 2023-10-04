require('./bootstrap');
import $ from "jquery";
import AOS from 'aos';
import 'aos/dist/aos.css'; // You can also use <link> for styles

$(document).ready(function () {

})


document.addEventListener('DOMContentLoaded', function () {
    /*Declare time*/
    const targetDate = new Date(jsData.date).getTime();
    function updateCountdown() {
        const now = new Date().getTime();
        const timeLeft = targetDate - now;

        const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

        document.getElementById("days").textContent = days < 10 ? "0" + days : days;
        document.getElementById("hours").textContent = hours < 10 ? "0" + hours : hours;
        document.getElementById("minutes").textContent = minutes < 10 ? "0" + minutes : minutes;
        document.getElementById("seconds").textContent = seconds < 10 ? "0" + seconds : seconds;
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);

    var demo = document.getElementById('header_title');
    var messages = [
        'کلیک کن و برو به اینستاگرام genius.drink',

    ]
    var currentText = 0;

// function type
    function type() {
        if (!messages[currentText]) {
            currentText = 0;
        }
        var text = '';
        var currentLetter = 0;
        var set1 = setInterval(function () {
            if (messages[currentText][currentLetter]) {
                text += messages[currentText][currentLetter++];
                demo.innerHTML = text;
            } else {
                setTimeout(function () {
                    deleteMsg(text);
                }, 2000);
                clearInterval(set1);
                currentText++;
            }
        }, 70);
    }


// deleteMsg
    function deleteMsg(str) {
        var set2 = setInterval(function () {
            if (str.length === 0) {
                type();
                clearInterval(set2);
            } else {
                str = str.split('');
                str.pop();
                // str.shift();
                str = str.join('');
                demo.innerHTML = str;
            }
        }, 20);
    }

    type();


});


