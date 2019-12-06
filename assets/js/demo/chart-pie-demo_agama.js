// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChartAgama");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Islam", "Kristen", "Katolik", "Hindu", "Budha", "Konghucu"],
    datasets: [{
      data: [20, 30, 30, 20, 5, 5],
      backgroundColor: ['#12492f', '#f56038', '#0a2f35', '#f7a325', '#5599f5', '#27ab76'],
      hoverBackgroundColor: ['#12491f', '#f56018', '#0a2f15', '#f7a315', '#27ab16'],
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
