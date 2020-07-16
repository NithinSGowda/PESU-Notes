$(document).ready(function() {

    function tooglethefavouritepost($postid, $state) {
        $.ajax({
            url: "/audience/helpers/favouritePostHadler.php",
            method: "POST",
            data: {
                toggleFavourite: true,
                postId: $postid,
                state: $state
            },
            dataType: "text",
            success: function(data) {
                return;
            }
        });
    }
    // ADDING TO FAVOURITES HANDLER
    $(document).on("click", "#toggle-favourite", function() {
        $btn = $(this);
        $state = $btn.data('state');
        $postid = $btn.data('postid')
        if ($state == 'non-fav') {
            tooglethefavouritepost($postid, "fav")
            $btn.html('<i class="fa fa-heart"></i>');
            $btn.data('state', 'fav');
        } else {
            tooglethefavouritepost($postid, 'non-fav')
            $btn.html('<i class="bx bx-heart"></i>');
            $btn.data('state', 'non-fav');

        }
    });
});