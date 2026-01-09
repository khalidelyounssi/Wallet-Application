# Wallet-Application
# 💰 MyWallet - Gestionnaire de Dépenses Personnel

![PHP](https://img.shields.io/badge/PHP-8.0%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![Status](https://img.shields.io/badge/Status-Completed-success?style=for-the-badge)

Une application web simple et intuitive pour gérer vos finances personnelles, suivre vos dépenses mensuelles et visualiser votre budget en temps réel. Développée en **PHP Orienté Objet (OOP)** avec une architecture **MVC**.

## 🚀 Fonctionnalités Clés

* **Authentification Sécurisée** : Inscription et Connexion avec hachage de mot de passe (Bcrypt).
* **Gestion du Wallet** : Création automatique de portefeuille et ajout de solde.
* **Suivi des Dépenses (CRUD)** :
    * Ajouter une dépense (catégorisée).
    * Modifier une dépense (avec recalcul automatique du solde).
    * Supprimer une dépense (avec remboursement automatique du montant).
* **Filtrage Intelligent** : Filtrer l'historique des dépenses par catégorie (Nourriture, Transport, etc.).
* **Interface Moderne** : UI propre et responsive utilisant Bootstrap 5.

## 🏗️ Architecture & Concepts Techniques

Ce projet respecte les principes de la programmation orientée objet (OOP) et l'architecture MVC :

* **MVC Pattern** : Séparation claire entre Modèles (Data), Vues (UI) et Contrôleurs (Logique).
* **OOP Avancé** :
    * `Abstract Class Transaction` : Classe parente pour gérer les propriétés communes.
    * `Interface Calculable` : Contrat pour garantir la présence de méthodes de calcul.
    * `Trait Formattable` : Réutilisation du code pour le formatage des devises (DH).
* **Sécurité** :
    * Utilisation de **PDO** avec requêtes préparées (Protection contre SQL Injection).
    * Protection **XSS** avec `htmlspecialchars`.
    * Gestion des **Sessions**.

## 📂 Structure du Projet

```bash
MyWallet/
├── app/
│   ├── Config/       # Connexion Base de données
│   ├── Controllers/  # Logique (Auth, Wallet, Expense)
│   ├── Models/       # Accès aux données (User, Expense...)
│   ├── Abstracts/    # Classes Abstraites
│   ├── Interfaces/   # Interfaces
│   └── Traits/       # Traits
├── public/           # Point d'entrée (index.php)
├── views/            # Fichiers HTML/PHP (Dashboard, Login...)
├── vendor/           # Autoloading (Composer)
└── database.sql      # Script d'importation BDD