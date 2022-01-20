@livewireScripts()


<script defer>
    var index = 1;
    showSlide(index);

    function plusSlide(n) {
        showSlide(index = n);
    }

    function showSlide(n) {
        var i;
        var slide = document.getElementsByClassName('slide');

        if (n > slide.length) {
            index = 1;
        }
        if (n < 1) {
            index = slide.length;
        }

        for (i = 0; i < slide.length; i++) {
            slide[i].style.display = "none";
        }

        slide[index - 1].style.display = "block";
    }

    function openTab(evt ,id){
        var i ,tablink , tabContent;
        tablink = document.getElementsByClassName('tablink');
        tabContent = document.getElementsByClassName('tabContent');

        for(i=0;i<tabContent.length;i++){
            tabContent[i].style.display = "none";
        }
        for (i = 0; i < tablink.length; i++) {
            tablink[i].className = tablink[i].className.replace(" active", "");
        }

        document.getElementById(id).style.display="block";
        evt.currentTarget.className += " active";

    }
    document.getElementById("defaultTap").click()




</script>
<script src="/js/app.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/fontawesome.min.js"></script>
</body>
</html>
