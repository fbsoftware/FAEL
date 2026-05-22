// =================================================================

// JavaScript code for autocomplete functionality
// This code uses jQuery to implement an autocomplete feature for an input field with the ID "cerca_anagrafico".
// When the user types in the input field, it sends a request to "autocomplete_anagrafico.php" to fetch matching results.
// When a user selects an item from the autocomplete suggestions, it retrieves the corresponding ID and fetches detailed information about that item using "get_anagrafico.php".
// Make sure to include jQuery and jQuery UI libraries in your HTML for this code to work.
//
// =====================================================================
// Note: Ensure that the server-side scripts "autocomplete_anagrafico.php" and "get_anagrafico.php" are properly implemented to handle the requests and return the expected data.
// The "autocomplete_anagrafico.php" should return a JSON array of matching items based on the user's input, while "get_anagrafico.php" should return the detailed information for the selected item.
// =================================================================
$(function () {

    $("#cerca_anagrafico").autocomplete({
        minLength: 2,
        source: "autocomplete_anagrafico.php",

        select: function (event, ui) {
            $("#anagrafico_id").val(ui.item.id);

            $.get("get_anagrafico.php", { id: ui.item.id }, function (html) {
                $("#scheda_anagrafico").html(html);
            });
        }
    });

});