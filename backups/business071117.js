var chart = c3.generate({
    bindto: '#chart',
    data: {
        columns: [
            ['Average', 65, 215, 95, 315, 150, 305],
            ['Current', 30, 200, 100, 400, 150, 250]
        ],
        type: 'bar'
    },
    axis: {
        x: {
	    type: 'category',
	    categories: ['Pilsner', 'IPA', 'Stout', 'Lager', 'Bock', 'Porter']
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

function week() {
  chart.load({
    unload: true,
    columns: [
            ['Weekly Average', 28, 225, 315, 205, 145, 280],
            ['Current', 30, 200, 100, 400, 150, 250]
        ]
  });
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
            ["South Loop", 40, 39, 46, 42, 41, 47, 55, 38, 42, 43, 37, 57, 49, 48, 47, 18, 49, 38, 36, 41, 43, 37, 45, 40, 40, 34, 37, 41, 29, 32]
        ],
        type: 'scatter'
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
