
async function generateCsrf() {
    $.ajax({
        url: "http://localhost:8080/csrf",
        type: "GET",
        dataType: "json",
        success: function(hasil) {
            $('#csrf_field').val(hasil);
        }
    });
}

function getCsrf() {
    generateCsrf()
    console.log('csrf')
    return $('#csrf_field').val();
}

function clearForm(items) {
    for (let i = 0; i < items.length; i++) {
     const element = items[i];
     $(element).val('');
    }
 }