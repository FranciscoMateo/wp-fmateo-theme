jQuery(function ($) {

    $('.bold-first-word').each(function(){
        var $text_element = $(this);
        var $text = $text_element.text();
        var $splitted = $text.split(' ');

        $text_element.text('');
        $text_element.append('<strong>' + $splitted[0] + '</strong>' + ' ');

        var i = 1;
        $($splitted).each(function(){
            var need_space = (i < $splitted.length) ? ' ' : '';
            if (undefined != $splitted[i]){
                $text_element.append( $splitted[i] + need_space);
            }
            i++;
        });

        $('.bold-last-word').each(function(){
            var $text_element = $(this);
            var $text = $text_element.text();
            var $splitted = $text.split(' ');
    
            $text_element.text('');
                
            var i = 0;
            $($splitted).each(function(){
                var need_space = (i < $splitted.length) ? ' ' : '';
                if ( $splitted[i] != undefined & i < $splitted.length -1){
                    $text_element.append( $splitted[i] + need_space);
                }
                i++;
            });
            $text_element.append('<strong>' + $splitted[$splitted.length -1] + '</strong>');
        });
    });
});