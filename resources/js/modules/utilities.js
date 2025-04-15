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

    if (number === 0) return "یکشنبه";
    if (number === 1) return "دوشنبه";
    if (number === 2) return "سه شنبه";
    if (number === 3) return "چهارشنبه";
    if (number === 4) return "پنج شنبه";
    if (number === 5) return "جمعه";
    if (number === 6) return "شنبه";
}



export function validatePhone(number) {
    var regex = new RegExp("^(\\+98|0)?9\\d{9}$");
    var result = regex.test(number);
    return result;
}


export function toTitleCase(str) {
    return str.replace(/\w\S*/g, (txt) => {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
}
export function splitPrice(number) {
    if (number) return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    else return 0;
}
export function formatDate(input) {
    const date = new Date(input);
    const year = new Intl.DateTimeFormat("en", { year: "numeric" }).format(
        date
    );
    const month = new Intl.DateTimeFormat("en", { month: "short" }).format(
        date
    );
    const day = new Intl.DateTimeFormat("en", { day: "2-digit" }).format(date);
    const hour = new Intl.DateTimeFormat("en", { hour: "numeric" }).format(
        date
    );
    const minute = new Intl.DateTimeFormat("en", { minute: "2-digit" }).format(
        date
    );

    return { year, month, day, hour, minute };
}
export function formatCreatedAt(input) {
    const date = new Date(input);
    const year = new Intl.DateTimeFormat("en", { year: "numeric" }).format(
        date
    );
    const month = new Intl.DateTimeFormat("en", { month: "short" }).format(
        date
    );
    const day = new Intl.DateTimeFormat("en", { day: "2-digit" }).format(date);
    // const hour = new Intl.DateTimeFormat('en', { hour: 'short' }).format(date)
    const minute = new Intl.DateTimeFormat("en", { minute: "2-digit" }).format(
        date
    );

    return `${day}-${month}-${year} | ${date.getHours()}:${date.getMinutes()}`;
}
