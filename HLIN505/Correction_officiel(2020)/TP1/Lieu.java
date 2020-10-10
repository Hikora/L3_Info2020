import java.util.ArrayList;

public enum Lieu { STADE("Stade de foot"), PISCINE("Piscine"), SALLES("Salles de sport");
    private String nom;
    private ArrayList<Creneau> occupes;

    private Lieu(String nom) {
        this.nom = nom;
        this.occupes = new ArrayList<>();
    }

    public boolean estDisponible(Creneau creneau) {
        for (Creneau c : occupes) {
            if (c.chevauche(creneau)) {
                return false;
            }
        }
        return true;
    }

    public void addOccupe(Creneau c) throws Exception {
        if (!this.estDisponible(c)) {
            throw new Exception("You cannot use the place as it isn't available.");
        }
        this.occupes.add(c);
    }

    @Override
    public String toString() {
        return this.nom;
    }
}
