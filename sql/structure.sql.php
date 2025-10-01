<?php 
	$structure[0] = "CREATE TABLE IF NOT EXISTS annee_scolaire( ";
	$structure[0] .= "id int(11) auto_increment primary key, ";
	$structure[0] .= "libelle_pays_fr varchar(255) not null, ";
	$structure[0] .= "libelle_pays_en varchar(255) not null, ";
	$structure[0] .= "libelle_devise_fr varchar(255) not null, ";
	$structure[0] .= "libelle_devise_en varchar(255) not null, ";
	$structure[0] .= "libelle_ministere_fr varchar(255) not null, ";
	$structure[0] .= "libelle_ministere_en varchar(255) not null, ";
	$structure[0] .= "region int(11) not null, ";
	$structure[0] .= "departement int(11) not null, ";
	$structure[0] .= "arrondissement varchar(255) not null, ";
	$structure[0] .= "ville varchar(255) not null, ";
	$structure[0] .= "nom_etablissement_fr varchar(255) not null, ";
	$structure[0] .= "nom_etablissement_en varchar(255) not null, ";
	$structure[0] .= "contact varchar(15) not null, ";
	$structure[0] .= "email varchar(100) not null, ";
	$structure[0] .= "boite_postale int(10) not null, ";
	$structure[0] .= "sexe varchar(1) not null, ";
	$structure[0] .= "nom_chef varchar(255) not null, ";
	$structure[0] .= "libelle_annee varchar(15) not null, ";
	$structure[0] .= "type_etablissement varchar(100) not null, ";
	$structure[0] .= "statut varchar(10) not null ";
	$structure[0] .= ");";
	
	$structure[1] = "CREATE TABLE IF NOT EXISTS appreciation( ";
	$structure[1] .= "id int(11) auto_increment primary key, ";
	$structure[1] .= "libelle_appreciation_fr varchar(100) not null, ";
	$structure[1] .= "libelle_appreciation_en varchar(100) not null, ";
	$structure[1] .= "cote varchar(5) not null, ";
	$structure[1] .= "interv_ouvert int(2), ";
	$structure[1] .= "interv_fermet int(2)";
	$structure[1] .= ");";
	
	$structure[2] = "CREATE TABLE IF NOT EXISTS classe(";
	$structure[2] .= "id int(11) auto_increment primary key, ";
	$structure[2] .= "section varchar(5) not null, ";
	$structure[2] .= "libelle_classe varchar(100) not null, ";
	$structure[2] .= "code_classe varchar(10) not null, ";
	$structure[2] .= "niveau_classe int(2) not null, ";
	$structure[2] .= "etat_classe varchar(10) not null, ";	
	$structure[2] .= "enseignant int(11) null";	
	$structure[2] .= ");";
	
	$structure[3] = "CREATE TABLE IF NOT EXISTS eleve(";
	$structure[3] .= "id int(11) auto_increment primary key, ";
	$structure[3] .= "nom_complet varchar(255) not null, ";
	$structure[3] .= "sexe varchar(1) not null, ";
	$structure[3] .= "statut varchar(1) not null, ";
	$structure[3] .= "date_naissance date, ";
	$structure[3] .= "lieu_naissance varchar(255), ";
	$structure[3] .= "classe int(11) not null, ";
	$structure[3] .= "nom_pere varchar(255), ";
	$structure[3] .= "nom_mere varchar(255) not null, ";
	$structure[3] .= "photo varchar(255) not null, ";
	$structure[3] .= "contact_parent varchar(255) not null, ";
	$structure[3] .= "matricule varchar(25) not null, ";
	$structure[3] .= "etat varchar(15) not null, ";
	$structure[3] .= "annee_scolaire int(11) not null, ";
	$structure[3] .= "num_rand int(11) ";
	$structure[3] .= ");";
	
	$structure[4] = "CREATE TABLE IF NOT EXISTS enseignant(";
	$structure[4] .= "id int(11) auto_increment primary key, ";
	$structure[4] .= "nom varchar(255) not null, ";
	$structure[4] .= "sexe varchar(1) not null, ";
	$structure[4] .= "type_utilisateur int(11), ";
	$structure[4] .= "login varchar(100) not null, ";
	$structure[4] .= "password varchar(255) not null, ";
	$structure[4] .= "etat varchar(20) not null, ";
	$structure[4] .= "image varchar(255) null";
	$structure[4] .= ");";
	
	$structure[5] = "CREATE TABLE IF NOT EXISTS journal_connexion(";
	$structure[5] .= "id int(11) auto_increment primary key, ";
	$structure[5] .= "utilisateur int(11), ";
	$structure[5] .= "adresse_ip varchar(100) not null, ";
	$structure[5] .= "periode DATETIME, ";
	$structure[5] .= "type_machine varchar(100) not null, ";
	$structure[5] .= "nom_machine varchar(100) not null ";
	$structure[5] .= ");";
	
	$structure[6] = "CREATE TABLE IF NOT EXISTS liste_competence(";
	$structure[6] .= "id int(11) auto_increment primary key, ";
	$structure[6] .= "code_competence varchar(10) not null, ";
	$structure[6] .= "libelle_competence_fr varchar(255) not null, ";
	$structure[6] .= "libelle_competence_en varchar(255) not null, ";
	$structure[6] .= "statut_competence varchar(15) not null";
	$structure[6] .= ");";
	
	$structure[7] = "CREATE TABLE IF NOT EXISTS liste_sous_competence(";
	$structure[7] .= "id int(11) auto_increment primary key, ";
	$structure[7] .= "code_sous_competence varchar(100) not null, ";
	$structure[7] .= "libelle_sous_competence_fr varchar(255) not null, ";
	$structure[7] .= "libelle_sous_competence_en varchar(255) not null, ";
	$structure[7] .= "statut_sous_competence varchar(15) not null";
	$structure[7] .= ");";
	
	$structure[8] = "CREATE TABLE IF NOT EXISTS matiere(";
	$structure[8] .= "id int(11) auto_increment primary key, ";
	$structure[8] .= "id_classe int(11), ";
	$structure[8] .= "id_competence int(11), ";
	$structure[8] .= "id_sous_competence int(11), ";
	$structure[8] .= "nb_point int(2)";
	$structure[8] .= ");";
	
	$structure[9] = "CREATE TABLE IF NOT EXISTS note(";
	$structure[9] .= "id int(11) auto_increment primary key, ";
	$structure[9] .= "eleve int(11), ";
	$structure[9] .= "matiere int(11), ";
	$structure[9] .= "sous_matiere int(11), ";
	$structure[9] .= "periode int(11), ";
	$structure[9] .= "note decimal(4,2), ";
	$structure[9] .= "observation varchar(100) ";
	$structure[9] .= ");";
	
	$structure[10] = "CREATE TABLE IF NOT EXISTS note_saisie(";
	$structure[10] .= "classe int(11), ";
	$structure[10] .= "matiere int(11), ";
	$structure[10] .= "periode int(11), ";
	$structure[10] .= "date_saisie datetime, ";
	$structure[10] .= "date_modification datetime, ";
	$structure[10] .= "ip_saisie varchar(100), ";
	$structure[10] .= "type_machine varchar(100) ";
	$structure[10] .= ");";
	
	$structure[11] = "CREATE TABLE IF NOT EXISTS periode(";
	$structure[11] .= "id int(11) auto_increment primary key, ";
	$structure[11] .= "libelle_periode varchar(255) not null, ";
	$structure[11] .= "code_periode_fr varchar(15), ";
	$structure[11] .= "code_periode_en varchar(15), ";
	$structure[11] .= "date_ouvert date, ";
	$structure[11] .= "date_fermet date ";
	$structure[11] .= ");";
	
	$structure[12] = "CREATE TABLE IF NOT EXISTS type_utilisateur(";
	$structure[12] .= "id int(11) auto_increment primary key, ";
	$structure[12] .= "code_poste varchar(100) not null, ";
	$structure[12] .= "libelle_poste varchar(255) not null ";
	$structure[12] .= ");";

	$structure[13] = "CREATE TABLE IF NOT EXISTS section(";
	$structure[13] .= "id int(11) auto_increment primary key, ";
	$structure[13] .= "code_section varchar(5) not null, ";
	$structure[13] .= "libelle_section varchar(255) not null ";
	$structure[13] .= ");";
	
	$structure[14] = "CREATE TABLE IF NOT EXISTS niveau(";
	$structure[14] .= "id int(11) auto_increment primary key, ";
	$structure[14] .= "code_niveau varchar(5) not null, ";
	$structure[14] .= "libelle_niveau_fr varchar(255) not null, ";
	$structure[14] .= "libelle_niveau_en varchar(255) not null ";
	$structure[14] .= ");";
	
	$structure[15] = "CREATE TABLE IF NOT EXISTS matiere_niveau(";
	$structure[15] .= "id int(11) auto_increment primary key, ";
	$structure[15] .= "id_niveau int(11), ";
	$structure[15] .= "id_competence int(11), ";
	$structure[15] .= "id_sous_competence int(11), ";
	$structure[15] .= "nb_point int(2)";
	$structure[15] .= ");";
	
	$structure[16] = "CREATE TABLE IF NOT EXISTS bull_mensuel(";
	$structure[16] .= "id int(11) auto_increment primary key, ";
	$structure[16] .= "classe int(11) null, ";
	$structure[16] .= "pret varchar(5) null, ";
	$structure[16] .= "mois int(11) null ";
	$structure[16] .= ");";
	
	$structure[17] = "CREATE TABLE IF NOT EXISTS bull_trim(";
	$structure[17] .= "id int(11) auto_increment primary key, ";
	$structure[17] .= "classe int(11) null, ";
	$structure[17] .= "pret varchar(5) null, ";
	$structure[17] .= "trimestre int(11) null ";
	$structure[17] .= ");";
	
	$structure[17] = "CREATE TABLE IF NOT EXISTS bull_annuel(";
	$structure[17] .= "id int(11) auto_increment primary key, ";
	$structure[17] .= "classe int(11) null, ";
	$structure[17] .= "pret varchar(5) null ";
	$structure[17] .= ");";
	