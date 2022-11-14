import './bootstrap';

 const settings = {
    "async": true,
     "crossDomain": true,
    "url": "https://free-nba.p.rapidapi.com/teams?page=1&per_page=50",
     "method": "GET",
   "headers": {
        "X-RapidAPI-Key": "e3672a083fmsh1908b4576f4b805p148d0ejsn7af31cdbdcfe",
        "X-RapidAPI-Host": "free-nba.p.rapidapi.com"
     }
 };

 $.ajax(settings).done(function (response) {

   console.log(response);


        $.each(response.data, function (key, value) {
             if(value.abbreviation === "GSW") {
                $("#city").append(value.full_name + '<br>');
             }
             if(value.abbreviation === "GSW") {
                 $("#teamname").append(value.abbreviation + '<br>');
            }
     });
 });

 const settingsai = {
     "async": true,
     "crossDomain": true,
     "url": "https://free-nba.p.rapidapi.com/players?page=1&per_page=100",
     "method": "GET",
     "headers": {
         "X-RapidAPI-Key": "e3672a083fmsh1908b4576f4b805p148d0ejsn7af31cdbdcfe",
         "X-RapidAPI-Host": "free-nba.p.rapidapi.com"
     }
 };

 $.ajax(settingsai).done(function (response1) {

 $.each(response1.data, function (key, value) {

     if(value.team.abbreviation === "GSW") {
        $("#players1").append(value.first_name + ' ' + value.last_name + '<br>');
   }

});
 });

const settingsai1 = {
    "async": true,
    "crossDomain": true,
    "url": "https://free-nba.p.rapidapi.com/players?page=2&per_page=100",
    "method": "GET",
    "headers": {
        "X-RapidAPI-Key": "e3672a083fmsh1908b4576f4b805p148d0ejsn7af31cdbdcfe",
        "X-RapidAPI-Host": "free-nba.p.rapidapi.com"
    }
};

$.ajax(settingsai1).done(function (response2) {

    $.each(response2.data, function (key, value) {

        if(value.team.abbreviation === "GSW") {
            $("#players2").append(value.first_name + ' ' + value.last_name + '<br>');
        }

    });
});

const settingsai2 = {
    "async": true,
    "crossDomain": true,
    "url": "https://free-nba.p.rapidapi.com/players?page=3&per_page=100",
    "method": "GET",
    "headers": {
        "X-RapidAPI-Key": "e3672a083fmsh1908b4576f4b805p148d0ejsn7af31cdbdcfe",
        "X-RapidAPI-Host": "free-nba.p.rapidapi.com"
    }
};

$.ajax(settingsai2).done(function (response2) {

    $.each(response2.data, function (key, value) {

        if(value.team.abbreviation === "GSW") {
            $("#players3").append(value.first_name + ' ' + value.last_name + '<br>');
        }

    });
});

const settingsai3 = {
    "async": true,
    "crossDomain": true,
    "url": "https://free-nba.p.rapidapi.com/players?page=4&per_page=100",
    "method": "GET",
    "headers": {
        "X-RapidAPI-Key": "e3672a083fmsh1908b4576f4b805p148d0ejsn7af31cdbdcfe",
        "X-RapidAPI-Host": "free-nba.p.rapidapi.com"
    }
};

$.ajax(settingsai3).done(function (response2) {

    $.each(response2.data, function (key, value) {

        if(value.team.abbreviation === "GSW") {
            $("#players4").append(value.first_name + ' ' + value.last_name + '<br>');
        }

    });
});

const settingsai5 = {
    "async": true,
    "crossDomain": true,
    "url": "https://free-nba.p.rapidapi.com/players?page=5&per_page=100",
    "method": "GET",
    "headers": {
        "X-RapidAPI-Key": "e3672a083fmsh1908b4576f4b805p148d0ejsn7af31cdbdcfe",
        "X-RapidAPI-Host": "free-nba.p.rapidapi.com"
    }
};

$.ajax(settingsai5).done(function (response2) {

    $.each(response2.data, function (key, value) {

        if(value.team.abbreviation === "GSW") {
            $("#players5").append(value.first_name + ' ' + value.last_name + '<br>');
        }

    });
});

const settingsai6 = {
    "async": true,
    "crossDomain": true,
    "url": "https://free-nba.p.rapidapi.com/players?page=6&per_page=100",
    "method": "GET",
    "headers": {
        "X-RapidAPI-Key": "e3672a083fmsh1908b4576f4b805p148d0ejsn7af31cdbdcfe",
        "X-RapidAPI-Host": "free-nba.p.rapidapi.com"
    }
};

$.ajax(settingsai6).done(function (response2) {

    $.each(response2.data, function (key, value) {

        if(value.team.abbreviation === "GSW") {

            $("#players6").append(value.first_name + ' ' + value.last_name + '<br>');
        }

    });
});

const settingsai7= {
    "async": true,
    "crossDomain": true,
    "url": "https://free-nba.p.rapidapi.com/players?page=7&per_page=100",
    "method": "GET",
    "headers": {
        "X-RapidAPI-Key": "e3672a083fmsh1908b4576f4b805p148d0ejsn7af31cdbdcfe",
        "X-RapidAPI-Host": "free-nba.p.rapidapi.com"
    }
};

$.ajax(settingsai7).done(function (response2) {
    console.log(response2);
    $.each(response2.data, function (key, value) {

        if(value.team.abbreviation === "GSW") {

            $("#players7").append(value.first_name + ' ' + value.last_name + '<br>');
        }

    });
});

const settingsai8= {
    "async": true,
    "crossDomain": true,
    "url": "https://free-nba.p.rapidapi.com/players?page=8&per_page=1000",
    "method": "GET",
    "headers": {
        "X-RapidAPI-Key": "e3672a083fmsh1908b4576f4b805p148d0ejsn7af31cdbdcfe",
        "X-RapidAPI-Host": "free-nba.p.rapidapi.com"
    }
};

$.ajax(settingsai8).done(function (response2) {
    console.log(response2);
    $.each(response2.data, function (key, value) {

        if(value.team.abbreviation === "GSW") {

            $("#players8").append(value.first_name + ' ' + value.last_name + '<br>');
        }

    });
});

const settingsai9= {
    "async": true,
    "crossDomain": true,
    "url": "https://free-nba.p.rapidapi.com/players?page=9&per_page=2100",
    "method": "GET",
    "headers": {
        "X-RapidAPI-Key": "e3672a083fmsh1908b4576f4b805p148d0ejsn7af31cdbdcfe",
        "X-RapidAPI-Host": "free-nba.p.rapidapi.com"
    }
};

$.ajax(settingsai9).done(function (response2) {
    console.log(response2);
    $.each(response2.data, function (key, value) {

        if(value.team.abbreviation === "GSW") {

            $("#players9").append(value.first_name + ' ' + value.last_name + '<br>');
        }

    });
});

const settingsai10= {
    "async": true,
    "crossDomain": true,
    "url": "https://free-nba.p.rapidapi.com/players?page=10&per_page=100",
    "method": "GET",
    "headers": {
        "X-RapidAPI-Key": "e3672a083fmsh1908b4576f4b805p148d0ejsn7af31cdbdcfe",
        "X-RapidAPI-Host": "free-nba.p.rapidapi.com"
    }
};

$.ajax(settingsai10).done(function (response2) {
    console.log(response2);
    $.each(response2.data, function (key, value) {

        if(value.team.abbreviation === "GSW") {

            $("#players10").append(value.first_name + ' ' + value.last_name + '<br>');
        }

    });
});
