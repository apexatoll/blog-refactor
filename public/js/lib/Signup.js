class Signup extends Popup {
	constructor(){
		super("/signup", ()=>{this.submit()})
	}
	submit(){
		this.parse("/users/register", Form.collect("#form-signup"));
	}
}
