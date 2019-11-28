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
	</style>
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

