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
        if (count($categorie["produits"]) === 0) {
            echo"nom :".$categorie["nom"]."\n";
            echo" code :".$categorie["code"]."\n";
        }
    }

    // question 3
    do {
        $codeValid = true;
        $code = readline("Donnez un code :");
        if ($code === "") {
            echo"le code est obligatoir \n";
            $codeValid = false;
        }else {
            for ($index=0; $index <count($categories) ; $index++) { 
                if ($categories[$index]["code"] === $code) {
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
                if ($categories[$index]["nom"] === $nom) {
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

    // question 4
    do {
        $referenceValid = true;
        $reference = readline("Donnez une refenrence :");
        if ($reference === "") {
            echo"la reference est obligatoir \n";
            $referenceValid = false;
        }else {
            for ($index=0; $index < count($categories) ; $index++) { 
                for ($indexPro = 0; $indexPro < count($categories[$index]["produits"]) ; $indexPro ++) { 
                    if ($categories[$index]["produits"][$indexPro] === $reference) {
                        echo"la refrence existe deja \n";
                        $referenceValid = false;
                        break;
                    }
                }
            }
        }
    } while(!$referenceValid);

    do {
        $nomProdValid = true;
        $nomPro = readline("Donnez le nom du produit :");
        if ($nomPro === "") {
            echo"le nom est obligatoir \n";
            $nomProValid = false;
        }
    } while (!$nomProdValid);

    do {
        $prixValid = true;
        $prix = readline("Donnez un prix :");
        if ($prix < 0) {
            echo"le prix dois etre positif \n";
            $prixValid = false;
        }
    } while (!$prixValid);

    do {
        $qteValid = true;
        $qte = readline("Donnez un quantite :");
        if ($qte < 0) {
            echo"la quantite dois etre positif \n";
            $qteValid = false;
        }
    } while (!$qteValid);

    $categorieExiste =  false;
    $code = readline("saisir le code :");
        foreach ($categories as $index => $categorie ) {
            if (($categorie["code"]) === $code) {
                $categorieExiste = true;
                break;
        }
    } 

        if ($categorieExiste) {
            $produit = [
                "nom"=>$nomPro,
                "reference"=>$reference,
                "qte"=>$qte,
                "prix"=>$prix
            ];
        $categories[$index]["produits"][] = $produit;
    }else {
        echo "la categorie n'existe pas";
    }
