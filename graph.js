document.addEventListener("DOMContentLoaded", function () {
    // Fetch data from the PHP file
    fetchData()
        .then(data => {
            // Process data and create the chart
            createChart(data);
        })
        .catch(error => {
            console.error("Error fetching data:", error);
        });
});

function fetchData() {
  return fetch('getData.php')
      .then(response => {
          if (!response.ok) {
              throw new Error(`HTTP error! Status: ${response.status}`);
          }
          return response.text();  // Change to response.text()
      })
      .then(data => {
          console.log(data);  // Log the response to the console
          return JSON.parse(data);
      })
      .catch(error => {
          throw error;
      });
}


function createChart(data) {
    const months = Object.keys(data);
    const records = Object.values(data);
  
    const ctx = document.getElementById('salesChart').getContext('2d');
  
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: months,
        datasets: [{
          label: 'Received Order',
          data: records,
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          x: {
            type: 'category',
            labels: months,
            title: {
              display: true,
              text: 'Months'
            }
          },
          y: {
            beginAtZero: true,
            title: {
              display: true,
              text: 'No. of received order'
            }
          }
        }
      }
    });
  }
  
