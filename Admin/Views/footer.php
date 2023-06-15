<?php if(isset($_SESSION["admin"])){ ?>
</div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<script>
    const show = document.getElementById('show-nav-bar');
const navBar = document.getElementById('nav-bar');
const hide = document.getElementById('hide-nav-bar');
show.addEventListener('click', () => {
    navBar.style.left = "0%";
    document.getElementById('container-services').style.width = "85%";
    document.getElementById('container-nav-bar').style.width = "15%";
});
hide.addEventListener('click', () => {
  navBar.style.left = "-100%";
    document.getElementById('container-nav-bar').style.width = "7%";
  document.getElementById('container-services').style.width = "100%";
});

</script>
</body>
</html>