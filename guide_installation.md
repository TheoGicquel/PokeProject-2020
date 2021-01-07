[index](README.md)				[Guide d'installation](guide_installation.md)

# Guide d'installation (explicite)

**Ce document est destiné au développeurs**

* effectuez un `git clone https://gitlab.com/gg-mf/pokeproject2020` du projet dans `laragon/www/`

* ouvrir cmder ( présent dans `laragon/bin/cmder`)

* Créer une base de données vide (Attention à l'encodage en fonction de votre région / langue)

* Dupliquer le fichier `config/.env.example` et le renommer en `config/.env`

* Configurez toutes vos variables d'environnement dans ce fichier (mot de passe de bdd, nom de la bdd que vous avez crée, compte root mysql etc..)

* Installez les dépendances du projet avec Composer en faisant : 

  un déplacement dans le dossier du git

```bash
C:\laragon\www
λ cd ../../www/(le dépot git)
```

dans mon cas cela fait : 

```bash
C:\laragon\bin\cmder
λ cd ../../www/pokeproject2020

```

puis on installe les dépendances de composer avec :

```bash
C:\laragon\www\pokeproject2020 (master) (pokeproject2020@1.0.0)
λ composer install
```

* **remarque : ** si composer lors de l'installation vous indique qu'il ne peut pas lancer cake afin d'effectuer `cake migrations migrate` , c'est que cake n'est pas accessible dans le terminal, pour remédier a cela, déplacez vous dans le dossier \bin du projet  puis lancez  `cake migrations migrate` manuellement
* si tout s'est bien passé, vous pouvez vous rendre sur http://localhost/ pour accéder au site
* Si vous obtenez l'erreur `Missing Datasource Configuration` , cela peut être résolu en modifiant dans votre .env  , la ligne `export DEBUG="true"`   en `export DEBUG="false"`  (je n'en connais pas la raison... vraiment navré...)
* ensuite il faut importer les Pokémons dans la bdd, pour cela utilisez la commande `cake PokeApi -v` (ce processus est un peu long)
* Ensuite vous pouvez recharger la page du site, et normalement vous devriez voir l'intégralité des Pokémons téléchargés, et vous êtes maintenant prêt à travailler !
