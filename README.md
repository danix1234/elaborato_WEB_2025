## problems on linux:

- `website/img` needs to be given 777 permissions, otherwise xampp reports a permission error, when trying to upload images
- if errors are not reported, try setting `display_errors=On` in `/opt/lampp/etc/php.ini`
- if `reset-admin.php` not work in linux and say something about using `mysql_upgrade`, try running: `sudo /opt/lampp/mysql/bin/mysql_upgrade -u root -p`

## FIXES

- [x] quando clicchi per aggiungere al carrello in search.php, l'url deve essere `carrello#n`, non `carello.php?productId=n`
- [x] in `ordini.php` non è possibile pagare per ordini nello stato `in attesa`
- [x] centrare la scritta `Non ci sono notifiche` (in notifiche, quando l'utente non ha notifiche)
- [x] nella search bar, i suggerimenti dovrebbero essere filtrati in base alla categoria correntemente selezionata
- [x] quando una notifica viene letta, viene immediatamentamente segnata come letta
- [x] footer "ancorato" in basso
- [x] rendere coerenti i due buttoni (buy now, add to cart) nella search page, in modo tale che entrambi usino sia icone che parole
- [x] non visualizzare nella search page i prodotti con quantita residua = 0
- [x] migliora le query di popolazione del database, per avere dati in italiano, validi, e che abbiano senso
- [x] template base sign dovrebbe avere lo stesso footer del template base
- [x] metti nome del website ovunque abbiano lasciato 'Nostro Sito' in precedenza
- [x] {BUG} crash in search.php quando si seleziona "Tutte le categorie" e si fa la ricerca. In versione mobile, il crash avviene semplicemente cliccando il bottone 'Categoria'
- [x] i link dei social non sono cliccabili, visto che non hanno un link effettivo
- [ ] notifica per quando un prodotto termina da implementare al momento dell'acquisto singolo, o dell'intero carrello
- [ ] mettere i titoli nel footer al centro

## TO THINK ABOUT

- [ ] vogliamo mettere i numeri delle notifiche nel cerchietto sopra l'icona delle notifiche?
- [ ] vogliamo aggiungere le icone anche in "compra subito" e "aggiungi al carrello" bottoni nel prodotto? (stesse icone usate in search.php)
- [ ] vogliamo aggiungere la quantità delle recensioni in prodotto.php, invece che lasciare solo la media dei voti?

## TOUGH ABOUT

- [x] nome del website: DFGinformatica
