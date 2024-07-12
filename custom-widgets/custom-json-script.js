// jQuery(document).ready(function($) {
//     $('.json-data').each(function() {
//         var jsonUrl = $(this).data('json-url');
//         console.log('Fetching data from:', jsonUrl);

//         $.getJSON(jsonUrl, function(data) {
//             console.log('Data received:', data);
//             var html = '';

           
//             $.each(data, function(index, profile) {
//                 html += '<div class="profile">';
//                 html += '<h3>' + profile.job + '</h3>';
//                 html += '<p><strong>Data:</strong> ' + profile.data + '</p>';
//                 html += '<div><strong>Content:</strong> ' + profile.contenuto + '</div>';
//                 html += '</div><hr>';
//             });

//             $(this).html(html);
//         }.bind(this))
//         .fail(function(jqxhr, textStatus, error) {
//             console.log('Request Failed: ' + textStatus + ', ' + error);
//         });
//     });
// });
