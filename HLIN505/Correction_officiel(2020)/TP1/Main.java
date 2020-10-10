public class Main {
    public static void main(String[] args) throws Exception {
        Lieu lieu = Lieu.PISCINE;
        Creneau l = new Creneau(JourSemaine.LUNDI,new Creneau.Heure(8,0),new Creneau.Heure(10,0));
        lieu.addOccupe(l);

        Creneau second = new Creneau(JourSemaine.MARDI, new Creneau.Heure(8,0), new Creneau.Heure(10,0));
        lieu.addOccupe(second);

//        Creneau trois = new Creneau(JourSemaine.MARDI, new Creneau.Heure(9,0), new Creneau.Heure(11,0));
//        lieu.addOccupe(trois);

        Adherent ad = new Adherent("Yan");
        ad.reAdhesion();

        Adherent secondAd = new Adherent("Loïc");
        System.out.println(secondAd.getNumAdherent());

        MyLinkedList<Integer> list = new MyLinkedList<Integer>();
        list.push(5);
        list.push(6);
        list.push(4);
        list.display();

        MyLinkedList<Integer> revertedList = list.reverse();
        revertedList.display();

        for (Integer i : list) {
            System.out.println(i);
        }
    }
}
