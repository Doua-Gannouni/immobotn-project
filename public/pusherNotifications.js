var notificationsWrapper = $('.dropdown-notifications');
var notificationsCountElem = notificationsWrapper.find('span[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notificationsStart = notificationsWrapper.find('li.notifications-start');

// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('new-notification');
// Bind a function to the Event (nom dans broadcastAs)
channel.bind('NewNotification', function(data) {
    // .text() pour afficher le titre comme du texte (pas du html)
    var item = $('<li class="notification-item"><i class="bi bi-exclamation-circle text-warning"></i><div><h4><a></a></h4><p></p></div></li>');
    item.find('a').attr('href', detailsBienUrl + '/' + data.bien_id).text(data.titre);
    item.find('p').text('Ajouté par ' + data.prof);
    notificationsStart.after(item);

    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
});
