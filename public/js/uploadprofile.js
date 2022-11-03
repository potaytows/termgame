
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#imagePreview").css(
                "background-image",
                "url(" + e.target.result + ")"
            );
            $("#imagePreview").hide();
            $("#imagePreview").fadeIn(650);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function () {
    readURL(this);
});

let nameinput = document.querySelector(".newnameinput");
let pfpinput = document.querySelector(".newpfpinput");
let genderinput = document.querySelector(".newgenderinput");
let button = document.querySelector("#confirmEditbutton");

button.disabled = true; //setting button state to disabled

nameinput.addEventListener("change", stateHandle);
pfpinput.addEventListener("change", stateHandle);
genderinput.addEventListener("change", stateHandle);


function stateHandle() {
    if ((document.querySelector(".newnameinput").value|| document.querySelector(".newpfpinput").value || document.querySelector('.newgenderinput').value) === "") {
        button.disabled = true; //button remains disabled
    } else {
        button.disabled = false; //button is enabled
    }

    var getSelectedValue = document.querySelector( 'input[name="newgender"]:checked');      
    console.log("Selected radio button values is: " + getSelectedValue.value);  

}

    
console.log('Called uploadProfile.js');
console.log(document.querySelector('input[name="newgender"]:checked').value);

