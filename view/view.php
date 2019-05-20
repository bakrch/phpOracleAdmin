<?php

class View {

    private $file;
    private $file1;


    private $title="Oracle PHP Admin";

    public function __construct($view_name,$sidebar=null) {
        $this->file = "view/view" . $view_name. ".php";
        if($sidebar) $this->file1="view/view".$sidebar.".php";
    }


    public function generate($data=false) {
        // Génération de la partie spécifique de la vue
        $content = $this->generateFile($this->file, $data);
        if($this->file1) {
          $sidebar = $this->generateFile($this->file1, $data);
          $view = $this->generateFile('view/viewCommon.php',
                  array('title' => $this->title, 'content' => $content,'sidebar' => $sidebar));
        }
        else{
          $sidebar=null;
          $view = $this->generateFile('view/viewCommon.php',
                  array('title' => $this->title, 'content' => $content,'sidebar' => $sidebar));
        }
        return $view;
    }

    private function generateFile($file, $data) {
        if (file_exists($file)) {
            if($data) extract($data);// maps strings to variables ( $data is array)
            // Last 3 lines load file to tampon, return it as string then erase it
            ob_start();
            require $file;
            return ob_get_clean();
        }
        else {
            throw new Exception("Can't find file:  '$file'");
        }
    }

}
