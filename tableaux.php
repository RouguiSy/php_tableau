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
    foreach ($categories as  $categorie) {
        if (count($categorie["produits"])==0) {
            echo"nom :".$categorie["nom"]."\n";
            echo" code :".$categorie["code"]."\n";
        }
    }

    // question3
    do {
        $codeValid = true;
        $code = readline("Donnez un code :");
        if ($code === "") {
            echo"le code est obligatoir \n";
            $codeValid = false;
        }else {
            for ($index=0; $index <count($categories) ; $index++) { 
                if ($categories[$index]["code"]===$code) {
                    echo"le code existe deja \n";
                    $codeValid = false;
                    break;
                }
            }
        }
    } while (!$codeValid);

    do {

        $nomValid = true;
        $nom = readline("Donnez un nom :");
        if ($nom === "") {
            echo"le nom est obligatoir \n";
            $nomValid = false;
        }else {
            for ($index=0; $index <count($categories) ; $index++) { 
                if ($categories[$index]["nom"]===$nom) {
                    echo"le nom existe deja \n";
                    $nomValid = false;
                    break;
                }

            }
        }
    } while (!$nomValid);

    $categorie = [
                "nom"=>$nom,
                "code"=>$code,
                "produits"=>[]
    ];

    $categories[]=$categorie;