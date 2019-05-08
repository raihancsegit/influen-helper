;(function($) {
	$('.js-vc-radio').on('click.VcRadioOnClick', '.js-vc-radio-input', function(e) {
		var $this   = $(this),
			$holder = $this.parents('.js-vc-radio');

		$holder.find('.wpb_vc_param_value').prop( 'value', $this.val() ).trigger('change');
	});
}(window.jQuery));
