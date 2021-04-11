// 全選択ボタンクリック時に全件選択する
$("#all-check").on("click", function () {
    $(".checkbox-comment-id").each(function (idx, el) {
        $(el).prop("checked", true);
    });
});
// 全解除
$("#all-uncheck").on("click", function () {
    $(".checkbox-comment-id").each(function (idx, el) {
        $(el).prop("checked", false);
    });
});
// 承認
$("#update-permission").on("click", function () {
    let commentIds = getCommentIds();
    if (commentIds.length === 0) {
        alert("選択してください。");
        return false;
    }
    $.post(
        $('input[name="update_route"]').val(),
        {
            _token: $('meta[name="csrf-token"]').attr("content"),
            commentIds: commentIds,
        },
        function (data, status) {
            if (status === "success") {
                alert(
                    data + "件の更新に成功しました。\n画面を再読み込みします。"
                );
                location.reload();
            }
        },
        "json"
    );
});
// 一括削除
$("#bulk-delete").on("click", function () {
    let commentIds = getCommentIds();
    if (commentIds.length === 0) {
        alert("選択してください。");
        return false;
    }
    $.post(
        $('input[name="delete_route"]').val(),
        {
            _token: $('meta[name="csrf-token"]').attr("content"),
            _method: "DELETE",
            commentIds: commentIds,
        },
        function (data, status) {
            if (status === "success") {
                alert(
                    data + "件の削除に成功しました。\n画面を再読み込みします。"
                );
                location.reload();
            }
        },
        "json"
    );
});

function getCommentIds() {
    return $(".checkbox-comment-id:checked")
        .map(function () {
            return $(this).val();
        })
        .get();
}
