export function init_submit_btn() {
    var target = $("#spin");
    if (target.hasClass("done")) {
        // Do nothing
    } else {
        target.addClass("processing");
        setTimeout(function () {
            target.removeClass("processing");
            target.addClass("done");
        }, 2200);
        setTimeout(function () {
            target.removeClass("done");
        }, 4000);
    }
}
