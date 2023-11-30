@extends('layouts.app')
@section('content')
<style>
  .chartsize {
    max-width: 500px;
    margin: 0 auto;
  }
</style>
<canvas class="chartsize" id="task"></canvas>
<canvas class="chartsize" id="month_wise"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    let data = {
      labels: ['Completed', 'Not Completed'],
      datasets: [{
        label: 'Number of Tasks',
        data: [{{ $completedTasksCount }}, {{ $notCompletedTasksCount }}],
        backgroundColor: [
          'rgb(54, 162, 235)', // blue
          'rgb(255, 99, 132)', // red
        ],
        borderColor: [
          'white',
          'white'
        ],
        borderWidth: 1
      }]
    };

    let config = {
      type: 'pie',
      data: data,
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: 'Task Completion Status'
          }
        }
      },
    };

    let ctx = document.getElementById('task').getContext('2d');
    new Chart(ctx, config);

// month wise chart
   labels = @json($labels);
    const dataPoints = @json($dataPoints);
    const backgroundColors = [
        'rgba(255, 99, 132, 0.5)',  // red
        'rgba(54, 162, 235, 0.5)',  // blue
        'rgba(255, 206, 86, 0.5)',  // yellow
        'rgba(75, 192, 192, 0.5)',  // green
        'rgba(153, 102, 255, 0.5)', // purple
    ];

    const chartData = {
      labels: labels,
      datasets: [{
        label: 'Number of Tasks',
        data: dataPoints,
        backgroundColor: backgroundColors,
        borderColor: backgroundColors.map(color => color.replace('0.5', '1')), // darker border
        borderWidth: 1
      }]
    };

     config = {
      type: 'bar',
      data: chartData,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

     ctx = document.getElementById('month_wise').getContext('2d');
    new Chart(ctx, config);

  });
</script>
@endsection