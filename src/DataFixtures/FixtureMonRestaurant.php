<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;
use App\Entity\Plat;
use App\Entity\Commande;
use App\Entity\Utilisateur;

class FixtureMonRestaurant extends Fixture

{
    public function load(ObjectManager $manager): void

    
        // Categories
    {
        $categorie1 = new Categorie();
        $categorie1->setLibelle('Hamburger');
        $categorie1->setImage('burger_cat.jpg');
        $categorie1->setActive('Yes');
        $manager->persist($categorie1);

        $categorie2 = new Categorie();
        $categorie2->setLibelle('Pizza');
        $categorie2->setImage('Pizza.jpg');
        $categorie2->setActive('Yes');
        $manager->persist($categorie2);

        $categorie3 = new Categorie();
        $categorie3->setLibelle('Veggie');
        $categorie3->setImage('Food-Name-3461.jpg');
        $categorie3->setActive('Yes');
        $manager->persist($categorie3);

        $categorie4 = new Categorie();
        $categorie4->setLibelle('Pasta');
        $categorie4->setImage('pasta_cat.jpg');
        $categorie4->setActive('Yes');
        $manager->persist($categorie4);

        $categorie5 = new Categorie();
        $categorie5->setLibelle('Viande');
        $categorie5->setImage('');
        $categorie5->setActive('');
        $manager->persist($categorie5);

              
        

        // Plats

        $plat1 = new Plat();
        $plat1->setCategorie($categorie3);
        $plat1->setLibelle('salade_composee');
        $plat1->setDescription('légumes');
        $plat1->setPrix('7');
        $plat1->setImage('assets/images/category/salade_cat.jpg');
        $plat1->setActive('Yes');
        $manager->persist($plat1);

        
        $plat2 = new Plat();
        $plat2->setCategorie($categorie4);
        $plat2->setLibelle('Penne_creme_légumes');
        $plat2->setDescription('Pâtes_crème');
        $plat2->setPrix('15');
        $plat2->setImage('assets/images/category/pasta_cat.jpg');
        $plat2->setActive('');
        $manager->persist($plat2);


        $plat3 = new Plat();
        $plat3->setCategorie($categorie1);
        $plat3->setLibelle('Sandwich');
        $plat3->setDescription('Pain_mie_jambon');
        $plat3->setPrix('8');
        $plat3->setImage('assets/images/category/sandwich_cat.jpg');
        $plat3->setActive('Yes');
        $manager->persist($plat3);




        $plat4 = new Plat();
        $plat4->setCategorie($categorie5);
        $plat4->setLibelle('Buffalo-chicken');
        $plat4->setDescription('Poulet_légumes');
        $plat4->setPrix('12');
        $plat4->setImage('assets/images/food/buffalo-chicken.webp');
        $plat4->setActive('Yes');
        $manager->persist($plat4);
        
        

        $plat5 = new Plat();
        $plat5->setCategorie($categorie3);
        $plat5->setLibelle('Veggie');
        $plat5->setDescription('Légumes');
        $plat5->setPrix('12');
        $plat5->setImage('assets/images/category/veggie_cat.jpg');
        $plat5->setActive('Yes');
        $manager->persist($plat5);
        


                    
                    

         // Utilisateurs
         
         $utilisateur1 = new utilisateur();
         $utilisateur1->setEmail('');
         $utilisateur1->setPassword('');
         $utilisateur1->setNom('');
         $utilisateur1->setPrenom('');
         $utilisateur1->setTelephone('');
         $utilisateur1->setAdresse('');
         $utilisateur1->setCP('');
         $utilisateur1->setVille('');
         $utilisateur1->setRoles('');
         $manager->persist($utilisateur1);
         
         $utilisateur2 = new utilisateur();
         $utilisateur2->setEmail('');
         $utilisateur2->setPassword('');
         $utilisateur2->setNom('');
         $utilisateur2->setPrenom('');
         $utilisateur2->setTelephone('');
         $utilisateur2->setAdresse('');
         $utilisateur2->setCP('');
         $utilisateur2->setVille('');
         $utilisateur2->setRoles('');
         $manager->persist($utilisateur2);


         
         // Commandes
         $commande1 = new Commande();
         $commande1->setUtilisateur($utilisateur1);
         $commande1->setDateCommande('y.m.d');
         $commande1->setTotal('');
         $commande1->setEtat('');
         $manager->persist($commande1);

        
         $commande2 = new Commande();
         $commande2->setUtilisateur($utilisateur2);
         $commande2->setDateCommande('');
         $commande2->setTotal('');
         $commande2->setEtat('');
         $manager->persist($commande2);


         $commande3 = new Commande();
         $commande3->setUtilisateur($utilisateur2);
         $commande3->setDateCommande('');
         $commande3->setTotal('');
         $commande3->setEtat('');
         $manager->persist($commande3);
         


            
        $manager->flush();
    }
}
