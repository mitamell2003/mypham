<div class="container-game">
    <div class="game">
        <div class="table">
            <div class="name-game">
                <h3>Bạn có muốn vào trò chơi không?</h3>
            </div>
            <div class="btn">
                <div class="yes">
                    <button onmouseover="yes(this)" onclick= "play(this)">Có</button>
                </div>
                <div class="no">
                    <button onclick="alert('Bạn đã thoát trò chơi')">Không</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
     var count = 0;
    function yes(e){  
        var y = Math.floor(Math.random() * 400) + 200;
        var x = Math.floor(Math.random() * 500) + 100;
        e.style.transform = "translate("+ x +"px, "+ y +"px)";
        e.style.transition = "all .1s ease";
    }
    function play(e){
       
       
        console.log(count);
        if(count >= 1){
            e.style.width = "80%";
            e.innerHTML = "Không chơi được mà còn bấm";
        }else{
            e.innerHTML = "Không";
            count++;
           
        }
    }
</script>