function setup(){
    $.getJSON('https://cat-fact.herokuapp.com/facts', handleRequest);
}

function handleRequest(data){
    min = Math.ceil(1);
    max = Math.floor(99);
    var num = Math.floor(Math.random() * (max - min + 1)) + min;
    console.log(data['all'][num]['text']);
    $("#catfact").html('');
    $("#catfact").append(data['all'][num]['text']);
}

$('#one').click(setup);