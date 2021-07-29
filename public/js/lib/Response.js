class Response {
	static success(message, tag){
		Response.show("Success", message, tag, "success")
	}
	static error(message, tag){
		Response.show("Error", message, tag, "error")
	}
	static show(status, message, tag, cls){
		$(tag).addClass(cls).hide()
			.html(Response.format_msg(status, message))
			.slideDown(()=>{
		})
		Response.hide(tag, cls)
	}
	static hide(tag, cls, time=3000){
		window.setTimeout(()=>{
			$(tag).slideUp(()=>{
				$(tag).empty().removeClass(cls)
			})
		}, time)
	}
	static format_msg(status, message){
		return "<b>"+status+": </b>"+message;
	}
}
