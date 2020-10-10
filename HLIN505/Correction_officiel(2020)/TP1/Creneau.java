import java.util.Objects;

public class Creneau {
    public static class Heure {
        private int heures;
        private int minutes;
        public final int STEP = 5;
        public final int MIN_HEURE = 7;
        public final int MAX_HEURE = 22;

        public Heure(int heures, int minutes) throws Exception {
            this.setHeures(heures);
            this.setMinutes(minutes);
        }

        @Override
        public String toString() {
            return heures + ":" + minutes;
        }

        public void setHeures(int heures) throws Exception {
            if (heures < MIN_HEURE) {
                throw new Exception("The hour cannot be under the minimum (" + MIN_HEURE + ").");
            }
            if (heures > MAX_HEURE) {
                throw new Exception("The hour cannot be over the max (" + MAX_HEURE + ").");
            }
            this.heures = heures;
        }

        public int getHeures() {
            return this.heures;
        }

        public void setMinutes(int minutes) throws Exception {
            if (minutes < 0) {
                throw new Exception("Minutes cannot be negative.");
            }
            if (minutes > 59) {
                throw new Exception("Minutes cannot be over 59.");
            }
            if (minutes % STEP != 0) {
                throw new Exception("Minutes can only be set with an interval of " + STEP + " minutes.");
            }

            this.minutes = minutes;
        }

        public int getMinutes() {
            return this.minutes;
        }

        public boolean isBefore(Heure h) {
            return ((this.heures < h.heures) || (h.heures == this.heures && this.minutes < h.minutes));
        }

        public boolean isAfter(Heure h) {
            return h.isBefore(this);
        }

        public boolean isBeforeOrEqual(Heure h) {
            return this.isBefore(h) || this.equals(h);
        }

        public boolean isAfterOrEqual(Heure h) {
            return this.isAfter(h) || this.equals(h);
        }

        @Override
        public boolean equals(Object o) {
            if (this == o) return true;
            if (o == null || getClass() != o.getClass()) return false;
            Heure heure = (Heure) o;
            return getHeures() == heure.getHeures() &&
                    getMinutes() == heure.getMinutes();
        }

        @Override
        public int hashCode() {
            return Objects.hash(getHeures(), getMinutes());
        }
    }


    private JourSemaine jour;
    private Heure debut;
    private Heure fin;

    public Creneau(JourSemaine jourSemaine, Heure heureDebut, Heure heureFin) throws Exception {
        jour = jourSemaine;
        this.setDebut(heureDebut);
        this.setFin(heureFin);
    }

    public void setDebut(Heure heureDebut) throws Exception {
        if (fin != null && heureDebut.isAfter(fin)) {
            throw new Exception("The start hour cannot be later than the end hour.");
        }
        debut = heureDebut;
    }

    public Heure getDebut() {
        return debut;
    }

    public void setFin(Heure heureFin) throws Exception {
        if (debut != null && debut.isAfter(heureFin)) {
            throw new Exception("The start hour cannot be later than the end hour.");
        }

        fin = heureFin;
    }

    public Heure getFin() {
        return fin;
    }

    public boolean chevauche(Creneau c) {
        if (c.jour != this.jour) {
            return false;
        }
        return ((c.debut.isBeforeOrEqual(this.fin) && c.debut.isAfterOrEqual(this.debut)) || (c.fin.isBeforeOrEqual(this.fin)) && c.fin.isAfterOrEqual(this.debut));
    }

    public boolean contient(Creneau c) {
        return (c.getDebut().isAfter(this.getDebut()) && c.getFin().isAfter(this.getFin()));
    }

    @Override
    public String toString() {
        String debutString = debut == null ? "ERROR" : debut.toString();
        String finString = fin == null ? "ERROR" : fin.toString();

        return jour.toString() + " " + debutString + " " + finString;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Creneau creneau = (Creneau) o;
        return jour == creneau.jour &&
                Objects.equals(getDebut(), creneau.getDebut()) &&
                Objects.equals(getFin(), creneau.getFin());
    }

    @Override
    public int hashCode() {
        return Objects.hash(jour, getDebut(), getFin());
    }
}
