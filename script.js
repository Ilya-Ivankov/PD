function reg() {
    $("#log").css({'z-index' : -1});
    $("#reg").css({'z-index' : 3, 'border' : '2px solid #524f4e'});
}

function log() {
    $("#log").css({'z-index' : 3});
    $("#reg").css({'z-index' : -1, 'border' : '2px solid white'});
}

function registration() {
    if ($("#name").val() == "" | $("#surname").val() == "" | $("#patronymic").val() == "" | $("#address").val() == "" | $("#tel").val() == "" | $("#email").val() == "") {
        alert("Заполните все поля!")
    } else if ($("#pass1").val() == $("#pass2").val()) {
        var text = $("#surname").val();
        $(".list").children("dd").eq(0).text(text);
        var text = $("#name").val();
        $(".list").children("dd").eq(1).text(text);
        var text = $("#patronymic").val();
        $(".list").children("dd").eq(2).text(text);
        var text = $("#address").val();
        $(".list").children("dd").eq(3).text(text);
        var text = $("#tel").val();
        $(".list").children("dd").eq(4).text(text);
        var text = $("#email").val();
        $(".list").children("dd").eq(5).text(text);
        $(".blur").remove();
        $("#reg").remove();
        $("#log").remove();
        $(".blur img").remove();
    } else {
        alert("Пароли не совпадают!")
    }
}
