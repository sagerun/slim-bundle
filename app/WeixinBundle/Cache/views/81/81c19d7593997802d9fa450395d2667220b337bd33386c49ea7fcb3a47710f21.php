<?php

/* 404.twig */
class __TwigTemplate_097e8dc980be57b6a7fd3646a7a0fca2728ace095890d47c97be5cd9b108e0c5 extends Twig_Template
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
weixin 404

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
weixin 404

</body>
</html>", "404.twig", "D:\\www\\slim\\app\\WeixinBundle\\Resource\\Views\\templates\\404.twig");
    }
}
