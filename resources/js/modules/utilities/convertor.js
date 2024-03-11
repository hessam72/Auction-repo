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

export function convertDBTimeToDate() {
    // Split timestamp into [ Y, M, D, h, m, s ]
    var t = "2010-06-09 13:12:01".split(/[- :]/);

    // Apply each element to the Date function
    var d = new Date(Date.UTC(t[0], t[1] - 1, t[2], t[3], t[4], t[5]));
    return d;
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

