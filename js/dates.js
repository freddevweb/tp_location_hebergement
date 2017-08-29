// console.log(dates);

// console.log(dates["0"]);

// console.log(dates);

var $datepicker1 = $("#arrivee");
var $datepicker2 = $("#depart");



var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1;
var yyyy = today.getFullYear();
var now = yyyy+"-"+mm+"-"+dd;
console.log(now);



$( function() {
    $( "#datepicker" ).datepicker();
    console.log($( "#datepicker" ))
} );






// var arrivee = document.getElementById("arrivee").setAttribute("min", now);


// var arrayReserve = new array();

// for(var i = 0; i<dates.length; i++){
//     if( dates[i]["date_debut"] < now ){
//         dates[i]["date_debut"] = now;
//     }

//     for(var j = dates[i]["date_debut"]; j<dates[i]["date_fin"]; j++){
//         var date = new Date (dates[i]["date_debut"]);

//     }

//     console.log(dates[i]["date_debut"] );
// }
