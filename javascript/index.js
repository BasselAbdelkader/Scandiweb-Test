/*  when the user chooses the product type for the product they wish to add,
this function makes the corresponding field required as well as making
fields related to different product types not required
*/
$(document).ready(function () {
    $("select").change(function () {
        $("select option:selected").each(function () {
            if ($(this).attr("value") === "book") {
                $(".box").hide();
                $(".book").show();
                $("#weight").attr('required', '');
                $("#size").removeAttr("required");
                $("#height").removeAttr("required");
                $("#width").removeAttr("required");
                $("#length").removeAttr("required");


            }
            if ($(this).attr("value") === "DVD") {
                $(".box").hide()
                $(".DVD").show();
                $("#size").attr('required', '');
                $("#weight").removeAttr("required");
                $("#height").removeAttr("required");
                $("#width").removeAttr("required");
                $("#length").removeAttr("required");

            }
            if ($(this).attr("value") === "furniture") {
                $(".box").hide()
                $(".furniture").show();
                $("#height").attr('required', '');
                $("#length").attr('required', '');
                $("#width").attr('required', '');
                $("#size").removeAttr("required");
                $("#weight").removeAttr("required");

            }
            if ($(this).attr("value") === "choose") {
                $(".box").hide();
                $(".choose").show();
                $("#size").removeAttr("required");
                $("#weight").removeAttr("required");
                $("#height").removeAttr("required");
                $("#width").removeAttr("required");
                $("#length").removeAttr("required");


            }

        });
    }).change();
});


// when the Select All checkbox is checked, all individual checkboxes of products are checked subsequently
$('#checkAll').click(function () {
    $('input:checkbox').prop('checked', this.checked);
});







