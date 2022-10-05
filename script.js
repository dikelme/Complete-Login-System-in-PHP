$("#registerBtn").click(function () {
    if ($("#resetPassword").hasClass("show")) {
        $("#resetBtn").click();
    }
});

$("#resetBtn").click(function () {
    if ($("#register").hasClass("show")) {
        $("#registerBtn").click();
    }
});

// Show/Hide password
$(".show-pass").click(function () {
    var label = $(this);
    var pass_field = $(this).siblings("input");

    if ($(pass_field).attr("type") === "password") {
        $(pass_field).attr("type", "text");
        $(label).text("Esconder senha");
    } else {
        $(pass_field).attr("type", "password");
        $(label).text("Mostrar senha");
    }
});

$("#updatePhoto").change(function () {
    if ($(this).get(0).files.length > 0) {
        $("#photoUploaded").show();
    } else {
        $("#photoUploaded").hide();
    }
});

if (window.matchMedia("(max-width: 767px)").matches) {
    $(".profile-photo").click(function () {
        $(".update-photo").toggle();
    });
}

$("#deleteAccount").click(function () {
    if (!confirm("Você tem certeza que deseja excluir sua conta?")) {
        return false;
    }
});

(function () {
    "use strict";
    window.addEventListener(
        "load",
        function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName("needs-validation");
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(
                forms,
                function (form) {
                    form.addEventListener(
                        "submit",
                        function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add("was-validated");
                        },
                        false
                    );
                }
            );
        },
        false
    );
})();
