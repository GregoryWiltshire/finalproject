$(document).ready(function () {
    $("#myDate2").on("change", function () {
        var olddate = new Date($("#myDate1").val());
        var newdate = new Date($(this).val());
        var timeDiff = Math.abs(newdate.getTime() - olddate.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
        document.getElementById("DayAmount").innerHTML = "$" + diffDays * 10 + " is your " +
            "total for the parking slot.";
        document.getElementById("VIPAmount").innerHTML = "$" + diffDays * 20 + " is your " +
            "total for VIP secured parking.";
        document.getElementById("randomAmount").innerHTML = "There are " + 1 * Math.floor(Math.random() * 10)
            + " spots left for you to choose.";
    });
});

function generateRandom() {
    Math.floor(Math.random(1) * 10);
}
