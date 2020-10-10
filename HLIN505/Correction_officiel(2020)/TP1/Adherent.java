import java.util.GregorianCalendar;

public class Adherent {
    private int lastYearPaid;
    private final String nom;
    private final int numAdherent;

    private static int nbAdherents = 0;

    public Adherent(String nom) {
        this.nom = nom;
        ++nbAdherents;
        this.numAdherent = nbAdherents;
    }

    public int getLastYearPaid() {
        return this.lastYearPaid;
    }

    public String getNom() {
        return this.nom;
    }

    public int getNumAdherent() {
        return this.numAdherent;
    }

    public void reAdhesion() {
        this.lastYearPaid = new GregorianCalendar().get(GregorianCalendar.YEAR);
    }

    @Override
    public String toString() {
        return "#" + numAdherent + " : " + nom;
    }
}
