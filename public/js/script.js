const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

// searchBtn.addEventListener("click" , () =>{
//     sidebar.classList.remove("close");
// })

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});
 // add product
        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".next").click(function () {
        if (animating) return false;
        animating = true;

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate(
            { opacity: 0 },
            {
            step: function (now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = now * 50 + "%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
                transform: "scale(" + scale + ")",
                position: "absolute",
                });
                next_fs.css({ left: left, opacity: opacity });
            },
            duration: 800,
            complete: function () {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            //easing: 'easeInOutBack'
            }
        );
        });

        $(".previous").click(function () {
        if (animating) return false;
        animating = true;

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //de-activate current step on progressbar
        $("#progressbar li")
            .eq($("fieldset").index(current_fs))
            .removeClass("active");

        //show the previous fieldset
        console.log("previous_fs");
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate(
            { opacity: 0 },
            {
            step: function (now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                left = (1 - now) * 50 + "%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({ left: left });
                previous_fs.css({
                transform: "scale(" + scale + ")",
                opacity: opacity,
                });
            },
            duration: 800,
            complete: function () {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            //easing: 'easeInOutBack'
            }
        );
        });
        //darg fil
        //selecting all required elements
        const dropArea = document.querySelector(".drag-area"),
        dragText = dropArea.querySelector("header"),
        button = dropArea.querySelector("button"),
        input = dropArea.querySelector("input");
        let file; //this is a global variable and we'll use it inside multiple functions
        button.onclick = (e) => {
        e.preventDefault();
        input.click(); //if user click on the button then the input also clicked
        };
        input.addEventListener("change", function () {
        //getting user select file and [0] this means if user select multiple files then we'll select only the first one
        file = this.files[0];
        dropArea.classList.add("active");
        //showFile(); //calling function
        });
        dropArea.addEventListener("dragover", (event) => {
        event.preventDefault(); //preventing from default behaviour
        dropArea.classList.add("active");
        dragText.textContent = "Release to Upload File";
        });
        //If user leave dragged File from DropArea
        dropArea.addEventListener("dragleave", () => {
        dropArea.classList.remove("active");
        dragText.textContent = "Drag & Drop to Upload File";
        });
        //If user drop File on DropArea
        dropArea.addEventListener("drop", (event) => {
        event.preventDefault(); //preventing from default behaviour
        //getting user select file and [0] this means if user select multiple files then we'll select only the first one
        file = event.dataTransfer.files[0];
        showFile(); //calling function
        });
        function showFile(params) {
        var fileInput = document.getElementById("file");
        // Now let's create a DataTransfer to get a FileList
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        fileInput.files = dataTransfer.files;
        }

// end add product