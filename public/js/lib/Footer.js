class Footer {
	static show(menu){
		new Ajax().post(`/footer/${menu}`, null, (html)=>{
			$("footer").html(html)
		})
	}
	static login(){
		new Ajax().post("/users/login", Form.collect("#form-footer-login"), (php)=>{console.log(php)})
	}
}
