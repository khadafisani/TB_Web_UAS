// toggle sidebar
$(document).ready(function(){  
$("#sidebarToggler").click(function(e) {
        e.preventDefault();
        $("#sidebar").toggleClass("c-sidebar-show");
    });
});

//datetime
function startTime() {
    var today = new Date();
    var weekday = new Array(7);
    weekday[0] = "Minggu";
    weekday[1] = "Senin";
    weekday[2] = "Selasa";
    weekday[3] = "Rabu";
    weekday[4] = "Kamis";
    weekday[5] = "Jumat";
    weekday[6] = "Sabtu";
    
    var monthlist = new Array(12);
    monthlist[0] = "Januari";
    monthlist[1] = "Februari";
    monthlist[2] = "Maret";
    monthlist[3] = "April";
    monthlist[4] = "Mei";
    monthlist[5] = "Juni";
    monthlist[6] = "Juli";
    monthlist[7] = "Agustus";
    monthlist[8] = "September";
    monthlist[9] = "Oktober";
    monthlist[10] = "November";
    monthlist[11] = "Desember";

    var day = weekday[today.getDay()];
    var date = today.getDate();
    var month = monthlist[today.getMonth()];
    var year = today.getUTCFullYear();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('datetime').innerHTML =
    day + "," + date + " " + month + " " + year + " " + h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

$(document).ready(function(){  
    $('#tanggal').datepicker({ 
        footer: true, 
        modal: true,
        format: 'yyyy-mm-dd'
    });
    $('#tanggalLahir').datepicker({ 
        footer: true, 
        modal: true,
        format: 'yyyy-mm-dd'
    });
    $('#waktu').timepicker({
        mode: '24hr',
        format: 'HH:MM'
    });
    $('#jamMulai').timepicker({
        mode: '24hr',
        format: 'HH:MM'
    });
    $('#jamSelesai').timepicker({
        mode: '24hr',
        format: 'HH:MM'
    });
});