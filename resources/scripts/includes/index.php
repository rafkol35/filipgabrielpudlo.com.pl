<script type="text/javascript">
    var stage;

    var lt;
    var st;

    var waves;
    var slonko;
    
    var lastMousePosX;
    var lastMousePosY;
    var lmpaa;
    
    var mouseActivity;

    var maxDist;
    
    var flaga1;
    var flaga2;
    var flaga3;
    var flaga4;
    var flaga5;
    
    //wave-----------------------------------------------------------------------

    function Wave(bitmap, startx, starty, ppx, ppy, mx, my, mtx, mty) {
        this.bitmap = bitmap;
        this.startx = startx;
        this.starty = starty;
        this.mx = mx;
        this.my = my;
        this.mtx = mtx;
        this.mty = mty;

        this.bitmap.x = startx;
        this.bitmap.y = starty;
        this.bitmap.regX = ppx;
        this.bitmap.regY = ppy;

        this.multip = 0.0;
        this.mulpos = 0.25;
        this.t = 0;
        //stage.addChildAt(this.bitmap,index);
    }
    Wave.prototype.update = function(ct) {
        ct += (mouseActivity*ct);
        this.t += ct;
        var m = 1.0; // + 1.0-mouseActivity;
        var m2 = 0.25 + mouseActivity*0.75;
        this.bitmap.x = this.startx + m2 * this.mx * Math.sin((this.t % (m * this.mtx) / (m * this.mtx)) * 2 * Math.PI);
        this.bitmap.y = this.starty + m2 * this.my * Math.sin((this.t % (m * this.mty) / (m * this.mty)) * 2 * Math.PI);
    };
    Wave.prototype.setMutlip = function(newMultip) {
        this.multip = newMultip;
        //this.mulpos = newMultip;
    };

    //wave-----------------------------------------------------------------------

    //sun-----------------------------------------------------------------------

    function Sun(bitmap, startx, starty, dayDuration) {
        this.bitmap = bitmap;
        this.bitmap.x = startx;
        this.bitmap.y = starty;
        this.bitmap.regX = 351 / 2;
        this.bitmap.regY = 339 / 2;
        this.dayDuration = dayDuration;
        this.t = 0;
        this.lor = 1;
    }
    Sun.prototype.update = function(ct) {
        console.log( "" + ct );
        this.t += ct;
        if( this.t >= this.dayDuration )
        {
            this.t = 0;
            this.lor *= -1;
        }
        
        this.bitmap.rotation = this.bitmap.rotation + (ct / 5000 * 360) * mouseActivity * this.lor;
        
        var dayTime = this.t / this.dayDuration;
        this.bitmap.x = 1024 * dayTime;
        this.bitmap.y = 470 - 360*Math.sin( Math.PI * dayTime );
    };
    
    //sun-----------------------------------------------------------------------

    function init() {
        stage = new createjs.Stage("demoCanvas");
        stage.addEventListener("stagemousemove", handleMouseMove);

        //stage.canvas.width = window.innerWidth;
        //stage.canvas.height = window.innerHeight;

        var cx = stage.canvas.width;
        var cy = stage.canvas.height;
        maxDist = Math.sqrt( cx*cx + cy*cy );
        //console.log("maxDist" + maxDist);
        
        lastTime = createjs.Ticker.getTime();
        st = 0;
        createjs.Ticker.addEventListener("tick", updateScene);

        lastMousePosX = -1;
        lastMousePosY = -1;
        lmpaa = false;
        
        mouseActivity = 0;
        
        waves = [];

        flaga1 = new createjs.Bitmap("<?php echo (base_url() . 'resources/images/mainpage/glowna_flaga1.png'); ?>");
        flaga1.regX = 45;
        flaga1.regY = 110;
        flaga1.x = 300;
        flaga1.y = 220;
        
        flaga2 = new createjs.Bitmap("<?php echo (base_url() . 'resources/images/mainpage/glowna_flaga1.png'); ?>");
        flaga2.regX = 45;
        flaga2.regY = 110;
        flaga2.x = 730;
        flaga2.y = 180;
        
        flaga3 = new createjs.Bitmap("<?php echo (base_url() . 'resources/images/mainpage/glowna_flaga1.png'); ?>");
        flaga3.regX = 45;
        flaga3.regY = 110;
        flaga3.x = 635;
        flaga3.y = 250;
        flaga3.rotation = -55;
        
        flaga4 = new createjs.Bitmap("<?php echo (base_url() . 'resources/images/mainpage/glowna_flaga4.png'); ?>");
        flaga4.regX = 45;
        flaga4.regY = 110;
        flaga4.x = 487;
        flaga4.y = 290;
        flaga4.rotation = -5;
        
        flaga5 = new createjs.Bitmap("<?php echo (base_url() . 'resources/images/mainpage/glowna_flaga4.png'); ?>");
        flaga5.regX = 45;
        flaga5.regY = 110;
        flaga5.x = 640;
        flaga5.y = 160;
        flaga5.rotation = -15;
        
        var zamek = new createjs.Bitmap("<?php echo (base_url() . 'resources/images/mainpage/glowna_zamek.png'); ?>");
        zamek.regX = 327;
        zamek.regY = 381;
        zamek.x = 512;
        zamek.y = 500;

        var sun1 = new createjs.Bitmap("<?php echo (base_url() . 'resources/images/mainpage/glowna_slonko.png'); ?>");
        slonko = new Sun(sun1, 0, 470, 10000);
        
        var fala3 = new createjs.Bitmap("<?php echo (base_url() . 'resources/images/mainpage/glowna_fala3.png'); ?>");
        var wave3 = new Wave(fala3, 512, 558, 512, 334, 8, 10, 1600, 2000);
        waves.push(wave3);

        var fala2 = new createjs.Bitmap("<?php echo (base_url() . 'resources/images/mainpage/glowna_fala2.png'); ?>");
        var wave2 = new Wave(fala2, 512, 558, 512, 207, 10, 12, 1400, 1700);
        waves.push(wave2);

        var fala1 = new createjs.Bitmap("<?php echo (base_url() . 'resources/images/mainpage/glowna_fala1.png'); ?>");
        var wave1 = new Wave(fala1, 512, 558, 512, 151 - 20, 20, 15, 1200, 1500);
        waves.push(wave1);

        stage.addChild(slonko.bitmap, flaga1,flaga2,flaga3,flaga4,flaga5,  wave3.bitmap, zamek, wave2.bitmap, wave1.bitmap);

    }

    function updateScene(event) {

        var ct = createjs.Ticker.getTime();
        var dt = ct - lt;
        lt = ct;

        //console.log( "" + ct + " " + lt + " " + dt );
        if( isNaN(dt) ) return;
        
        for (var i = 0; i < waves.length; ++i) {
            waves[i].update(dt);
        }
        
        slonko.update(dt);
        
        mouseActivity -= dt/3000;
        mouseActivity = Math.max(mouseActivity,0);
        
        flaga1.rotation = Math.sin(ct/200)*5*mouseActivity;
        flaga2.rotation = Math.sin(ct/1000)*3;
        
        flaga3.rotation = -55 + Math.sin(ct/1000)*5*mouseActivity;
        flaga4.rotation = -5 + Math.sin(ct/600)*3;
        flaga5.rotation = -15 + Math.sin(ct/700)*5*mouseActivity;
        
        //console.log( "" + mouseActivity );
        
        
        //if( mouseActivity <= slv ) mouseActivity = 0;
        //else mouseActivity = mouseActivity-slv; // ((dt % 1000) / 1000 );
        //mouseActivity = mouseActivity-slv;
        //if( mouseActivity < 0 ) mouseActivity = 0;
        
        //console.log( "" + mouseActivity );
        
        //console.log( "ma : " + mouseActivity );
        //console.
          
          
        stage.update();
    }

    function handleMouseMove(event) {
        if( !lmpaa ){
            lastMousePosX = stage.mouseX;
            lastMousePosY = stage.mouseY;
            lmpaa = true;
            return;
        }
        
        var currentMousePosX = stage.mouseX;
        var currentMousePosY = stage.mouseY;

        var diffx = currentMousePosX - lastMousePosX;
        var diffy = currentMousePosY - lastMousePosY;

        var dist = Math.sqrt( diffx*diffx + diffy*diffy );
        
        mouseActivity += (dist*3/maxDist);
        mouseActivity = Math.min(mouseActivity,1);
        
        //console.log( "dist " + dist + " " + mouseActivity);
        
        lastMousePosX = currentMousePosX;
        lastMousePosY = currentMousePosY;
            
        stage.update();
    }

    $(document).ready(function() {
        menuready();
        init();
    });
</script>