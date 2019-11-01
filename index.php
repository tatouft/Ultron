<html>
    <head>

    </head>
    <body>
        <div class="title">Mr Grojean</div>
        <?php
            function PrintDir($path, $dir)
            {
                $fullPath = $path . "/" . $dir;
                $files = scandir($fullPath);

                foreach ($files as $value)
                {
                    if(!is_dir($value))
                    {
                        $rootFiles[] = $value;
                    }
                    PrintDir($fullPath . "/" . $value);
                }

                if(count($rootFiles) > 0)
                {
                    echo("<div>" . $dir ."</div>");
                    echo("<div>");
                    foreach ($rootFiles as $value)
                    {
                        echo("<a href='Fichiers/" . $value . "'>" . $value . "</a>");
                    }
                    echo("</div>");
                }
            }

            PrintDir("./Fichiers");

            $files = scandir("./Fichiers");
        ?>
    </body>
</html>

