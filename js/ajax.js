/<a onclick="getSummary('1')">View Text</a>
<div id="#summary">This text will be replaced when the onclick event (link is clicked) is triggered.</div>/
function getSummary(id)
{
    $.ajax({

        type: "GET",
        url: 'Your URL',
        data: "id=" + id, // appears as $_GET['id'] @ your backend side
        success: function(data) {
            // data is ur summary
            $('#summary').html(data);
        }

    });

}