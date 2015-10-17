/**
 * Created by root on 17.10.15.
 */
$(document).ready(function(){
    $('.tabs__control-link').on('click', function(e){
        e.preventDefault();

        var item = $(this).closest('.tabs__controls-item'),
            contentItem = $('.tabs__item'),
            itemPosition = item.index();

        contentItem.eq(itemPosition)
            .addClass('active')
            .siblings()
            .removeClass('active');


        item.addClass('active')
            .siblings()
            .removeClass('active');
    })
})