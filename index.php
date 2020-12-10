<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
        html,body,div,ul,ol,li,dl,dt,dd,h1,h2,h3,h4,h5,h6,pre,form,p,blockquote,fieldset,input,hr {margin:0; padding:0;}
        h1,h2,h3,h4,h5,h6,pre,code,address,caption,cite,code,em,strong,th {font-size:1em; font-weight:normal; font-style:normal;}
        ul,ol {list-style:none;}
        fieldset,img,hr {border:none;}
        caption,th {text-align:left;}
        table {border-collapse:collapse; border-spacing:0;}
        td {vertical-align:top;}

        div.title
		{
			text-align: center;
			margin-left: auto;
			margin-right: auto;
			margin-bottom: 50px;
		}
		div.head
		{
			width: 300px;
			background-color: lightgrey;
			border-style: solid;
			border-color: lightgrey;
			border-width: 1px;
			text-align: center;
			padding: 5px;
			margin-left: auto;
			margin-right: auto;
		}
		div.content
		{
			width: 300px;
			border-color: lightgrey;
			border-style: solid;
			border-width: 1px;
			margin-bottom: 50px;
			padding: 5px;
			margin-right: auto;
			margin-left: auto;
			margin-bottom: 50px;
		}

        @media (max-width: 640px) {
            * {
                box-sizing: border-box;
            }

            /* passer body (et tous les éléments de largeur fixe) en largeur automatique */

            body {
                width: auto;
                margin: 0;
                padding: 0;
            }

            /* fixer une largeur maximale de 100% aux éléments potentiellement problématiques */

            img,
            table,
            td,
            blockquote,
            code,
            pre,
            textarea,
            input,
            iframe,
            object,
            embed,
            video {
                max-width: 100%;
            }

            /* conserver le ratio des images */

            img {
                height: auto;
            }

            /* gestion des mots longs */

            textarea,
            table,
            td,
            th,
            code,
            pre,
            samp {
                -webkit-hyphens: auto; /* césure propre */
                -moz-hyphens: auto;
                hyphens: auto;
                word-wrap: break-word; /* passage à la ligne forcé */
            }

            code,
            pre,
            samp {
                white-space: pre-wrap; /* passage à la ligne spécifique pour les éléments à châsse fixe */
            }

            /* Passer à une seule colonne (à appliquer aux éléments multi-colonnes) */

            .element1,
            .element2 {
                float: none;
                width: auto;
            }

            /* masquer les éléments superflus */

            .hide_mobile {
                display: none ;
            }

            .hide_desktop
            {
                display: inline;
            }

            .title-frame .title
            {
                font-size: 18px;
                padding: 1px;
            }

            div.title
            {
                margin-top: 10px;
                /*width: 780px;*/
                width:90%;
            }

            div.head
            {
                width:90%;
            }

            div.content
            {
                width:90%;
            }

        }

        @media (max-device-width:768px) and (orientation: landscape) {
            html {
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }
        }

    </style>
    </head>
    <body>
        <div class="title">M Grosjean</div>
        <?php
            function PrintDir($path, $dir)
	        {
                $fullPath = $path . "/" . $dir;
		        $files = scandir($fullPath);

                foreach ($files as $value)
                {
                    if(!is_dir($fullPath . "/" . $value))
                    {
                        $rootFiles[] = $value;
                    }
                    else if($value != "." && $value != "..")
                    {
                        PrintDir($fullPath, $value);
                    }
                }

                if(count($rootFiles) > 0)
                {
                    echo("<div class='head'>" . $dir ."</div>");
                    echo("<div class='content'>");
                    foreach ($rootFiles as $value)
                    {
                        $path_parts = pathinfo($value);
                        if($path_parts['extension'] == 'youtube')
                        {
                            $url = file_get_contents( $fullPath . "/" . $value);
                            echo($path_parts['filename']);
                            echo($url);
                        }
                        if($path_parts['extension'] == 'url')
                        {
                            $url = file_get_contents( $fullPath . "/" . $value);
                            echo($path_parts['filename']);
                            echo("<a href='" . $url . "'>" . $path_parts['filename'] . "</a><br/>");
                        }
                        else
                        {
                            echo("<a href='" . $fullPath . "/" . $value . "'>" . $value . "</a><br/>");
                        }
                    }
                    echo("</div>");
                }
            }

            PrintDir("./Fichiers", ".");
        ?>
    </body>
</html>

