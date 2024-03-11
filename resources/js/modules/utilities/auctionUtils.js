export function  check_bookmark_status(auction_bookmarks, auth_user_id) {
    var bookmarked = false;
    auction_bookmarks.forEach(function (item, index) {
        if (item.user_id === auth_user_id) bookmarked = true;
    });
    return bookmarked;
};