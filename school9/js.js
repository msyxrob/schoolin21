		var mybutton = document.getElementById("myBtn");
        window.onscroll = function(){Function()};
        function Function(){
            if (document.body.scrollTop > 220 || document.documentElement.scrollTop > 220) {
                mybutton.style.display = "block";
            }else{
                mybutton.style.display = "none";
            }
        }
            function topFunction(){
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
        }