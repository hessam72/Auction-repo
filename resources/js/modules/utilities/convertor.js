export function  convertSecondsToTime(sec) {
    const date = new Date(null);
    date.setSeconds(sec);
    const result = date.toISOString().slice(11, 19);
    return result;
}