class Form {
	static collect(tag){
		let data = {};
		$(tag).children("input").serializeArray().map((field)=>{
			data[field.name] = field.value;
		})
		return data;
	}
}
