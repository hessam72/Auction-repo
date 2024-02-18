document.getElementById("app").style.visibility = "hidden";
document.onreadystatechange = function() {

    var state = document.readyState;
    if (state == "interactive") {
        document.getElementById("app").style.visibility = "hidden";
    } else if (state == "complete") {

        document.getElementById("interactive");
        // document.getElementById('load').style.visibility = "hidden";
        document.getElementById("load").classList.add("is-invisible");


        setTimeout(function() {
            document.getElementById("app").style.visibility = "visible";
        }, 300);
    }
};