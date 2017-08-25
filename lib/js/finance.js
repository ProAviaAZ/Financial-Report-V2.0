function financetabs(evt, financeshw) {
    var i, finance2, finance1;
    finance2 = document.getElementsByClassName("finance2");
    for (i = 0; i < finance2.length; i++) {
        finance2[i].style.display = "none";
    }

    finance1 = document.getElementsByClassName("finance1");
    for (i = 0; i < finance1.length; i++) {
        finance1[i].className = finance1[i].className.replace(" act", "");
    }

    document.getElementById(financeshw).style.display = "block";
    evt.currentTarget.className += " act";
}