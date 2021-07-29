class Ajax {
	post(url, data=null, callback){
		this.send_request("POST", url, data, callback)
	}
	get(url, data=null, callback){
		this.send_request("GET", url, data, callback)
	}
	parse(url, data, tag, 
		success = (json, tag)=>{this.success(json, tag)}, 
		error   = (json, tag)=>{this.error(json, tag)}){
		this.post(url, data, (php)=>{
			this.parse_response(php, tag, success, error)
		})
	}
	parse_response(php, tag, success, error){
		let json = JSON.parse(php)
		json.success ? success(json, tag) : error(json, tag);
	}
	send_request(type, url, data, callback){
		$.ajax({
			type:type,
			url:url,
			data:data,
			success:(php)=>{ callback(php) }
		})
	}
	success(json, tag){
		Response.success(json.message, tag)
	}
	error(json, tag){
		Response.error(json.message, tag)
	}
}
