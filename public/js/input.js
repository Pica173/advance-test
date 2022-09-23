$(function () {
    $("#postcode")
        .change(function () {
            var str = $(this).val();
            str = str
                .replace(
                    /[Ａ-Ｚａ-ｚ０-９－！”＃＄％＆’（）＝＜＞，．？＿［］｛｝＠＾～￥]/g,
                    function (s) {
                        return String.fromCharCode(s.charCodeAt(0) - 65248);
                    }
                )
                .replace(/[ー]/g, "−")
                .replace(/[-]/g, "−");
            let element = document.getElementById("postcode");
            if (!str == "") {
                console.log(str.length);
                console.log(str.search("−"));
                if (str.length != 8 || str.search("−") == -1) {
                    let postcodevali = document.getElementById("postcodevali");
                    if (postcodevali !== null) {
                        postcodevali.remove();
                    }
                    element.insertAdjacentHTML(
                        "afterend",
                        '<p class="vali-msg" id="postcodevali">ハイフンあり・半角8文字で入力してください</p>'
                    );
                } else {
                    let element = document.getElementById("postcodevali");
                    if (element !== null) {
                        element.remove();
                    }
                }
            }
            $(this).val(str);
        })
        .change();
});

function changeemail() {
    let element = document.getElementById("email");
    if (!element.value.match(/.+@.+/)) {
        let emailvali = document.getElementById("emailvali");
        if (emailvali !== null) {
            emailvali.remove();
        }
        element.insertAdjacentHTML(
            "afterend",
            '<p class="vali-msg" id="emailvali">メールアドレスの形式で入力してください</p>'
        );
    } else {
        let element = document.getElementById("emailvali");
        element.remove();
    }
}
