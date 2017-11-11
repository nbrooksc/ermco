/* $(document).ready(function() {
  $('[data-toggle="popover"]').popover();
}); */


var chart = c3.generate({
    bindto: '#chart',
    data: {
        columns: [
            ['data1', 30, 200, 100, 400, 150, 250, 50, 100, 250]
        ],
        type: 'bar',
        names: {
            data1: 'Type'
        },
	colors: {
	    data1: '#ff8c00'
	}	
   },
    axis: {
        x: {
            type: 'category', // this needed to load string x value
           categories: ['Pilsner', 'IPA', 'Stout', 'Lager', 'Bock', 'Porter', 'Wheat', 'Belgian', 'Brown Ale']
        }
    },
    tooltip: {
        format: {
            name: function (name, ratio, id, index) { return 'Total Units '; }

        }
    },
    title: {
       //  text: 'Total # of Units'
    }
});

function perc() {

  d3.select('#title').text("Inventory (all)");

  document.getElementById('percentage').innerHTML = "<a onclick='total()'>Aggregate (as #)</a>";
  chart.load({
    unload: true,
    columns: [
      ['data1', 3, 35, 15, 95, 22, 40, 8, 15, 40]
    ]
  });
  

}

function addTitle() {


var title = d3.select('#chart svg').append('text')
  .attr('x', d3.select('#chart svg').node().getBoundingClientRect().width /2)
  .attr('y', 16)
  .attr('id', 'title')
  .style('text-anchor', 'middle')
  .style('font-size', '1.4em')
  .text('Inventory');

}

function lombard() {

var title = d3.select('#title');

title.text("Inventory (Lombard)");

  chart.load({
    unload: true,
    columns: [
      ['data1', 15, 100, 0, 50, 25, 100, 0, 30, 175]
    ]
  });
}

!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");

function updateWire() {
  update();
  var id = setInterval(function() { update() },2000);

  function update() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 4 && xhttp.status == 200) {
        var resp = xhttp.responseText;
        var jsonResponse = JSON.parse(resp);
        var panelData = jsonResponse["panel"];

        document.getElementById("panel-strip").innerHTML = panelData;
     
      }
    };
    xhttp.open("GET", "updateBoxes.php", true);
    xhttp.send();
  }
}

function updateLive() {
  times();
  var id = setInterval(function() { times() },2000);

  function times() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 4 && xhttp.status == 200) {
        var resp = xhttp.responseText;
        var jsonResponse = JSON.parse(resp);
        var panelData = jsonResponse["panel"];
        document.getElementById("live-panel").innerHTML = panelData; 
        var hasRun = jsonResponse["hasRun"];
        var alertsResponse = jsonResponse["alerts"];

	// alertsResponse is a string
	// Convert it to a JSON array 	
	var alertsArray = JSON.parse(alertsResponse);

	setAlerts(alertsArray);

        if (hasRun == false) {
	   // Get first item from array 
	   // send it to newAlert

	   var firstKey = Object.keys(alertsArray)[0]; 
	   var firstArray = [firstKey, alertsArray[firstKey]];	 

	   setTimeout(function() {
	    newAlert(firstArray);
	  }, 7000)
	}        

      }
    };
    
    xhttp.open("GET", "getFirstRecent.php", true);
    xhttp.send();
  } 
 
}

function setAlerts(alertsArray) {
  // Create vars for tracking the 
  // total number of different types of alerts

  var presAlert = 0;
  var tempAlert = 0;
  var volAlert = 0;

  for (var key in alertsArray) {
  //  alert("key is " + key + " and value is " + alertsArray[key]);
    switch (alertsArray[key]) {
      case "Temperature":
	tempAlert++;
	break;
      case "Pressure":
	presAlert++;
	break;
      case "Volume":
	volAlert++;
	break;
      default:
	;
	break;
      }
  }


  // variable to get grammar right
  // ie one keg = 'keg'
  // two kegs = 'kegs'
  var keg = "Kegs";



  // update the badges to reflect current
  // number of alerts
  
  if (presAlert == 1) {
    keg = "Keg";
  }

  document.getElementById("pressureAlert").innerHTML = presAlert + " " + keg;

  if (tempAlert == 1) {
    keg = "Keg";
  } else {
    keg = "Kegs";
  }

  document.getElementById("temperatureAlert").innerHTML = tempAlert + " " + keg;
  
  if (volAlert == 1) {
    keg = "Keg";
  } else {
    keg = "Kegs";
  }


  document.getElementById("volumeAlert").innerHTML = volAlert + " " + keg;


}

function newAlert(kegAlert) {
  var txt;

  var retVal = confirm("Keg " + kegAlert[0] + " is out of " + kegAlert[1] + " range. Click OK for more information.");
  if (retVal == true) {
    window.location.href = "tables2.php?alert=" + kegAlert[1];
  }
  


}





function loop() {

d3.select('#title').text("Inventory (South Loop)");




  chart.load({
    unload: true,
    columns: [
      ['data1', 10, 50, 25, 250, 25, 100, 0, 0, 40]
    ]
  });
}

function chicago() {
  d3.select('#title').text("Inventory (Chicago Ave)");


  chart.load({
    unload: true,
    columns: [
      ['data1', 5, 50, 75, 100, 100, 50, 50, 70, 35]
    ]
  });
}

function total() {
  document.getElementById('percentage').innerHTML = "<a onclick='perc()'>Aggregate (as %)</a>";

  d3.select('#title').text("Inventory (all)");

  chart.load({
    unload: true,
    columns: [
      ['data1', 30, 200, 100, 400, 150, 250, 50, 100, 250]
    ]
  });

}

function daily() {

  chart.load({
    unload: true,
    columns: [
      ['data1', 12, 45, 35, 87, 92, 141, 11, 12, 44]
    ]
  });
}

function weekly() {

  chart.load({
    unload: true,
    columns: [
      ['data1', 30, 200, 100, 400, 150, 250, 50, 100, 250]
    ]
  });
}

function monthly() {

  chart.load({
    unload: true,
    columns: [
      ['data1', 72, 335, 550, 575, 225, 115, 383, 177, 412]
    ]
  });
}



pieChart = c3.generate({
    bindto: '#pieChart',
    data: {
        columns: [
            ['Full', 38],
            ['Transit', 12],
            ['At Home', 18],
            ['In Use', 32]
        ],
        type: 'pie',
        names: {
        }
    },
    pie: {
        label: {
            format: function (value, ratio, id) {
                return id;
            }
        }
    },

    title: {
        text: 'Allocation of Kegs Process'
    },
    legend: {
       //  position: 'inset'
    }
});

w3.includeHTML();
