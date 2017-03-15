<?php

/* 404.twig */
class __TwigTemplate_0f5774206bcd128812ea411ae8f5d0a5b8f632b568096d3f40f51b3b5fe3cbde extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>404</title>
</head>
<body>
wap 404

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "404.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>404</title>
</head>
<body>
wap 404

</body>
</html>", "404.twig", "D:\\www\\slim\\app\\WapBundle\\Resource\\Views\\templates\\404.twig");
    }
}
