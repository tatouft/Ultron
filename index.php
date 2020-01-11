<html>
    <head>
	<style>
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
                font-size: 14px;
                padding: 1px;
            }

            .title-frame .title img.kome
            {
                height: auto;
                width: 55%;
                margin-left: 10px;
                margin-right: 80px;
                margin-top: 14px;
            }

            .title-frame
            {
                width: 800px;
                margin-top: 0px;
                margin-bottom: 10px;
                height: 80px;
                padding: 10px;
                text-align: left;
                background-color: #000000;
                background-image: url('../images/LogoKome White.png');
                background-position: right center;
                background-repeat: no-repeat;
                background-size: auto 90%;
            }

            .back
            {
                background-color: #C15E06;
                min-height: 100%;
                margin-bottom: 0px;
                padding-bottom: 0px;
                width: 100%;
                margin-left: auto;
                margin-right: auto;
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
                        echo("<a href='" . $fullPath . "/" . $value . "'>" . $value . "</a><br/>");
                    }
                    echo("</div>");
                }
            }

            PrintDir("./Fichiers", ".");
        ?>
    </body>
</html>

