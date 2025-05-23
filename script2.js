document.addEventListener('DOMContentLoaded', function () {
  const bellIcon = document.getElementById('bell-icon');
  const notificationContainer = document.getElementById('notification-container');
  const messageIcon = document.getElementById('message-icon');
  const messageContainer = document.getElementById('message-container');

  bellIcon.addEventListener('click', function() {
    notificationContainer.classList.toggle('active');
    messageContainer.classList.remove('active');
  });

  
  messageIcon.addEventListener('click', function() {
    messageContainer.classList.toggle('active');
    notificationContainer.classList.remove('active');
  });
});