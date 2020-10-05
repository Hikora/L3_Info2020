var nomsJoueurs = [];
var nbJoueursConnectes = 0;

var serveur = require('http').createServer(function(req, res){});
var io = require("socket.io").listen(serveur);

serveur.listen(8888);

io.sockets.on('connection', function (socket) {
    
    socket.on('etatPartie', function(message) {
        console.log("Un joueur demande l'état de la partie");	
        let etat = {"nbJoueursConnectes":nbJoueursConnectes, "nomsJoueurs":nomsJoueurs};

    });

    socket.on('rejoindrePartie', function(message) {
	console.log("Un joueur rejoint la partie");

    });

    socket.on('quitterPartie', function(message) {
	console.log("Un joueur quitte la partie");	

    });

    socket.on('actionPartie', function(message) {
	console.log("Un joueur sélectionne un hexagone");
	
    });   
});


