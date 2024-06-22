document.getElementById("file").addEventListener("change", function () {
    if (this.files[0]) {
        var fr = new FileReader();

        fr.addEventListener("load", function () {
        document.getElementById("label").style.background = "url(" + fr.result + ") no-repeat center / cover";
        }, false);

        fr.readAsDataURL(this.files[0]);
    }
});