$(document).ready(()=>{
	new Cursor().tick();
	$(document).on("click", "#popup-signup", (e)=>{
		e.preventDefault();
		new Signup().show();
	})
	$(document).on("click", "#footer-show-login", (e)=>{
		e.preventDefault();
		Footer.show("login");
	})
	$(document).on("click", ".footer-cancel", (e)=>{
		e.preventDefault();
		Footer.show("default");
	})
	$(document).on("click", "#footer-login", (e)=>{
		e.preventDefault();
		Footer.login();
	})
});
