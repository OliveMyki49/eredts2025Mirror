$(function () {
  //get origin year
  let stat_origin_year = sessionStorage.getItem("stat_year");
  if (stat_origin_year == null || stat_origin_year == "") {
    stat_origin_year = new Date().getFullYear();
  }

  //get annual requests per sub class
  $.ajax({
    url: "get-annual-sub-class-requests",
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

        function number_format(number, decimals, dec_point, thousands_sep) {
          // *     example: number_format(1234.56, 2, ',', ' ');
          // *     return: '1 234,56'
          number = (number + '').replace(',', '').replace(' ', '');
          var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
              var k = Math.pow(10, prec);
              return '' + Math.round(n * k) / k;
            };
          // Fix for IE parseFloat(0.55).toFixed(0) = 0;
          s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
          if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
          }
          if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
          }
          return s.join(dec);
        }

        // Bar Chart Example
        let ctx = document.getElementById("annualBarChart");
        ctx.width = ctx.parentElement.clientWidth;
        ctx.height = 300;
        let annualBarChart = new Chart(ctx, {
          type: 'horizontalBar',
          data: {
            labels: r.annual_count_per_sub_class_label,
            datasets: [{
              label: "Requests: ",
              backgroundColor: "#4e73df",
              hoverBackgroundColor: "#2e59d9",
              borderColor: "#4e73df",
              data: r.annual_count_per_sub_class,
            }],
          },
          options: {
            maintainAspectRatio: false,
            layout: {
              padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
              }
            },
            scales: {
              maxBarThickness: 25,
            },
            legend: {
              display: false
            },
            tooltips: {
              titleMarginBottom: 10,
              titleFontColor: '#6e707e',
              titleFontSize: 14,
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              caretPadding: 10,
            },
            plugins: {
              labels: {
                render: 'value',
                fontColor: '#fff',
                textShadow: true,
                shadowColor: 'rgba(0,0,0,11)',
              },
            }
          }
        });
      }
    },
    error: function (err) {
      console.log(err);
    }
  });

  //get annual requests per receiving office
  $.ajax({
    url: "get-annual-requests-per-receiving-office",
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

        function number_format(number, decimals, dec_point, thousands_sep) {
          // *     example: number_format(1234.56, 2, ',', ' ');
          // *     return: '1 234,56'
          number = (number + '').replace(',', '').replace(' ', '');
          var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
              var k = Math.pow(10, prec);
              return '' + Math.round(n * k) / k;
            };
          // Fix for IE parseFloat(0.55).toFixed(0) = 0;
          s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
          if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
          }
          if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
          }
          return s.join(dec);
        }

        // Bar Chart Example
        let ctx = document.getElementById("annualBarChartPerReceivingOffice");
        ctx.width = ctx.parentElement.clientWidth;
        ctx.height = 300;
        let annualBarChartPerReceivingOffice = new Chart(ctx, {
          type: 'horizontalBar',
          data: {
            labels: r.annual_count_per_receiving_office_label,
            datasets: [{
              label: "Requests: ",
              backgroundColor: "#4e73df",
              hoverBackgroundColor: "#2e59d9",
              borderColor: "#4e73df",
              data: r.annual_count_per_receiving_office,
            }],
          },
          options: {
            maintainAspectRatio: false,
            layout: {
              padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
              }
            },
            scales: {
              maxBarThickness: 25,
            },
            legend: {
              display: false
            },
            tooltips: {
              titleMarginBottom: 10,
              titleFontColor: '#6e707e',
              titleFontSize: 14,
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              caretPadding: 10,
            },
            plugins: {
              labels: {
                render: 'value',
                fontColor: '#fff',
                textShadow: true,
                shadowColor: 'rgba(0,0,0,11)',
              },
            }
          }
        });
      }
    },
    error: function (err) {
      console.log(err);
    }
  });
});

