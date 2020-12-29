var burger1 = document.querySelector("#burger1");
var burger2 = document.querySelector("#burger2");
var burger3 = document.querySelector("#burger3");
var mobile_ul = document.querySelector('#mobile-ul');
var mobile_ul_a = document.querySelector('.mobile_ul_a');
var mobile_menu_container = document.querySelector('#mobile-menu-container');
var menu_status = 'closed';

$('#mobile-menu-burger').on('click', function() {
    if(menu_status == 'closed') {
        menu_status = 'open';
        document.getElementById('mobile-ul').style.maxHeight = "1000px";
        document.querySelector('.mobile_ul_a').style.display = "block";
        burger1.style.transform = "rotate(45deg) translateY(10px) translateX(5px)";
        burger2.style.transform = " translateX(20px)";
        burger2.style.opacity = "0";
        burger3.style.transform = "rotate(-45deg) translateY(-5px) translateX(0px)";
        mobile_menu_container.style.opacity = "1";
        document.getElementById('prevbutton').style.opacity = '0';
        document.getElementById('nextbutton').style.opacity = '0';
    }
    else {
        menu_status = 'closed';
        document.getElementById('mobile-ul').style.maxHeight = "0"
        burger1.style.transform = "rotate(0) translateY(0) translateX(0)";
        burger2.style.transform = " translateX(0)";
        burger2.style.opacity = "1";
        burger3.style.transform = "rotate(0) translateY(0) translateX(0)";
        mobile_menu_container.style.opacity = "0";
        document.getElementById('prevbutton').style.opacity = '1';
        document.getElementById('nextbutton').style.opacity = '1';
    }
});