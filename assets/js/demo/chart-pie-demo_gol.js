// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChartGol");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Golongan I", "Golongan II", "Golongan III", "Golongan IV"],
    datasets: [{
      data: [20, 30, 30, 20],
      backgroundColor: ['#12492f', '#f56038', '#0a2f35', '#f7a325'],
      hoverBackgroundColor: ['#12491f', '#f56018', '#0a2f15', '#f7a315'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
