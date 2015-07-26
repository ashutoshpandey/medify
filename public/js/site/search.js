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

            if(cityId.length==0)
                url = root + '/search-keyword/' + request.term;
            else
                url = root + '/search-keyword/' + request.term + '/' + cityId;

            $.ajax({
                type: 'GET',
                url: root,
                dataType: "json",
                success: function (result) {

                    if(result.message=="found") {

                        $(".search_content").html('');

                        for (var i = 0; i < result.data.length; i++) {

                            var row = data.results[i];

                            $(".search_content").append("<p rel='" + result.id + "'><b>" + row.name + "</b> " + row.group + "</p>")
                        }
                    }
                }
            })
        },
        minLength: 1,
        delay: 100,
        select: function(event, ui){
            $("#search-city").val(ui.item.id);
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        return $("<li>")
            .data("item.autocomplete", item)
            .append("<a class='search-city' href='javascript:void(0)' rel='" + item.id + "'>" + item.label + "</a>")
            .appendTo(ul);
    };
});