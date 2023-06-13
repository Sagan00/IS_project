function getData(url, callback) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var response = JSON.parse(xhr.responseText);
      callback(response);
    }
  };
  xhr.send();
}

// GET request for all records via REST API from server:
getData('http://localhost:8000/read.php', function(response) {
  var dataContainer = document.getElementById('data-container');
  //dataContainer.innerHTML = JSON.stringify(response);

  // Chart 1: Bar chart for Cupper Points by Producer
  var coffeeData = response.coffees;
  var producerLabels = coffeeData.map(function(coffee) {
    return coffee.Producer;
  });
  var cupperPoints = coffeeData.map(function(coffee) {
    return parseFloat(coffee.Cupper_Points);
  });

  var chart1Data = {
    labels: producerLabels,
    datasets: [{
      label: 'Cupper Points',
      data: cupperPoints,
      backgroundColor: 'rgba(75, 192, 192, 0.8)',
    }]
  };

  var chart1Options = {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  };

  var chart1Canvas = document.createElement('canvas');
  var chart1Ctx = chart1Canvas.getContext('2d');
  var chart1 = new Chart(chart1Ctx, {
    type: 'bar',
    data: chart1Data,
    options: chart1Options
  });

  var chart1Label = document.createElement('p');
  chart1Label.innerText = 'Cupper Points by Producer';
  dataContainer.appendChild(chart1Label);
  dataContainer.appendChild(chart1Canvas);

  // Chart 2: Pie chart for Coffee Species
  var speciesData = response.coffees.reduce(function(acc, coffee) {
    var species = coffee.Species === 1 ? 'Arabica' : 'Robusta';
    if (acc[species]) {
      acc[species]++;
    } else {
      acc[species] = 1;
    }
    return acc;
  }, {});

  var chart2Data = {
    labels: Object.keys(speciesData),
    datasets: [{
      data: Object.values(speciesData),
      backgroundColor: ['rgba(255, 99, 132, 0.8)', 'rgba(54, 162, 235, 0.8)']
    }]
  };

  var chart2Options = {};

  var chart2Canvas = document.createElement('canvas');
  var chart2Ctx = chart2Canvas.getContext('2d');
  var chart2 = new Chart(chart2Ctx, {
    type: 'pie',
    data: chart2Data,
    options: chart2Options
  });

  var chart2Label = document.createElement('p');
  chart2Label.innerText = 'Coffee Species';
  dataContainer.appendChild(chart2Label);
  dataContainer.appendChild(chart2Canvas);

  // Chart 3: Line chart for Total Cup Points over Harvest Year
  var harvestYearLabels = coffeeData.map(function(coffee) {
    return coffee.Haravest_Year;
  });
  var totalCupPoints = coffeeData.map(function(coffee) {
    return parseFloat(coffee.Total_Cup_Points);
  });

  var chart3Data = {
    labels: harvestYearLabels,
    datasets: [{
      label: 'Total Cup Points',
      data: totalCupPoints,
      borderColor: 'rgba(255, 206, 86, 0.8)',
      fill: false
    }]
  };

  var chart3Options = {};

  var chart3Canvas = document.createElement('canvas');
  var chart3Ctx = chart3Canvas.getContext('2d');
  var chart3 = new Chart(chart3Ctx, {
    type: 'line',
    data: chart3Data,
    options: chart3Options
  });

  var chart3Label = document.createElement('p');
  chart3Label.innerText = 'Total Cup Points over Harvest Year';
  dataContainer.appendChild(chart3Label);
  dataContainer.appendChild(chart3Canvas);
});