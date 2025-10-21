document.addEventListener("DOMContentLoaded", function () {
    const trailerType = document.getElementById("trailer_url_type");
    const urlInput = document.getElementById("url_input");
    const fileInput = document.getElementById("url_file_input");
    const embedInput = document.getElementById("trailer_embed_input_section");

    trailerType.addEventListener("change", function () {
        urlInput.classList.add("d-none");
        fileInput.classList.add("d-none");
        embedInput.classList.add("d-none");

        if (this.value === "URL" || this.value === "YouTube" || this.value === "Vimeo") {
            urlInput.classList.remove("d-none");
        } else if (this.value === "Local" || this.value === "HLS" || this.value === "x265") {
            fileInput.classList.remove("d-none");
        } else if (this.value === "Embedded") {
            embedInput.classList.remove("d-none");
        }
    });
});
