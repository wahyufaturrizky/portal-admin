// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("polarAreaChart");
var polarAreaChart = new Chart(ctx, {
  type: 'polarArea',
  data: {
    labels: ["Red", "Green", "Yellow", "Grey", "Blue"],
    datasets: [{
      label: "My First Dataset",
      data: [11, 16, 7, 3, 14],
      backgroundColor: ["rgb(255, 99, 132, 0.4)", "rgb(75, 192, 192, 0.4)", "rgb(255, 205, 86, 0.4)", "rgb(201, 203, 207, 0.4)", "rgb(54, 162, 235, 0.4)"],
      hoverBackgroundColor: ["rgb(255, 99, 132)", "rgb(75, 192, 192)", "rgb(255, 205, 86)", "rgb(201, 203, 207)", "rgb(54, 162, 235)"],
      borderColor: ["rgb(255, 99, 132)", "rgb(75, 192, 192)", "rgb(255, 205, 86)", "rgb(201, 203, 207)", "rgb(54, 162, 235)"],
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

