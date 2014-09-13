
var stage;
//var fala1;
//var fala2;
//var fala3;

var lt;
var st;

var waves;

//            function Wave(bitmap,startx,starty,ppx,ppy){
//                this.bitmap = bitmap;
//                this.startx = startx;
//                this.starty = starty;
//                
//                this.bitmap.x = startx;
//                this.bitmap.y = starty;
//                this.bitmap.regX = ppx;
//                this.bitmap.regY = ppy;
//                
//                stage.addChild(this.bitmap);
//            }
//            Wave.prototype.update = function(ct){
//                this.bitmap.x = this.startx + 10 * Math.sin((ct%1000 / 1000) * 2 * Math.PI);
//                this.bitmap.y = this.starty + 15 * Math.sin((ct%1500 / 1500) * 2 * Math.PI);
//            };

function Wave(path) {
    console.log("Wave(" + path + ")");
    createjs.Bitmap.call(this, path);

    this.startx = startx;
//                this.starty = starty;
//                
//                this.bitmap.x = startx;
//                this.bitmap.y = starty;
//                this.bitmap.regX = ppx;
//                this.bitmap.regY = ppy;
}

// inherit Person
//Wave.prototype = new createjs.Bitmap();
// correct the constructor pointer because it points to Person
//Wave.prototype.constructor = Wave;

Wave.prototype = Object.create(createjs.Bitmap.prototype);

function init() {
    stage = new createjs.Stage("demoCanvas");
    //stage.addEventListener("stagemousemove", handleMouseMove);

    //stage.canvas.width = window.innerWidth;
    //stage.canvas.height = window.innerHeight;

    lastTime = createjs.Ticker.getTime();
    st = 0;
    createjs.Ticker.addEventListener("tick", updateScene);

    waves = [];
    //var fala3 = new createjs.Bitmap("<?php echo (base_url() . 'resources/images/mainpage/glowna_fala3.png'); ?>");
    //fala3.regX = 512;
    //fala3.regY = 334;
    //fala3.x = 500;
    //fala3.y = 500;
    //stage.addChild(fala3);

    var f1 = new Wave("<?php echo (base_url() . 'resources/images/mainpage/glowna_fala3.png'); ?>");
    stage.addChild(f1);
    //var fala33 = new createjs.Bitmap("<?php echo (base_url() . 'resources/images/mainpage/glowna_fala3.png'); ?>");

    //var wave = new Wave(fala3,400,500,512,334);
    //waves.push(wave);

    //wave333 = new Wave(fala33,400+400,500,512,334);
//                
//                fala2 = new createjs.Bitmap("<?php echo (base_url() . 'resources/images/mainpage/glowna_fala2.png'); ?>");
//                fala2.regX = 512;
//                fala2.regY = 207;
//                fala2.x = 500;
//                fala2.y = 500;
//                stage.addChild(fala2);
//                
//                fala1 = new createjs.Bitmap("<?php echo (base_url() . 'resources/images/mainpage/glowna_fala1.png'); ?>");
//                fala1.regX = 512;
//                fala1.regY = 151;
//                fala1.x = 500;
//                fala1.y = 500;
//                stage.addChild(fala1);

    //stage.update();
}

function updateScene(event) {

    var ct = createjs.Ticker.getTime();
    var dt = ct - lt;
    lt = ct;

    //for( var i = 0 ; i < waves.length ; ++i){
    //  waves[i].update(ct);
    //}

//                fala1.x = 512 + 10 * Math.sin((ct%1000 / 1000) * 2 * Math.PI);
//                fala1.y = 500 + 15 * Math.sin((ct%1500 / 1500) * 2 * Math.PI);
//                
//                fala2.x = 512 + 10 * Math.cos((ct%1200 / 1200) * 2 * Math.PI);
//                fala2.y = 500 + 15 * Math.cos((ct%1800 / 1800) * 2 * Math.PI);
//                
//                fala3.x = 512 + 10 * Math.sin((ct%1500 / 1500) * 2 * Math.PI);
//                fala3.y = 500 + 15 * Math.sin((ct%2000 / 2000) * 2 * Math.PI);

    //st += deltaTime;
    //if( st > 1500 ) st = 0;
    //console.log(timeStep);



    stage.update();
}

//            function handleMouseMove(event) {
//                //cursor.x = stage.mouseX;
//                //cursor.y = stage.mouseY;
//
//                //alert("asdf" + stage.mouseX );  
//                //bitmap.rotation = stage.mouseX;
//
//                //var 150 * Math.cos((stage.mouseX/1024)*4*Math.PI)
//
//                //bitmap.y = 250 + 150 * Math.cos((stage.mouseX / 1024) * 1 * Math.PI);
//
//                stage.update();
//            }

$(document).ready(function() {
    menuready();
    init();
});