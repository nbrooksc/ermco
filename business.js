 var networkChart = c3.generate({
  bindto: '#networkChart',
 
    data: {
        columns: [
            ['Wire on Hand (Linear Feet)', 1000, 2400],
        ],
        type: 'bar',
	color: function (color, d) {
		return d.index === 0 ? "#808080" : "#428bca";
	    
	}
    },
    axis: {
	rotated: true,
        x: {
	    type: 'category',
	    categories: ['18-4', 'CAT-5',],
	    label: {
	      text: 'Wire Type',
	      position: 'outer-middle'
	    },
	}, 
	y: {
 	  tick: {
	    values: [1000, 2000, 3000] 
	  }
   	} 
    }, 
    bar: {
        width: {
            ratio: 0.5 // this makes bar width 50% of length between ticks
        }
        // or
        //width: 100 // this makes bar width 100px
    }
});


var warehouseChart = c3.generate({
  bindto: '#warehouseChart',
 
    data: {
        columns: [
            ['Wire on Hand (Linear Feet)', 350, 400],
        ],
        type: 'bar',
	color: function (color, d) {
		return d.index === 0 ? "#808080" : "#428bca";
	}
    },
    axis: {
	rotated: true,
        x: {
	    type: 'category',
	    categories: ['18-4', 'CAT-5',],
	    label: {
	      text: 'Wire Type',
	      position: 'outer-middle'
	    }
	},
        y: {
	  tick: {
	    values: [200, 400, 600, 800]
	  }
	}
    },	  
    bar: {
        width: {
            ratio: 0.5 // this makes bar width 50% of length between ticks
        }
        // or
        //width: 100 // this makes bar width 100px
    }
});


var jobSiteChart = c3.generate({
  bindto: '#jobSiteChart',
 
    data: {
        columns: [
            ['Wire on Hand (Linear Feet)', 2000, 650],
        ],
        type: 'bar',
	color: function (color, d) {
	   	return d.index === 0 ? "#808080" : "#428bca";
	}
    },
    axis: {
	rotated: true,
        x: {
	    type: 'category',
	    categories: ['18-4', 'CAT-5',],
	    label: {
	      text: 'Wire Type',
	      position: 'outer-middle'
	    }
	},
	y: {
	  tick: {
	    values: [800, 1600]
	  }
	}
    },	  
    bar: {
        width: {
            ratio: 0.5 // this makes bar width 50% of length between ticks
        }
        // or
        //width: 100 // this makes bar width 100px
    }
});

var chart = c3.generate({
    bindto: '#chart',
    data: {
        columns: [
            ['Length of Wire Purchased for Job (Linear Feet)', 650, 2000, 825],
            ['Length of Wire Pulled Out (Linear Feet)', 0, 0, 750]
        ],
        type: 'bar'
    },
    axis: {
        x: {
	    type: 'category',
	    categories: ['18-4', 'CAT-5', 'CAT-6']
	}
    },	  
    bar: {
        width: {
            ratio: 0.5 // this makes bar width 50% of length between ticks
        }
        // or
        //width: 100 // this makes bar width 100px
    }
});

function updateChart() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var resp = xhttp.responseText;
      // newUpdate(resp);
    }
  };
  xhttp.open("GET", "getBoxOneCurrent.php", true);
  xhttp.send();
}

var installerChart = c3.generate({
    bindto: '#installerChart',
    data: {
        columns: [
            ['Wire on Hand', 145, 445, 328]
        ],
        type: 'bar'
    },
    axis: {
        x: {
	    type: 'category',
	    categories: ['18-4', 'CAT-5', 'CAT-6']
	}
    },	  
    bar: {
        width: {
            ratio: 0.5 // this makes bar width 50% of length between ticks
        }
        // or
        //width: 100 // this makes bar width 100px
    }
});

function updateOnHand(firstBox, secondBox, thirdBox) {
  

  jobSiteCharge.load({
    columns: [
      ['Wire on Hand (Linear Feet)', 200, 200]
    ]
  });
} 

function newUpdate(firstBox, secondBox, thirdBox) {
  installerChart.load({
    columns: [
      ['Wire on Hand', firstBox, 445, 328]
    ]
  });

  var currentlyPulled = 250 + (725 - firstBox);

  // readings should be 650, 1000, 1000 initially 
  // however they may be inaccurate, and inaccuracies can lead to negative (illogical) readings
  // so fix anything that's over the max
 /* 
  if (firstBox > 650) {
    firstBox = 650;
  } */
/*
  if (secondBox > 1000) {
    secondBox = 1000;
  }

  if (thirdBox > 1000) {
    secondBox = 1000;
  }
*/
  firstOrange = (750 - firstBox) * 5;
  secondOrange = (2500 - secondBox - thirdBox) * 5;


  chart.load({
    columns: [
      ['Length of Wire Purchased for Job (Linear Feet)', 650, 2000, 825],
      ['Length of Wire Pulled Out (Linear Feet)', firstOrange, secondOrange, 750]
    ]
  });

  // update Daily Materials Tracking chart
  //

  var catRemaining = parseInt(secondBox) + parseInt(thirdBox);

  document.getElementById("catRemaining").innerHTML = catRemaining;
  document.getElementById("eighteenRemaining").innerHTML = firstBox;

  document.getElementById("eighteenPulls").innerHTML = 750 - firstBox;
  document.getElementById("catPulls").innerHTML = 2500 - catRemaining;
}


//updateChart();
//var id = setInterval(function() { updateChart() },2000);


//createInstallerChart(195);

function week() {
  chart.load({
    unload: true,
    columns: [
            ['Weekly Average', 28, 225, 315, 205, 145, 280],
            ['Current', 30, 200, 100, 400, 150, 250]
        ]
  });
}


function updateWire() {
  update();
  //newUpdate(500, 500, 500);
  setTimeout(function() {
    alert("Running low on Cat-5 Cable at Job Site #1");
  }, 16000)


  var id = setInterval(function() { update() },2000);
  function update() {
  var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 4 && xhttp.status == 200) {
        var resp = xhttp.responseText;
        var jsonResponse = JSON.parse(resp);
        var boxOne = jsonResponse["one"];
        var boxTwo = jsonResponse["two"];
	var boxThree = jsonResponse["three"];

	document.getElementById("boxOneCurrent").innerHTML = boxOne + " ft";
        document.getElementById("boxTwoCurrent").innerHTML = boxTwo + " ft";
	document.getElementById("boxThreeCurrent").innerHTML = boxThree + " ft";
	// pass values to newUpdate to update Project Tracking Chart
	newUpdate(boxOne, boxTwo, boxThree);
      }
    };
    xhttp.open("GET", "updateBoxes.php", true);
    xhttp.send();
  }
}

function month() {
  chart.load({
    unload: true,
    columns: [
            ['Monthly Average', 85, 205, 110, 205, 145, 305],
            ['Current', 30, 200, 100, 400, 150, 250]
        ]
  });
}

function year() {
  chart.load({
    unload: true,
    columns: [
            ['Annual Average', 140, 240, 215, 290, 185, 270],
            ['Current', 30, 200, 100, 400, 150, 250]
        ]
  });
}

scatterchart = c3.generate({
    bindto: '#scatterchart',
    data: {
        x: 'x', 
        // iris data from R
        columns: [
	    ["x", "2017-06-01", "2017-06-02", "2017-06-03", "2017-06-04", "2017-06-05", "2017-06-06", "2017-06-07", "2017-06-08", "2017-06-09", "2017-06-10", "2017-06-11", "2017-06-12", "2017-06-13", "2017-06-14", "2017-06-15", "2017-06-16", "2017-06-17", "2017-06-18", "2017-06-19", "2017-06-20", "2017-06-21", "2017-06-22", "2-17-06-23", "2017-06-24", "2017-06-25", "2017-06-26", "2017-06-27", "2017-06-28", "2017-06-29", "2017-06-30"],
            ["Chicago Ave", 45, 48, 58, 55, 52, 38, 43, 56, 52, 21, 17, 15, 55, 56, 39, 51, 47, 28, 47, 38, 36, 42, 61, 43, 45, 59, 38, 36, 45, 52],
            ["South Loop", 40, 39, 46, 42, 41, 47, 55, 38, 42, 43, 37, 57, 49, 48, 47, 18, 49, 38, 36, 41, 43, 37, 45, 40, 40, 34, 37, 41, 29, 32],
            ["Danger Zone", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30]
	],
        type: 'scatter',
	types: {
	    'Danger Zone': 'area'
	}
    },
    axis: {
        x: {
	    type: 'timeseries',
            label: 'Date',
            tick: {
                format: '%m-%d' //function (x) { return x.getFullYear(); }
            }
        },
        y: {
            label: 'PSI Reading'
        }
    },
    tooltip: {
	format: {
	    title: function (d) { return ("June " + d.getUTCDate()); },
	    name: function (name, ratio, id, index) { return name; },       // function (d) { return 'Data ' + d; }
	    value: function (value, ratio, id, index) { return (value + " PSI"); }
	}
    }
});

w3.includeHTML();
