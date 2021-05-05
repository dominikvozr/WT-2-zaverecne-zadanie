$('.draggable').draggable({
    cursor: 'move'
});
$('.droppable').droppable({
    drop: function(event, ui) {
        $(this).addClass('ui-state-highlight');
        ui.draggable.position({
            of: $(this),
            my: 'left top',
            at: 'left+6 top+6'
        });
        $('.draggable').each(function(i) {
            $(this).data('value', i+1);
        }).filter(':first').trigger('listData');
    }
});

$('.draggable').on('listData', function() {
    $('.droppable').each(function() {
        console.log( $(this).text() + ' - ' + $(this).data('value') );
    });
});
