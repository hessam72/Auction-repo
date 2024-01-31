export function translateAuctionStatus(value) {
    if (value === 1) return 'Active';
    if (value === 0) return 'DeActive';
    if (value === 3) return 'Finished';
    if (value === 100) return 'Open';


    return value;
}

export function convertDateToMilliSeconds(time) {
    // var date = new Date("11/21/1987 16:00:00"); // some mock date
    var date = new Date(time)
    var milliseconds = date.getTime();
    // This will return you the number of milliseconds
    // elapsed from January 1, 1970 
    // if your date is less than that date, the value will be negative
    var now = new Date();
    var nowMili = now.getTime();

    var difference = milliseconds - nowMili;


    return difference;
}

export function dayOfWeek(number) {
    if (number === 0) return "شنبه";
    if (number === 1) return "یکشنبه";
    if (number === 2) return "دوشنبه";
    if (number === 3) return "سه شنبه";
    if (number === 4) return "چهارشنبه";
    if (number === 5) return "پنج شنبه";
    if (number === 6) return "جمعه";
}

export function splitPrice(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

}

export function validatePhone(number) {
    var regex = new RegExp("^(\\+98|0)?9\\d{9}$");
    var result = regex.test(number);
    return result;
}