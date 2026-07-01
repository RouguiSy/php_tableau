<?php
    // question 1
    $categories = [
        [
            "nom"=>"categorie1",
            "code"=>"C01",
            "produits"=>[
                ["nom"=>"pomme","reference"=>"C123","qte"=>25,"prix"=>100],
                ["nom"=>"fraise","reference"=>"C124","qte"=>50,"prix"=>100]
            ]
        ],
        [
            "nom"=>"categorie2",
            "code"=>"C02",
            "produits"=>[]
        ]
    ];


    // question 2
    function afficheCategorieSansProduit(array $categories): void{
        foreach ($categories as  $categorie ) {
            if (empty($categorie["produits"])) {
                echo $categorie["nom"]."\n";
            }
        }
    }
    afficheCategorieSansProduit($categories);
    

