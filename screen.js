
	function switchNav(id) {
		const hidden=document.getElementByClassName("formP");
		hidden.style.opacity = "0";
		let divTarget=document.getElementById(id);
		divTarget.style.opacity = "1";
	}

	function displayResult() {
		let visu=document.getElementById("det");
		visu.className.innerHTML="detOn";
		}
