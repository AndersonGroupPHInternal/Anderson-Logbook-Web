var displaytime = setInterval(function () { Time() }, 0);
var displaydate = setInterval(function () { Date() }, 0);

function Time() {
    var date = new Date();
    var currentdate = date.toDateString();
    var time = date.toLocaleTimeString();
    document.getElementById("CurrentTime").innerHTML = time;
    document.getElementById("CurrentDate").innerHTML = currentdate;
}
// var canvas = document.getElementById('canvas');
// var context = canvas.getContext('2d');
// var x = 0;
// var y = 0;
// var width = 275;
// var height = 225;
// var imageObj = new Image();

// imageObj.onload = function ()
// {
//    context.drawImage(imageObj, x, y, width, height);
// };
