var ctx = document.getElementById('tasks-statistics').getContext('2d');

(function ($, Drupal, drupalSettings) {

  Drupal.behaviors.tasks_statistics = {
    attach: function (context, settings) {
      tasks = drupalSettings.tasks;
    }
  };

})(jQuery, Drupal, drupalSettings);

var tasksStatistics = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Total', 'Done', 'Todo', 'In progress'],
    datasets: [{
      label: '# of tasks',
      data: [drupalSettings.tasks.total, drupalSettings.tasks.done, drupalSettings.tasks.todo, drupalSettings.tasks.inProgress],
      backgroundColor: [
        'rgba(54, 162, 235, 0.2)',
        'rgba(100, 206, 86, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 206, 86, 0.2)',
      ],
      borderColor: [
        'rgba(54, 162, 235, 1)',
        'rgba(50, 206, 86, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(255, 206, 86, 1)',
      ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});
