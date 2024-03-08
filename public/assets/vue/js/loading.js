document.getElementById("app").style.visibility = "hidden";
document.getElementById("load").classList.remove("hide-loader");
document.onreadystatechange = function() {

    var state = document.readyState;
    if (state == "interactive") {
        document.getElementById("app").style.visibility = "hidden";
    } else if (state == "complete") {

        document.getElementById("interactive");
        // document.getElementById('load').style.visibility = "hidden";
       


        setTimeout(function() {
            document.getElementById("load").classList.add("hide-loader");
            document.getElementById("app").style.visibility = "visible";
        }, 700);
    }
};