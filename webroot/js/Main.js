/**
 * localhost:8080/domain/controller/action?sample=100&test=50
 * URLパラメーターを受け取る => 使い方 getParam('sample');
 * getParam('test') = 50が受け取れる
 */
function getParam(name, url)
{
    if (!url) {
        url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) {
        return null;
    }
    if (!results[2]) {
        return '';
    }
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

$(document).ready(function () {
    /*******************************************
     * Markに対する処理
     *******************************************/
    $('#mark').on('change', function () {
        // 動作確認
        // console.log('動作確認');
        // return false;
        let markId = $(this).val(); // セレクトのvalueを受け取り

        // 動作確認
        // console.log(markId);
        // return false;
        const _csrfToken = $('input[name="_csrfToken"]').val();

        $.ajax({
            type: 'POST', // GET
            datatype: 'json',
            url: "/marks/changeMark?markid=" + markId, // URLでメソッドを呼び出す URLはドメイン移行
            data: {
                markId: markId,
                _csrfToken: _csrfToken
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader("X-CSRF-Token", _csrfToken);
            },
        })
            .done((data) => {
                let objectData = JSON.parse(data); // JSON型をObject型へ変換
                let trumpList = objectData.trumpList; // $response[]で指定した値

                // トランプのセレクト要素
                let trumpSelect = $('#trump');
                let selectOptions = '<option value="0">該当するカードがありません</option>';
                // 中身を一度全てリセット
                trumpSelect.children().remove();
                // データがあった場合
                if (data) {
                    selectOptions = '';
                    // foreach($trumpList as $key => $val) みたいな処理の実装
                    for (const key in trumpList) {
                        var val = trumpList[key];
                        selectOptions += `<option value = '${key}'> ${val} </option>`;
                    }
                }
                trumpSelect.append(selectOptions);
            })
            .fail((jqXHR, textStatus, errorThrown) => {
                // JavaScriptの例外処理
                console.log(errorThrown);
            });
        return false;
    })

    $('#trump').on('change', function () {

        let trumpId = $(this).val(); // セレクトのvalueを受け取り
        const _csrfToken = $('input[name="_csrfToken"]').val();
        $.ajax({
            type: 'POST',
            datatype: 'json',
            url: "/marks/changeTrump",
            data: {
                trumpId: trumpId,
                _csrfToken: _csrfToken
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader("X-CSRF-Token", _csrfToken);
            },
        })
            .done((data) => {
                let objectData = JSON.parse(data); // JSON型をObject型へ変換
                let markList = objectData.markList; // $response[]で指定した値
                let selectMarkId = Number(objectData.selectMarkId); // $response
                console.log(selectMarkId);

                // マークのセレクト要素
                let markSelect = $('#mark');
                let selectOptions = '<option value="0">該当するマークがありません</option>';
                markSelect.children().remove();
                if (data) {
                    selectOptions = '';
                    // foreach($trumpList as $key => $val) みたいな処理の実装
                    for (const key in markList) {
                        var val = markList[key];
                        if(selectMarkId === Number(key)){
                            selectOptions += `<option value = '${key}' selected> ${val} </option>`;
                        }else{
                            selectOptions += `<option value = '${key}'> ${val} </option>`;
                        }
                    }
                }
                markSelect.append(selectOptions);
            })
            .fail((jqXHR, textStatus, errorThrown) => {
                // JavaScriptの例外処理
                console.log(errorThrown);
            });
        return false;
    })

    /*******************************************
     * Itemsに対する処理
     *******************************************/
});


$('#trump').on('change', function () {
    let trumpId = $(this).val(); // セレクトのvalueを受け取り
    const _csrfToken = $('input[name="_csrfToken"]').val();
    $.ajax({
        type: 'POST',
        datatype: 'json',
        url: "/marks/changeTrump",
        data: {
            trumpId: trumpId,
            _csrfToken: _csrfToken
        },
        beforeSend: function (xhr) {
            xhr.setRequestHeader("X-CSRF-Token", _csrfToken);
        },
    })
        .done((data) => {
            let check = confirm('データがありました。一括更新していいですか？')
            if(check === true){
                $.ajax({
                    type: 'POST',
                    datatype: 'json',
                    url: "/marks/changeTrump2",
                    data: {
                        _csrfToken: _csrfToken
                    },
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader("X-CSRF-Token", _csrfToken);
                    },
                })
                    .done(() => {
                        alert('完了しました');
                    })
                return false;
            }
        })
    return false;
})

