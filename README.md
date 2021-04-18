#INSTRUCTION
1.Creer une base de donnes mysql : 'test_unitaire'

2. Executez ' php bin/console doctrine:migrations:migrate'

3. Copier-coller les contenus de public/sql/lieu_data.sql et public/sql/trajet_data.sql dans mySQL

4. Executez 'symfony server:start'

#TESTS

 TOUS LES TESTS DE ROUTES
    (/inscription)
    (/trajet)
    (/login)
    (/accueil)
    (/reservation)

 TOUTES LES ENTITES + LEURS METHODES
    (Trajet)
    (Lieu)
    (Adherent)
    (Utilisateur)

  TOUS LES DIFFERENTS SCENARIOS SELON LE ROLE DE L'UTILISATEUR
    (Acces formulaire nouveau trajet pour les adherents ...)
    (Recherhce des trajets et reservations pour les adherents ...)
