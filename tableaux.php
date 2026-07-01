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
    

    // question 3

    function saisieChaine(string $message): string {
        return readline($message);  
    }

    function champObligatoire(string $value,string $message): bool{
        if (empty($value)) {
            echo $message."\n";
            return  false;
        }
        return true;
    }

    function rechercheCategorieParCle(array $categories, string $key, string $value): int|bool {
        foreach ($categories as $index  => $categorie ) {
            if (($categorie[$key]) === $value) {
                return $index ;
            }
        } 
        return false;
    }

    function enregistrerCategorie(array &$categories): void {

    $code = saisieChaine("Entrez le code : ");
    if (!champObligatoire($code, "code obligatoire")) return;

    if (rechercheCategorieParCle($categories, "code", $code) !== false) {
        echo "Ce code existe deje \n";
        return;
    }

    $nom = saisieChaine("Entrez le nom : ");
    if (!champObligatoire($nom, "nom obligatoire")) return;

    if (rechercheCategorieParCle($categories, "nom", $nom) !== false) {
        echo "Ce nom existe déjà !\n";
        return;
    }

    $categories[] = [
        "code" => $code,
        "nom" => $nom,
        "produits" => []
    ];

    echo "Categorie ajoutee avec succes \n";

    
    }

    // question 4
    function ajouterProduit(array &$categories): void {

        $code = saisieChaine("Code de la categorie : "); 
        $index = rechercheCategorieParCle($categories, "code", $code);
        if ($index === false) {
            echo "Categorie introuvable \n";
            return;
        }
        $nom = saisieChaine("Nom du produit : ");
        if (!champObligatoire($nom, "nom obligatoire")) return;
        $reference = saisieChaine("Reference : ");
        if (!champObligatoire($reference, "reference obligatoire")) return;
        $prix = saisieChaine("Prix : ");
        if (!champObligatoire($prix, "prix obligatoire")) return;
        $qte = saisieChaine("qte : ");
        if (!champObligatoire($qte, "Quantite obligatoire")) return;
        $categories[$index]["produits"][] = [
            "nom" => $nom,
            "reference" => $reference,
            "prix" => $prix,
            "qte" => $qte
        ];

    }

    // question 5

    function ajouterCategorieAvecProduits(array &$categories): void {

        $code = saisieChaine("Code de la categorie : ");
        if (!champObligatoire($code, "code obligatoire")) return;

        $nom  = saisieChaine("Nom de la cat gorie : ");
        if (!champObligatoire($nom, "nom obligatoire")) return;

        $produits = [];

        do {

            $nomPro = saisieChaine("Nom produit : ");
            if (!champObligatoire($nomPro, "nom obligatoire")) return;
            $reference = saisieChaine("Reference : ");
            if (!champObligatoire($reference, "reference obligatoire")) return;
            $qte = saisieChaine("Quantite : ");
            if (!champObligatoire($qte, "quantite obligatoire")) return;
            $prix = saisieChaine("Prix : ");
            if (!champObligatoire($prix, "prix obligatoire")) return;
            $produits[] = [
                "nom" => $nomPro,
                "reference" => $reference,
                "quantite" => $qte,
                "prix" => $prix
            ];
            $choix = strtolower(readline("Ajouter un autre produit ? (o/n) : "));

        } while ($choix === "o");

        $categories[] = [
            "code" => $code,
            "nom" => $nom,
            "produits" => $produits
        ];

}
    ajouterCategorieAvecProduits($categories);