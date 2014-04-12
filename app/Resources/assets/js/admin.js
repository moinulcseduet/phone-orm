function setImage(img) {
    $('.phone').attr('src', '/upload/' + img);
}

function searchList(searchkey) {

    if (searchkey.length > 2) {

        $.ajax({
            url: "/phone-search",
            type: "post",
            data: {searchkey: searchkey},
            success: function(response){
                $(".span10").html(response);
            }
        });
    }
}

function sortSearch(sortkey) {

    var searchkey = $('.search').val();

    $.ajax({
        url: "/phone-sort",
        type: "post",
        data: {searchkey: searchkey, sortkey: sortkey},
        success: function(response){
            $(".span10").html(response);
        }
    });
}
