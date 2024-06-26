var pickupTime = document.getElementById("pickupTime");
var dropoffTime = document.getElementById("dropoffTime");

pickupTime.addEventListener("change", updateDays);
pickupTime.addEventListener("change", minDropoffDayUpdate);
dropoffTime.addEventListener("change", updateDays);
dropoffTime.addEventListener("change", totalBiaya);

function minDropoffDayUpdate() {
    dropoffTime.value = "";

    var minDropoffDay = new Date(pickupTime.value);
    minDropoffDay.setDate(minDropoffDay.getDate() + 2);
    minDropoffDay.setHours(0, 0, 0, 0);

    var date = minDropoffDay.toISOString().split("T")[0];
    var time = minDropoffDay.toISOString().split("T")[1].split(":");
    dropoffTime.min = `${date} ${time[0]}:${time[1]}`;
}

function updateDays() {
    // get value from input
    var pickupTimeVal = new Date(pickupTime.value);
    var dropoffTimeVal = new Date(dropoffTime.value);

    var diffTime = Math.abs(dropoffTimeVal - pickupTimeVal);
    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    document.getElementById("totalDays").value = diffDays;
}

function totalBiaya() {
    var totalHari = document.getElementById("totalDays").value;
    var biayaPerhari = document.getElementById("biayaPerhari").value;
    var totalBiaya = totalHari * biayaPerhari;

    // format with currency
    document.getElementById("total-biaya").innerHTML = new Intl.NumberFormat(
        "id-ID",
        { style: "currency", currency: "IDR" }
    ).format(totalBiaya);
}
