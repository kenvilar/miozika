(function ($) {

	function Audio() {
		this.audio = document.createElement('audio');
		this.setTrack  = function () {
			this.audio.src = src;
		}
	}

})(jQuery);
