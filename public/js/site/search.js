$(function () {

    $("input[name='location']").autocomplete({
        source: function (request, response) {
            $.ajax({
                type: 'GET',
                url: root + '/search-cities/' + request.term,
                dataType: "json",
                success: function (data) {

                    if(data.message=="found") {

                        $(".locations").html('');

                        for (var i = 0; i < data.locations.length; i++) {

                            var location = data.locations[i];

                            var place = location.city + " - " + location.state;

                            $(".locations").append("<p rel='" + location.id + "'><span class='fa fa-map-marker'></span> " + place + "</p>")
                        }
                    }
                }
            })
        },
        minLength: 2,
        delay: 100,
        select: function(event, ui){
            $("#search-city").val(ui.item.id);
        }
    });

    $("input[name='search']").autocomplete({
        appendTo: "#explore-by",
        source: function (request, response) {

            var url;
            var cityId = $("#search-city").val();

            if(cityId==undefined || cityId.length==0)
                url = root + '/search-keyword/' + request.term;
            else
                url = root + '/search-keyword/' + request.term + '/' + cityId;

            $.ajax({
                type: 'GET',
                url: url,
                dataType: "json",
                success: function (result) {

                    if(result.message=="found") {

                        $(".search_content").html('');

                        for (var i = 0; i < result.data.length; i++) {

                            var row = result.data[i];

                            $(".search_content").append("<p rel='" + row.id + "'><b>" + row.name + "</b> in " + row.group + "</p>")
                        }
                    }
                }
            })
        },
        minLength: 2,
        delay: 100,
        select: function(event, ui){
            $("#search-city").val(ui.item.id);
        }
    });
});