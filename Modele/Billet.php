<?php

require_once 'Modele/Modele.php';

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Ticket extends Modele {

    /** Renvoie la liste des billets du blog
     * 
     * @return PDOStatement La liste des billets
     */
    public function getTickets() {
        $sql = 'select TIC_ID as id,TIC_DATE as date,'
                . ' TIC_TITRE as titre, TIC_CONTENU as contenu, ETA_LIB as etat from T_TICKET, T_ETAT'
                . ' where T_TICKET.ETA_ID = T_ETAT.ETA_ID';
        $tickets = $this->executerRequete($sql);
        return $tickets;
    }

    /** Renvoie les informations sur un billet
     * 
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     */
    public function getTicket($idTicket) {
        $sql = 'select TIC_ID as id,TIC_DATE as date,'
                . ' TIC_TITRE as titre, TIC_CONTENU as contenu, ETA_LIB as etat from T_TICKET, T_ETAT'
                . ' where TIC_ID=? and T_TICKET.ETA_ID = T_ETAT.ETA_ID';
        $ticket = $this->executerRequete($sql, array($idTicket));
        if ($ticket->rowCount() > 0)
            return $ticket->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun ticket ne correspond à l'identifiant '$idTicket'");
    }

}