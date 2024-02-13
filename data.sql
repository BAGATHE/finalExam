/*user*/
insert into user values(default,"Angelo","Emadaly","angelo@gmail.com",sha1("angelo"),"admin");
insert into user values(default,"Manda","Luc","manda@gmail.com",sha1("manda"),"client");
/*parcelle*/
INSERT INTO parcelle (surface_en_hectare, id_variete_the) VALUES (5.2, 1);
INSERT INTO parcelle (surface_en_hectare, id_variete_the) VALUES (3.8, 2);
INSERT INTO parcelle (surface_en_hectare, id_variete_the) VALUES (7.0, 3);

-- Création de la table variete_the
                                          mcarre  kilos par pied
INSERT INTO variete_the (nom_variete, occupation, rendement_mensuel) VALUES ('Variété A', 10.5, 25.3);
INSERT INTO variete_the (nom_variete, occupation, rendement_mensuel) VALUES ('Variété B', 8.2, 20.1);
INSERT INTO variete_the (nom_variete, occupation, rendement_mensuel) VALUES ('Variété C', 12.0, 30.5);



/**table categorie depense*/
INSERT INTO categorie_depense (type_categorie_depense) VALUES ('engrais');
INSERT INTO categorie_depense (type_categorie_depense) VALUES ('carburant');
INSERT INTO categorie_depense (type_categorie_depense) VALUES ('logistique');
