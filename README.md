# CCMProject

Gestion de comptes bancaires basée sur les micro services


    L'application permet de gérer les comptes bancaires.
    chaque compte est défini un code, un solde et une date de création.
    
    Un compte possède deux type :
      un compte courant est un compte qui possède en plus un découvert.
      un compte épargne est un compte qui possède en plus un taux d'intérêt.
      
    Chaque compte appartient à un client.
    chaque client est défini par son code et son nom
    chaque compte peut subir plusieurs opérations.
    Il existe deux type d'opérations : Versement et Retrait.
    Une opération est définie par un numéro, une date et un montant.
    L'utilisateur a le droit de créer et de supprimer les comptes et faire les opérations bancaires  


- Lundi 25 mars

  1- Mettre en oeuvre du premier micro service.
  
    *Fonctionnalités :  Gestion de comptes (création, suppression)
       
  
  2- Tester et déployer le micro service en plusieurs instances.
       
  3- Mettre en oeuvre du deuxième micro service.
  
    *Fonctionnalités :  Gestion des opérations bancaires (retrait, versement)
  
  4- Tester et déployer le micro service en plusieurs instances.

- Mardi 23 avril

  1- Créer un micro service de configuration qui permet de centraliser la configuration des micro services.
  
  2- créer un service d'enregistrement de micro service qui permet de publier les micro service de l'architecture distribuée
  
  3- Créer un service proxy client qui permet de définir une passerelle vers les autres micro services et qui permet d'équilibrer les charges
  
  4- faire communiquer les micro services
  
- Jeudi 23 Mai

  1- Développement de la partie Front end en Angular Js

- Vendredi 21 Juin

  1- La consommation des services coté client.
  
  2- L'application fonctionne en totalité.
