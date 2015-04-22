function loadRows()
{
    var container = $('#investment_ajax_table_rows');
    var url = container.attr("ajaxUrl");
    
    container.load(url);    
    setTimeout(loadRows, 5000);
}

var timer = setTimeout(loadRows, 5000);

