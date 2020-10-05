    function creeHexagone(rayon) {
        var points = new Array();
        for (var i = 0; i < 6; ++i) {
            var angle = i * Math.PI / 3;
            var x = Math.sin(angle) * rayon;
            var y = -Math.cos(angle) * rayon;
            // console.log("x="+Math.round(x*100)/100+" y="+Math.round(y*100)/100);
            points.push([Math.round(x*100)/100, Math.round(y*100)/100]);
        }
        return points;
     }
     function monHexagone(rayon) {
        var points = new Array();
        for (var i = 0; i < 6; i++) {
            var angle = Math.PI / 2 + i * Math.PI / 3;
            var x = Math.cos(angle) * rayon;
            var y = Math.sin(angle) * rayon;
            // console.log("x="+Math.round(x*100)/100+" y="+Math.round(y*100)/100);
            points.push([Math.round(x*100)/100, Math.round(y*100)/100]);
        }
        return points;
     }
     function genereDamier(rayon, nbLignes, nbColonnes) {
       distance =  rayon - (Math.sin(1 * Math.PI / 3) * rayon);  // MÃ©thode plus triviale
       d3.select("#damier").append("svg").attr("width", (nbLignes+1)*2*rayon).attr("height", nbLignes*2*rayon);
       var hexagone = monHexagone(rayon);
       for (var ligne=0; ligne < nbLignes; ligne++) {
         for (var colonne=0; colonne < nbColonnes; colonne++) {
            var d = "";
            var x, y;
            for (h in hexagone) {
                // Si ligne impair, dÃ©calage des hexagones d'un rayon
                if (ligne % 2) x = hexagone[h][0]+(rayon-distance)*(2+2*colonne);  // Pour les lignes paires, dÃ©calage d'un rayon (moins la distance intercalaire) des hexagones
                else           x = hexagone[h][0]+(rayon-distance)*(1+2*colonne);
                y = distance*2 + hexagone[h][1]+(rayon-distance*2)*(1+2*ligne);
                if (h == 0) d += "M"+x+","+y+" L";
                else        d +=     x+","+y+" ";
            }
            d += "Z";
            d3.select("svg")
               .append("path")
               .attr("d", d)
               .attr("stroke", "black")
               .attr("fill", "white")
               .attr("id", ligne+":"+colonne)
               .on("click", function(d) {
                     var id = d3.select(this).attr('id');
                     console.log(id);
                     d3.select(this).attr('fill', couleursJoueurs[joueurLocal]);
                     socket.emit("deplacement", { "numJoueur": joueurLocal, "idCase": id});
                });
         }
       }
    }

