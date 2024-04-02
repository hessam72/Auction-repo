export function convertSecondsToTime(sec) {
    const date = new Date(null);
    date.setSeconds(sec);
    const result = date.toISOString().slice(11, 19);
    return result;
}
export function secToEndOfMonth() {
    var today = new Date();
    var lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);
    var seconds = lastDayOfMonth.getTime() / 1000;
    return seconds;
}
export function secToEndOfWeek() {
    var curr = new Date();
    var firstday = new Date(curr.setDate(curr.getDate() - curr.getDay()));
    var lastday = new Date(curr.setDate(curr.getDate() - curr.getDay() + 6));
    var seconds = lastday.getTime() / 1000;
    console.log(seconds);
    return seconds;
}
export function secToEndOfDay() {
    var d = new Date();
    var h = d.getHours();
    var m = d.getMinutes();
    var s = d.getSeconds();
    var seconds = 24 * 60 * 60 - h * 60 * 60 - m * 60 - s;

    return seconds;
}

export function convertDBTimeToDate(time) {
    var arr = [];
    const monthNames = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];
    var date = new Date(time);
    var dd = String(date.getDate()).padStart(2, "0");
    var mm = monthNames[date.getMonth()];
    var yyyy = date.getFullYear();
    var convertedDate = mm + "/" + dd + "/" + yyyy;
    return convertedDate;
}
export function convertDBTimeToTime(time) {
   
   
    var date = new Date(time);
   
    var hh = date.getHours();
    var mm = date.getMinutes();
    var ss = date.getSeconds();
    var convertedDate = hh + ":" + mm + ":" + ss;
    return convertedDate;
}
export function  merge(source, target = {}, ...parents) {
    for (let [key, value] of Object.entries(source)) {
        const path = (parents || []).concat(key);
        if (typeof value === "object") {
            merge(value, target, ...path);
            continue;
        }
        target[path.join(".")] = value;
    }
    return target;
};
export function  arrangeData(data){
    var arr=[];
    data.forEach( (item, index) =>{
      arr.push(merge(item))
    });
    
  
    return arr;
  };

  export function calDaysPassed(date){
    const date1 = new Date(date);
    const date2 = new Date();
    const diffTime = Math.abs(date2 - date1);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
   
    return diffDays;
  }

