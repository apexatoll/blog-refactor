<div class="fullscreen">
	<div class="wrapper">
		<?$this->box($title, "popup");?>
		<div class="wrapper">
			<div class="popup-response"></div>
			<?require_once($content);?>
			<div class="buttons">
				<button class="popup-cancel"><?=$buttons['cancel']?></button>
				<button class="popup-submit"><?=$buttons['submit']?></button>
			</div>
		</div>
		<?$this->close_box();?>
	</div>
</div>
