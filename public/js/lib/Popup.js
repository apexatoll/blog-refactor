class Popup extends Ajax {
	constructor(show_path, submit, cancel=()=>{Popup.close()}){
		super();
		this.show_path = show_path
		this.bind_events(submit, cancel);
	}
	bind_events(submit, cancel){
		[submit, cancel].map((cb, i)=>{
			$(document).on("click", Popup.buttons()[i], (e)=>{
				e.preventDefault();
				cb();
			})
		})
	}
	show(){
		this.post(this.show_path, null, (html)=>{
			$("#window").append(html);
		})
	}
	parse(url, data){
		super.parse(url, data, ".popup-response", (json, tag)=>{
			super.success(json, tag);
			window.setTimeout(()=>{
				Popup.close();
			}, 5000);
		});
	}
	static buttons(){
		return [".popup-submit", ".popup-cancel"];
	}
	static close(){
		Popup.clear_events();
		$(".fullscreen").fadeOut(()=>{
			$(".fullscreen").remove();
		})
	}
	static clear_events(){
		Popup.buttons().map((cls)=>{
			$(document).off("click", cls);
		})
	}
}
