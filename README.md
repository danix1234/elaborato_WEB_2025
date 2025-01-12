## problems on linux:
- `website/img` needs to be given 777 permissions, otherwise xampp reports a permission error, when trying to upload images
- if errors are not reported, try setting `display_errors=On` in `/opt/lampp/etc/php.ini`
- if `reset-admin.php` not work in linux and say something about using `mysql_upgrade`, try running: `sudo /opt/lampp/mysql/bin/mysql_upgrade -u root -p`

## BUGS

- [x] quando clicchi per aggiungere al carrello in search.php, l'url deve essere `carrello#n`, non `carello.php?productId=n`
- [x] in `ordini.php` non è possibile pagare per ordini nello stato `in attesa`
- [x] centrare la scritta `Non ci sono notifiche` (in notifiche, quando l'utente non ha notifiche)
- [x] nella search bar, i suggerimenti dovrebbero essere filtrati in base alla categoria correntemente selezionata
- [x] quando una notifica viene letta, viene immediatamentamente segnata come letta
- [x] footer "ancorato" in basso
- [ ] sistema query per popolare il database, in modo tale che inserisca dati validi: sistemare l'indirizzo di user e admin, tradurre tutte le recensioni in italiano, inserire valide notifiche, ...

## TO THINK ABOUT

- [ ] nome del website
- [ ] magari i link dei social nel footer possono essere non cliccabili
- [ ] rendere coerenti i due buttoni (buy now, add to cart) nella search page, in modo tale da averli entrambi con icone, o con parole
