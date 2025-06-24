$(function () {
  //get origin year
  let stat_origin_year = sessionStorage.getItem("stat_year");
  if (stat_origin_year == null || stat_origin_year == "") {
    stat_origin_year = new Date().getFullYear();
  }

  // get total request per class annually
  $.ajax({
    url: "/get-total-req-per-class-annually",
    method: "POST",
    headers: {
      "X-CSRF-TOKEN": $('.data-csrf_token').data('csrf'),
    },
    data: {
      stat_origin_year: stat_origin_year,
    },
    dataType: "json",
    success: function (r) {
      if (r.success) {
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        var ctx = document.getElementById("annualPieChart");
        ctx.width = 300;
        ctx.height = 300;
        var annualPieChart = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: r.annual_count_per_class_label,
            datasets: [{
              data: r.annual_count_per_class,
              backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'],
              hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#f4b619'],
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
              display: true,
              position: 'bottom'
            },
            cutoutPercentage: 0, //set to zero to set as pie
            plugins: {
              labels: {
                render: 'value',
                fontSize: 14,
                fontStyle: 'bold',
                fontColor: '#fff',
                fontFamily: '"Lucida Console", Monaco, monospace'
              },
            },
          },
        });
      }
    },
    error: function (err) {
      console.log(err);
    }
  })

  // get total client per gender annually
  $.ajax({
    url: "/get-total-client-per-gender-annually",
    method: "POST",
    headers: {
      "X-CSRF-TOKEN": $('.data-csrf_token').data('csrf'),
    },
    data: {
      stat_origin_year: stat_origin_year,
    },
    dataType: "json",
    success: function (r) {
      if (r.success) {

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        var ctx = document.getElementById("clientsGenderPieChart");
        ctx.width = 300;
        ctx.height = 300;
        var clientsGenderPieChart = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ['Male', 'Female'],
            datasets: [{
              data: [r.male_client, r.female_client],
              backgroundColor: ['#4e73df', '#ff6b81'],
              hoverBackgroundColor: ['#2e59d9', '#ff4757'],
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
              display: true,
              position: 'bottom'
            },
            cutoutPercentage: 0, //set to zero to set as pie
            plugins: {
              labels: {
                render: 'value',
                fontSize: 14,
                fontStyle: 'bold',
                fontColor: '#fff',
                fontFamily: '"Lucida Console", Monaco, monospace'
              },
            },
          },
        });
      }
    },
    error: function (err) {
      console.log(err);
    }
  })
});
