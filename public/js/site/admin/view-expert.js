var expertId;

$(function(){

    expertId = $('#expert_id').attr('rel');

    $("input[name='btn-update']").click(updateExpert);

    $("input[name='btn-create-membership']").click(createMembership);
    $("input[name='btn-create-service']").click(createService);
    $("input[name='btn-create-achievement']").click(createAchievement);
    $("input[name='btn-create-social']").click(createSocial);

    listMemberships(1);

    listServices(1);

    listAchievements(1);

    listSocialProfiles(1);
});

function listMemberships(page){

    $.getJSON(
        root + '/data-expert-list-memberships/' + expertId + '/' + page,
        function(result){

            if(result.message.indexOf('not logged')>-1)
                window.location.replace(root);
            else{
                showMemberships(result);
            }
        }
    );
}
function showMemberships(data){

    if(data!=undefined && data.memberships!=undefined && data.memberships.length>0){

        var str = '';

        str = str + '<table id="grid-memberships" class="table table-condensed table-hover table-striped"> \
            <thead> \
                <tr> \
                    <th data-column-id="id" data-type="numeric">ID</th> \
                    <th data-column-id="name">Name</th> \
                    <th data-formatter="link">Action</th> \
                </tr> \
            </thead> \
            <tbody>';

        for(var i =0;i<data.memberships.length;i++){

            var membership = data.memberships[i];

            str = str + '<tr> \
                    <td>' + membership.id + '</td> \
                    <td>' + membership.name + '</td> \
                    <td></td> \
                </tr>';
        }

        str = str + '</tbody> \
        </table>';

        $('#membership-list').html(str);

        $("#grid-memberships").bootgrid({
            formatters: {
                'link': function(column, row)
                {
                    str = str + '&nbsp;&nbsp; <a class="remove" href="#" rel="' + row.id + '">Remove</a>';

                    return str;
                }
            }
        }).on("loaded.rs.jquery.bootgrid", function()
            {
                $(".remove").click(function(){
                    var id = $(this).attr("rel");

                    if(!confirm("Are you sure to remove this membership?"))
                        return;

                    $.getJSON(root + '/remove-expert-membership-admin/' + id,
                        function(result){
                            if(result.message.indexOf('done')>-1)
                                listMemberships(1);
                            else if(result.message.indexOf('not logged')>-1)
                                window.location.replace(root);
                            else
                                alert("Server returned error : " + result);
                        }
                    );
                });
            });
    }
    else
        $('#membership-list').html('No memberships found');

}

function listServices(page){

    $.getJSON(
        root + '/data-expert-list-services/' + expertId + '/' + page,
        function(result){

            if(result.message.indexOf('not logged')>-1)
                window.location.replace(root);
            else{
                showServices(result);
            }
        }
    );
}
function showServices(data){

    if(data!=undefined && data.services!=undefined && data.services.length>0){

        var str = '';

        str = str + '<table id="grid-services" class="table table-condensed table-hover table-striped"> \
            <thead> \
                <tr> \
                    <th data-column-id="id" data-type="numeric">ID</th> \
                    <th data-column-id="name">Name</th> \
                    <th data-formatter="link">Action</th> \
                </tr> \
            </thead> \
            <tbody>';

        for(var i =0;i<data.services.length;i++){

            var service = data.services[i];

            str = str + '<tr> \
                    <td>' + service.id + '</td> \
                    <td>' + service.name + '</td> \
                    <td></td> \
                </tr>';
        }

        str = str + '</tbody> \
        </table>';

        $('#service-list').html(str);

        $("#grid-services").bootgrid({
            formatters: {
                'link': function(column, row)
                {
                    str = str + '&nbsp;&nbsp; <a class="remove" href="#" rel="' + row.id + '">Remove</a>';

                    return str;
                }
            }
        }).on("loaded.rs.jquery.bootgrid", function()
            {
                $(".remove").click(function(){
                    var id = $(this).attr("rel");

                    if(!confirm("Are you sure to remove this service?"))
                        return;

                    $.getJSON(root + '/remove-expert-service-admin/' + id,
                        function(result){
                            if(result.message.indexOf('done')>-1)
                                listMemberships(1);
                            else if(result.message.indexOf('not logged')>-1)
                                window.location.replace(root);
                            else
                                alert("Server returned error : " + result);
                        }
                    );
                });
            });
    }
    else
        $('#service-list').html('No services found');

}

function listAchievements(page){

    $.getJSON(
        root + '/data-expert-list-achievements/' + expertId + '/' + page,
        function(result){

            if(result.message.indexOf('not logged')>-1)
                window.location.replace(root);
            else{
                showAchievements(result);
            }
        }
    );
}
function showAchievements(data){

    if(data!=undefined && data.achievements!=undefined && data.achievements.length>0){

        var str = '';

        str = str + '<table id="grid-services" class="table table-condensed table-hover table-striped"> \
            <thead> \
                <tr> \
                    <th data-column-id="id" data-type="numeric">ID</th> \
                    <th data-column-id="name">Name</th> \
                    <th data-formatter="link">Action</th> \
                </tr> \
            </thead> \
            <tbody>';

        for(var i =0;i<data.achievements.length;i++){

            var achievement = data.achievements[i];

            str = str + '<tr> \
                    <td>' + achievement.id + '</td> \
                    <td>' + achievement.name + '</td> \
                    <td></td> \
                </tr>';
        }

        str = str + '</tbody> \
        </table>';

        $('#achievement-list').html(str);

        $("#grid-achievements").bootgrid({
            formatters: {
                'link': function(column, row)
                {
                    str = str + '&nbsp;&nbsp; <a class="remove" href="#" rel="' + row.id + '">Remove</a>';

                    return str;
                }
            }
        }).on("loaded.rs.jquery.bootgrid", function()
            {
                $(".remove").click(function(){
                    var id = $(this).attr("rel");

                    if(!confirm("Are you sure to remove this achievement?"))
                        return;

                    $.getJSON(root + '/remove-expert-achievement-admin/' + id,
                        function(result){
                            if(result.message.indexOf('done')>-1)
                                listMemberships(1);
                            else if(result.message.indexOf('not logged')>-1)
                                window.location.replace(root);
                            else
                                alert("Server returned error : " + result);
                        }
                    );
                });
            });
    }
    else
        $('#achievement-list').html('No achievements found');

}

function listSocialProfiles(page){

    $.getJSON(
        root + '/data-expert-list-social/' + expertId + '/' + page,
        function(result){

            if(result.message.indexOf('not logged')>-1)
                window.location.replace(root);
            else{
                showSocials(result);
            }
        }
    );
}
function showSocials(data){

    if(data!=undefined && data.socials!=undefined && data.socials.length>0){

        var str = '';

        str = str + '<table id="grid-socials" class="table table-condensed table-hover table-striped"> \
            <thead> \
                <tr> \
                    <th data-column-id="id" data-type="numeric">ID</th> \
                    <th data-column-id="name">Name</th> \
                    <th data-column-id="name">URL</th> \
                    <th data-formatter="link">Action</th> \
                </tr> \
            </thead> \
            <tbody>';

        for(var i =0;i<data.socials.length;i++){

            var social = data.socials[i];

            str = str + '<tr> \
                    <td>' + social.id + '</td> \
                    <td>' + social.name + '</td> \
                    <td>' + social.url + '</td> \
                    <td></td> \
                </tr>';
        }

        str = str + '</tbody> \
        </table>';

        $('#social-list').html(str);

        $("#grid-socials").bootgrid({
            formatters: {
                'link': function(column, row)
                {
                    str = str + '&nbsp;&nbsp; <a class="remove" href="#" rel="' + row.id + '">Remove</a>';

                    return str;
                }
            }
        }).on("loaded.rs.jquery.bootgrid", function()
            {
                $(".remove").click(function(){
                    var id = $(this).attr("rel");

                    if(!confirm("Are you sure to remove this social record?"))
                        return;

                    $.getJSON(root + '/remove-expert-social-admin/' + id,
                        function(result){
                            if(result.message.indexOf('done')>-1)
                                listSocials(1);
                            else if(result.message.indexOf('not logged')>-1)
                                window.location.replace(root);
                            else
                                alert("Server returned error : " + result);
                        }
                    );
                });
            });
    }
    else
        $('#social-list').html('No social records found');

}

function updateExpert(){

    if(isExpertFormValid()){

        var data = $("#form-update-expert").serialize();

        $.ajax({
            url: root + '/update-expert',
            type: 'post',
            data: data,
            dataType: 'json',
            success: function(result){

                if(result.message.indexOf('not logged')>-1)
                    window.location.replace(root);
                else if(result.message.indexOf('duplicate')>-1){
                    $('.message').html('Duplicate name for expert');
                }
                else if(result.message.indexOf('done')>-1){
                    $('.message').html('Expert updated successfully');
                }
            }
        });
    }
}
function isExpertFormValid(){
    return true;
}

function createMembership(){

    if(isMembershipFormValid()){

        var data = $("#form-create-membership").serialize();

        $.ajax({
            url: root + '/create-expert-membership-admin',
            type: 'post',
            data: data,
            dataType: 'json',
            success: function(result){

                if(result.message.indexOf('not logged')>-1)
                    window.location.replace(root);
                else if(result.message.indexOf('duplicate')>-1){
                    $('.message').html('Duplicate name for expert');
                }
                else if(result.message.indexOf('done')>-1){
                    $('.message').html('Membership added successfully');

                    listMemberships(1);
                }
            }
        });
    }
}
function isMembershipFormValid(){
    return true;
}


function createAchievement(){

    if(isAchievementFormValid()){

        var data = $("#form-create-achievement").serialize();

        $.ajax({
            url: root + '/create-expert-achievement-admin',
            type: 'post',
            data: data,
            dataType: 'json',
            success: function(result){

                if(result.message.indexOf('not logged')>-1)
                    window.location.replace(root);
                else if(result.message.indexOf('duplicate')>-1){
                    $('.message').html('Duplicate name for expert');
                }
                else if(result.message.indexOf('done')>-1){
                    $('.message').html('Achievement added successfully');

                    listAchievements(1);
                }
            }
        });
    }
}
function isAchievementFormValid(){
    return true;
}


function createService(){

    if(isServiceFormValid()){

        var data = $("#form-create-service").serialize();

        $.ajax({
            url: root + '/create-expert-service-admin',
            type: 'post',
            data: data,
            dataType: 'json',
            success: function(result){

                if(result.message.indexOf('not logged')>-1)
                    window.location.replace(root);
                else if(result.message.indexOf('duplicate')>-1){
                    $('.message').html('Duplicate name for expert');
                }
                else if(result.message.indexOf('done')>-1){
                    $('.message').html('Service added successfully');

                    listServices(1);
                }
            }
        });
    }
}
function isServiceFormValid(){
    return true;
}


function createSocial(){

    if(isSocialFormValid()){

        var data = $("#form-create-social").serialize();

        $.ajax({
            url: root + '/create-expert-social-admin',
            type: 'post',
            data: data,
            dataType: 'json',
            success: function(result){

                if(result.message.indexOf('not logged')>-1)
                    window.location.replace(root);
                else if(result.message.indexOf('duplicate')>-1){
                    $('.message').html('Duplicate name for expert');
                }
                else if(result.message.indexOf('done')>-1){
                    $('.message').html('Social information added successfully');

                    listSocialProfiles(1);
                }
            }
        });
    }
}
function isSocialFormValid(){
    return true;
}