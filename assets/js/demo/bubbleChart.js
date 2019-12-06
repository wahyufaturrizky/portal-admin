// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("bubbleChart");
var bubbleChart = new Chart(ctx, {
  type: 'bubble',
  data: {
    datasets: [{
      label: "My First Dataset",
      data: [{
        x : 20,
				y : 30,
				r : 15
      },
      {
        x : 40,
				y : 10,
				r : 10
      }
    ],
      backgroundColor: "rgb(255, 99, 132, 0.4)",
      hoverBackgroundColor: "rgb(255, 99, 132)",
      borderColor: "rgb(255, 99, 132)",
      borderWidth: 2
    }]
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      // backgroundColor: "rgb(255,255,255)",
      // bodyFontColor: "#858796",
      // borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      // displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Total ' + number_format(tooltipItem.yLabel);
        }
      }
    },
    legend: {
      display: false
    },
    elements: {
      line: {
        tension: 0,
        borderWidth: 3
      }
    },
  },
});

// new Chart(document.getElementById("chartjs-6"), {
// 	"type": "bubble",
// 	"data": {
// 		"datasets": [{
// 			"label": "First Dataset",
// 			"data": [{
// 				"x": 20,
// 				"y": 30,
// 				"r": 15
// 			}, {
// 				"x": 40,
// 				"y": 10,
// 				"r": 10
// 			}],
// 			"backgroundColor": "rgb(255, 99, 132)"
// 		}]
// 	}
// });

