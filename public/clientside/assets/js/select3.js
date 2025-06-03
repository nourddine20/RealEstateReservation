$(function(e) {
    "use strict";

    // Select2
    $('.select3').select3({
        minimumResultsForSearch: Infinity,
        width: '100%'
    });
    
    // Select2 by showing the search
    $('.select3-show-search').select3({
        minimumResultsForSearch: '',
        width: '100%'
    });

    // select3-search__field
    $('.select3').on('click', () => {
        let selectField = document.querySelectorAll('.select3-search__field')
        selectField.forEach((element, index) => {
           
        })
    });

});