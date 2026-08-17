function shuffle(array) {
    var currentIndex = array.length,
        temporaryValue, randomIndex;

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {

        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
}

var SCALING_MODE_NONE = 0;
//Uses the original image size 2
var SCALING_MODE_STRETCH = 1;
//Sets 'background-size' to '100% 100%'. 
//This stretches the background image to fill the container, discarding the images aspect ratio.3
var SCALING_MODE_COVER = 2;
//Sets 'background: cover'. 
//This makes the background images fill the entire container while retaining its aspect ratio.
var SCALING_MODE_CONTAIN = 3;
//Sets 'background-size' to 'contain'. This scales the bakcground image to the largest size such 
//that both its width and its height can fit inside the content area
//Create global array for genre tagging
$genreList = [];
$searchEnabled = 0;

$(document).ready(function () {
    $imgFiles = [];
    //$genreList = $.getJSON('/json/genre.json', function (data) { });
    $("#test").html("JQuery loaded");
    // get last trax
    //LoadDb();
    // Background slideshow
    $.get('/img/bkg/', function (data) {
        //data.reverse();
        $.each(data, function (i, item) {
            // need to add the path location
            $imgFiles.push('https://psylo.ddns.net/img/bkg/' + item.name);
        })
        shuffle($imgFiles);
        $("body").backgroundCycle({
            imageUrls: $imgFiles,
            fadeSpeed: 5000,
            duration: 15000,
            backgroundSize: SCALING_MODE_CONTAIN
        });
    });
    // if (!$searchEnabled) {
    //     var myvar = setInterval(function () {
    //         LoadDb();
    //         $time = new Date();
    //         $("#timeSpan").html($time.toTimeString().substr(0, 8));
    //     }, 10000);
    // }
});

function resetTable() {
    $('#lastTrax2').html('<th class="nowrap">time</th><th>genre</th><th>artist</th><th>title</th><th>label</th>');
}

function appendTrackRow(item) {
    if (item.artist !== "PBB") {
        var $row = $('<tr');
        $row.append($('<td>', { text: item.time.replace("T", " "), class: 'nowrap' }));
        $row.append($('<td>', { text: getGenre(item.genre) }));
        $row.append($('<td>', { text: item.artist }));
        $row.append($('<td>', { text: item.title }));
        $row.append($('<td>', { text: item.label }));
        $row.append('</tr>');
        $('#lastTrax2').append($row);
    }
}

function LoadDb() {
    $.getJSON("mongo.php")
        .done(function (result) {
            resetTable();
            $.each(result, function (i, item) {
                appendTrackRow(item);
            });
        });
}

function SearchDb() {
    $searchEnabled = 1;
    $.getJSON("mgsrch.php?srch=" + encodeURIComponent($("#strSrch").val()))
        .done(function (result) {
            resetTable();
            $.each(result, function (i, item) {
                appendTrackRow(item);
            });
        });
}

// function to map the tags to the genre
function getGenre(ab) {
    console.log('genre AB: ' + ab);
    var ret = ab;
    if ($genreList && $genreList.responseJSON) {
        $.each($genreList.responseJSON, function (i, res) {
            if (res.genre == ab) {
                console.log('Selected: ' + res.genre + ': ' + res.main);
                ret = res.main;
            }
        });
    }
    return ret;
}