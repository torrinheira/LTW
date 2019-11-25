'use strict'


let checkIn = document.getElementById('check-in');
let checkOut = document.getElementById('check-out');

checkIn.addEventListener('change', validateCheckIn);
checkOut.addEventListener('change', validateCheckOut);


function validateCheckIn(event) {
    event.preventDefault();

    if (checkOut.value > checkOut.value)
        return;
        
    let checkInDate = new Date(checkIn.value);
    let checkOutDate = new Date(+checkInDate);
    let nextDay = checkInDate.getDate() + 1;
    checkOutDate.setDate(nextDay);
    checkOut.value = checkOutDate.toISOString().split('T')[0];
}

function validateCheckOut(event) {
    event.preventDefault();
    if (checkOut.value < checkOut.value)
        return;

    let checkOutDate = new Date(checkOut.value);
    let checkInDate = new Date(+checkOutDate);
    let previousDay = checkOutDate.getDate() - 1;
    checkInDate.setDate(previousDay);
    checkIn.value = checkOutDate.toISOString().split('T')[0];
}