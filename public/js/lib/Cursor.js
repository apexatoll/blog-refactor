class Cursor {
	constructor(){
		this.target = $("header h1 a");
		this.text   = $(this.target).html();
	}
	cursor(){
		return "<span class='white'>\u2588</span>";
	}
	tick(time=800){
		window.setTimeout(()=>{
			this.set_header(this.cursor());
			window.setTimeout(()=>{
				this.set_header();
				window.setTimeout(this.tick(), time)
			}, time)
		}, time)
	}
	set_header(text=""){
		$(this.target).html(this.text+text);
	}
}
