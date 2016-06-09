$(document).ready(function($) {
	$('#setting-album').click(function(event) {
		if ($('#hidden-setting').attr('class') == 'hidden')
			{
				$('#hidden-setting').removeClass('hidden');
				$('#hidden-setting').addClass('show');
			} else
			{
				$('#hidden-setting').removeClass('show');
				$('#hidden-setting').addClass('hidden');
			};
	});

	$('.option-menu').hover(function() {
		$('.hidden-setting',this).removeClass('hidden');
		$('.hidden-setting',this).addClass('show');
	}, function() {
		$('.hidden-setting',this).removeClass('show');
		$('.hidden-setting',this).addClass('hidden');
	});

	// comment bar
	$('.panel-google-plus > .panel-footer > .input-placeholder, .panel-google-plus > .panel-google-plus-comment > .panel-google-plus-textarea > button[type="reset"]').on('click', function(event) {
        var $panel = $(this).closest('.panel-google-plus');
            $comment = $panel.find('.panel-google-plus-comment');

        $comment.find('.btn:first-child').addClass('disabled');
        $comment.find('textarea').val('');

        $panel.toggleClass('panel-google-plus-show-comment');

        if ($panel.hasClass('panel-google-plus-show-comment')) {
            $comment.find('textarea').focus();
        }
   });
   $('.panel-google-plus-comment > .panel-google-plus-textarea > textarea').on('keyup', function(event) {
        var $comment = $(this).closest('.panel-google-plus-comment');

        $comment.find('button[type="submit"]').addClass('disabled');
        if ($(this).val().length >= 15) {
            $comment.find('button[type="submit"]').removeClass('disabled');
        }
   });
   $('.add-photo').hover(function() {
      src = $('.add-photo a img').attr('src');
   		$('.add-photo a img').attr('src', $('.add-photo a img').attr('src-hover'));
   }, function() {
   		$('.add-photo a img').attr('src', src);
   });
   $('.add-album').hover(function() {
      src = $('.add-album a img').attr('src');
   		$('.add-album a img').attr('src', $('.add-album a img').attr('src-hover'));
   }, function() {
   		$('.add-album a img').attr('src', src);
   });
});