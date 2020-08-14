async function getData() {
    console.log('Get data started...');
    const api_url = 'http://api.open-notify.org/iss-now.json';

    $data = await fetch(api_url);
    $jsondata = await $data.json();
    return $jsondata;
}

async function postData() {
    data = await getData();
    console.log('Posting data...');
    console.log('Post data:', data['iss_position']);

    $.ajax({
        url: 'api_call_handler.php',
        method: "POST",
        data: { iss: data['iss_position'] },
        dataType: 'json',
        success: function(response) {
            console.log('Success response:', response);
        },
        error: e => console.log('Error response', e)
    })
}