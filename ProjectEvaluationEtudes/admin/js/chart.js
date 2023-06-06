// LOAD STATISTIQUES PAGE CHART
const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["pas du tout d'accord", "pas d'accord", "Moyennement d'accord", "d'accord", "entierement d'accord"],
      datasets: [{
        label: 'statistiques questionnaire',
        data: [12, 19, 3, 5, 2],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });