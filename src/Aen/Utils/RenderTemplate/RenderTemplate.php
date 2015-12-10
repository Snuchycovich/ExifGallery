<?php

namespace Aen\Utils\RenderTemplate;

class RenderTemplate
{
    protected $path="";

    public function setPath($path)
    {
        $this->path = $path;
    }

    public function render($template)
    {
        ob_start();
        require($this->path . $template);
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }

    public function renderForm($template, $action)
    {
        ob_start();
        require($this->path . $template);
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }
}
