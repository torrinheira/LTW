'use strict';

// TODO: ensure the dates are greater than todays date

let checkIn = document.getElementById('checkin');
let checkOut = document.getElementById('checkout');

if (checkIn && checkOut) {
    checkIn.addEventListener('change', validateCheckIn);
    checkOut.addEventListener('change', validateCheckOut);
}


function validateCheckIn(event) {
    event.preventDefault();

    if (checkOut.value > checkIn.value)
        return;
        
    let checkInDate = new Date(checkIn.value);
    let checkOutDate = new Date(+checkInDate);
    let nextDay = checkInDate.getDate() + 1;
    checkOutDate.setDate(nextDay);
    checkOut.value = checkOutDate.toISOString().split('T')[0];
}

function validateCheckOut(event) {
    event.preventDefault();

    if (checkOut.value > checkIn.value)
        return;

    let checkOutDate = new Date(checkOut.value);
    let checkInDate = new Date(+checkOutDate);
    let previousDay = checkOutDate.getDate() - 1;
    checkInDate.setDate(previousDay);
    checkIn.value = checkInDate.toISOString().split('T')[0];
}