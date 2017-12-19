TEST IGRAAL
===========

@autor : Massamba Fall

### api_project 
    
 - Techno : 
     + Symfony 3.4
        
 - Endpoints (method GET)
    + PATH/commissions => tous les commissions 
    + PATH/commissions/{user_id} => retourne la liste des commissions pour un utilisateur donné ;
    + PATH/users => retourne la liste des users présents en base ;
    + PATH/users/{user_id} => retourne un utilisateurs  ;
     
- Database 
    > Doctrine a causé la modification des noms de quelques colonnes dans la base de données 
    > néanmoins la structure reste la même.
    + Fichier disponible: /database/stage_igraal.sql
 
### client_project

- Techno 
    + Symfony 3.4

Simple client application test url : / 

- Requirement 
    + api_project must be running on port 8000
    + else, define the url in config.yml
