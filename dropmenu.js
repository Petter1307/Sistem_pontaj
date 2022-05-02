function change_model(){
    x= document.getElementById("open_menu");
    y= document.getElementById("close_menu");
    if(window.getComputedStyle(x).display =="flex"){
        y.style.display = "flex";
        x.style.display = "none";
        document.getElementById("myDropdown").classList.toggle("showm");
        return;
        
    }else if(window.getComputedStyle(y).display == "flex")
    {
        x.style.display = "flex";
        y.style.display = "none";
        var dropdowns = document.getElementsByClassName("dropdown_content");
        for(i = 0; i < dropdowns.length; i++){
            var openDropDown = dropdowns[i];
            if(openDropDown.classList.contains('showm')){
                openDropDown.classList.remove('showm');
            }
        }
        return;
    }
}