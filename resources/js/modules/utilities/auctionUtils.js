export function  check_bookmark_status(auction_bookmarks, user=null) {
    var bookmarked = false;

    if(!user) return false;
    var auth_user_id = user.id;
    auction_bookmarks.forEach(function (item, index) {
        if (item.user_id === auth_user_id) bookmarked = true;
    });
    return bookmarked;
};