jQuery(function ($) {
    $('.search__inner input[name="s"]').on('keyup', function () {
        var search = $('.search__inner input[name="s"]').val();
        console.log(search);
        if (search.length < 4) {
            return false;
        }
        var data = {
            s:search,
            action: 'search_action',
            nonce : search__inner.nonce

        };
        $.ajax({
            url: search__inner.url,
            data :data,
            type:'POST',
            dataType:'json',
            beforeSend:function(xhr){
            },
            success:function(data){
                $('.search__inner .search-result').html(data.out);

            }
        });

    });
});