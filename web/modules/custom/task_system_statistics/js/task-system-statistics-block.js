var ctx = document.getElementById('tasks-statistics-pie').getContext('2d');

(function ($, Drupal, drupalSettings) {

  Drupal.behaviors.tasks_statistics = {
    attach: function (context, settings) {
      tasks = drupalSettings.tasks;
    }
  };

})(jQuery, Drupal, drupalSettings);

var tasksStatistics = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ['Todo', 'In progress', 'Done'],
    datasets: [{
      label: '# of tasks',
      data: [drupalSettings.tasks.todo, drupalSettings.tasks.inProgress, drupalSettings.tasks.done],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(100, 206, 86, 0.2)',
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(50, 206, 86, 1)',
      ],
      borderWidth: 1
    }]
  },
  options: {
  }
});
