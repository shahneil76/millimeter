$(document).on("click", ".modal-link", function (e) {
    e.preventDefault();
    var URL = $(this).attr("href");
    var title = $(this).data("title");
    $("#common-modal .modal-title").text(title);
    $.ajax({
        url: URL,
        cache: false,
        beforeSend: function () {
            $("#lds-roller").show();
        },
        success: function (res) {
            $("#common-modal").modal("show");
            $(".modal-body").html(res);
            $("#lds-roller").hide();
        },
        error: function (request, status, error) {
            if (request.status == "500") {
                toastrerror(error);
                $("#lds-roller").hide();
            }
        },
    });
});

function ucwords(str) {
    // Split the string into words based on spaces
    var words = str.split(" ");

    // Capitalize the first letter of each word and join them back together
    for (var i = 0; i < words.length; i++) {
        words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
    }

    // Join the words back into a single string
    return words.join(" ");
}

async function ajaxDynamicMethod(url, method, formData = "") {
    $("#lds-roller").show();
    const response = await $.ajax({
        type: method,
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            $(".errors").text("");
            if (data.error) {
                if (data.errors.length == "0" && data.msg) {
                    toastrerror(data.msg);
                } else {
                    for (const [key, value] of Object.entries(data.errors)) {
                        console.log("#" + key + "error");
                        $("#" + key + "error").text(value);
                    }

                    if (data.sweeterror) {
                        var errorHTML = "<ul>";
                        for (const [key, value] of Object.entries(
                            data.errors
                        )) {
                            errorHTML += `<li><b>${ucwords(
                                key.replace("_", " ")
                            )} : </b>${value}</li>`;
                        }
                        errorHTML += "</ul>";

                        Swal.fire({
                            title: "Error",
                            html: errorHTML,
                            icon: "error",
                        });
                    }
                }
            } else if (data.success && data.route) {
                window.location.href = data.route;
            }
        },
        error: function (request, status, error) {
            if (request.status == "500" || request.status == "405") {
                toastrerror(error);
            }
            $("#lds-roller").hide();
        },
    });
    $("#lds-roller").hide();
    return response;
}

$(document).on("change", ".custom-file-input", function (e) {
    if ($(this).val() == null || $(this).val() == "") 
    {
        $(this).val("");
        $(this).parent().find(".custom-file-label").text("Choose Image");
        $(this).parent().parent().find(".prview-section").remove();
    }
    else
    {
        $(this).parent().find(".custom-file-label").text($(this).val());
        var thisRef = this;
        if ($(this).hasClass("preview-required")) {
            $(thisRef).parent().parent().find(".prview-section").remove();
            var file = e.target.files[0];
            var reader = new FileReader();
            reader.onload = function (e) {
                $(thisRef)
                    .parent()
                    .parent()
                    .append(
                        '<div class="mt-3 prview-section"><img class="w-100" src="' +
                            e.target.result +
                            '"></div>'
                    );
            };
            reader.readAsDataURL(file);
        }
    }
});

function checkMultipleDetails(form) {
    var frequencyMap = {};
    $.each(form, function (index, item) {
        var name = item.name;
        frequencyMap[name] = (frequencyMap[name] || 0) + 1;
    });

    // Extract names with frequency greater than 1
    var repeatedNames = [];
    for (var name in frequencyMap) {
        if (frequencyMap.hasOwnProperty(name) && frequencyMap[name] > 1) {
            repeatedNames.push(name);
        }
    }

    return repeatedNames;
}

function generateFormData(param) {
    var dataArr = $(param).serializeArray();
    var mutipleValue = checkMultipleDetails(dataArr);
    var formData = new FormData();
    $.each(dataArr, function (i, field) {
        if ($.inArray(field.name, mutipleValue) !== -1) {
        } else {
            formData.append(field.name, field.value);
        }
    });
    $.each(mutipleValue, function (index, value) {
        $.each(dataArr, function (i, field) {
            if (field.name == value) {
                formData.append(
                    field.name.replace("[]", "") + "[]",
                    field.value
                );
            }
        });
    });
    $.each(
        $(param).find('input[type="file"]:not([multiple])'),
        function (i, field) {
            formData.append(
                field.name,
                $(field)[0].files[0] != undefined ? $(field)[0].files[0] : ""
            );
        }
    );
    $.each($(param).find('input[type="file"][multiple]'), function (i, field) {
        var fileInput = $(field)[0];
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {
            formData.append(field.name.replace("[]", "") + "[]", files[i]);
        }
        // formData.append(field.name + "[]", (($(field)[0].files[0]) != undefined) ? $(field)[0].files[0] : "");
    });

    return formData;
}

$(document).on("click", ".sidebar-link", async function () {
    var url = $(this).data("url");
    if ($("#kt_side_panel").hasClass("offcanvas-on")) {
        closeSettingSidebar();
    } else {
        var response = await ajaxDynamicMethod(url, "GET");
        $("#kt_side_panel .tab-content").html(response.data.html);
        $("#kt_side_panel").addClass("offcanvas-on");
    }
});

function closeSettingSidebar(alert = true) {
    if (alert) {
        Swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover this action!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, proceed!",
        }).then((result) => {
            if (result.isConfirmed) {
                $("#kt_side_panel").removeClass("offcanvas-on");
            }
        });
    } else {
        $("#kt_side_panel").removeClass("offcanvas-on");
    }
}

$(document).on("click", "#kt_side_panel_close", function (e) {
    e.preventDefault();
    closeSettingSidebar();
});

window.onpageshow = function (event) {
    if (event.persisted) {
        location.reload();
    }
};

$(document).on('keypress','.numericonly',function(e){
    e = (e) ? e : window.event;
    var charCode = (e.which) ? e.which : e.keyCode;
    if ((charCode > 31 && (charCode < 48 || charCode > 57))) {
        e.preventDefault();
    }
    else
    {
        return true;
    }
});

$(document).on('keypress','.numeric-dot-only',function(e){
    e = (e) ? e : window.event;
    var charCode = (e.which) ? e.which : e.keyCode;
    if (charCode == 46)
    {
    	return true;
    }
    else if ((charCode > 31 && (charCode < 48 || charCode > 57))) {
        e.preventDefault();
    }
    else
    {
        return true;
    }
});

$(document).on("click",".hide-fixed-form",function(e){
    $(".fixed-form").removeClass("active");
});

$(document).on("click","#demo-btn",function(e){
    e.preventDefault();
    $(".fixed-form").addClass("active");
});