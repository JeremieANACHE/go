
const WHITE = 0, BLACK = 1, LINES = 19, COL = 19;


function Go(fetchUrl, playUrl, passUrl, rows){
    const LINES = rows;
    const COL = rows;
    var self = this;
    this.fetchUrl = fetchUrl;
    this.playUrl = playUrl;
    this.passUrl = passUrl;
    this.size = 700;
    this.offset = 25;
    this.couleurActuelle = WHITE;
    this.createArray = function (lines, cols){
        var tab = new Array();
        for(var i = 0; i < lines; i++){
            tab[i] = new Array();
            for(var j = 0; j < cols; j++){
                tab[i][j] = null;
            }
        }
        return tab;
    };
    this.canvas = document.getElementById("board");
    this.context = this.canvas.getContext("2d");
    this.board = this.createArray(LINES, COL);

    this.updateBoard = function() {
        self.context.clearRect(0, 0, self.size, self.size);
        self.context.fillStyle = "#DB9356";
        self.context.fillRect(0, 0, self.size, self.size);
        self.drawGrid(self.size, self.context);
        for (var i = 0; i < LINES; i++) {
            for (var j = 0; j < COL; j++) {
                if (self.board[i][j] != null) {
                    self.drawCircle(j * (self.size - 2 * self.offset) / (COL - 1) + self.offset, i * (self.size - 2 * self.offset) / (LINES - 1) + self.offset, 10, self.board[i][j]);
                }
            }
        }
    };
    this.getCol = function(x){
        for (var i = 0; i <= COL; i++){
            if (Math.abs(x-i*(self.size/(COL+0.5))) <= self.size/(2*(COL-1))){
                return i;
            }
        }
    };
    this.getLine = function(y){
        for (var i = 0; i <= LINES; i++){

            if (Math.abs(y-i*(self.size/(LINES+0.5))) <= self.size/(2*(LINES-1))){
                return i;
            }
        }
    };
    this.drawGrid = function(){
        var index = self.offset;
        self.context.strokeStyle = "#656361";
        for(var i = 0; i <= LINES; i++){
            self.context.moveTo(self.offset, index);
            self.context.lineTo(self.size-self.offset, index);
            self.context.stroke();
            index = i*((self.size-2*self.offset)/(LINES-1))+self.offset;
        }
        index = self.offset;
        for(var i = 0; i <= COL; i++){
            self.context.moveTo(index, self.offset);
            self.context.lineTo(index, self.size-self.offset);
            self.context.stroke();
            index = i*((self.size-2*self.offset)/(COL-1))+self.offset;
        }
    };
    this.drawCircle = function(x, y, r, color){
        self.context.beginPath();
        self.context.arc(x,y,r,0,2*Math.PI);
        if (color == WHITE){
            self.context.fillStyle = "#FFF";
        }
        else{
            self.context.fillStyle = "#000";
        }
        self.context.lineWidth = 1;
        self.context.fill();
        self.context.stroke();
    };

    function updateHtml(data){
        if(data.ended){
            $("#infos").html("Le jeu est terminé");
            if(data.won){
                $("#winner").html("Vous avez gagné la partie");
            }
            else{
                $("#winner").html("Vous avez perdu la partie");
            }
            clearInterval(self.interval);
        }
        else if (data.passed){
            $("#infos").html("Votre adversaire a passé son tour");
        }
        else{
            $("#infos").html("");
        }
        self.board = data.board;
        self.updateBoard();
    }

    function fetch(){
        $.ajax({
            url: self.fetchUrl
        }).done(updateHtml)
        .fail(function(){

        });
    }
    $(fetch);
    $("#board").click(function(e){
        var x = self.getCol(e.pageX-this.offsetLeft-self.offset);
        var y = self.getLine(e.pageY-this.offsetTop-self.offset);
        console.log("(" + e.pageX-this.offsetLeft-self.offset + ", " + self.getLine(e.pageY-this.offsetTop-self.offset) + ")");
        console.log("[" + y + "]" + "[" + x + "]");
        $.ajax({
            url: self.playUrl,
            type: "POST",
            data: {
                x: x,
                y: y
            }
        }).done(updateHtml)
        .fail(function(jqxhr){
            alert("Erreur : " + jqxhr.responseJSON.message);
        });

        self.updateBoard();
        //console.log(e.pageX-this.offsetLeft-offset);
        //console.log("["+getCol(e.pageX-this.offsetLeft-offset)+"]["+getLine(e.pageY-this.offsetTop-offset)+"]");
        //console.log(getCol(e.pageX-this.offsetLeft-offset));
        //console.log("["+getCol(e.pageX-this.offsetLeft-offset)+"]["+getLine(e.pageY-this.offsetTop-offset)+"]");

    });
    $("#pass").click(function(e){
        $.ajax({
            url: self.passUrl,
            type: "POST"
        }).done(function (data){
            alert("vous avez passé");
        }).fail(function(jqxhr){
            alert("Erreur : " + jqxhr.responseJSON.message);
        });
    });
    this.interval = setInterval(fetch, 5000);
}
